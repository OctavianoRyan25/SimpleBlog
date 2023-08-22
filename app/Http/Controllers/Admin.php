<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Admin extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        return view('/admin/posts', [
            'posts' => post::with(['category', 'user'])
                ->where('user_id', $user_id)->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/createpost', [
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        // $validated['images'] = 

        $validated = $request->validate([
            'category_id' => 'required',
            'title' => 'required|unique:posts|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['slug'] = Str::slug(strip_tags($request->title));
        $validated['image'] = $request->file('image')->store('thumbnail');
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if (post::create($validated)) {
            Alert::success('Success', 'Berhasil Membuat Post');
        }


        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        } else {
            return view('/admin/updatepost', [
                'post' => $post,
                'categories' => category::all(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        } else {
            $validated = $request->validate([
                'category_id' => 'required',
                'title' => 'required|max:255',
                'image' => 'image|file|max:2048',
                'body' => 'required',
            ]);

            if ($request->slug != $post->slug) {
                $validated['slug'] = Str::slug(strip_tags($request->title));
            } else {
                $validated['slug'] = $post->slug;
            }
            if ($request->image) {
                if ($post->image) {
                    Storage::delete($post->image);
                    $validated['image'] = $request->file('image')->store('thumbnail');
                }
            } else {
                $validated['image'] = $post->image;
            }
            $validated['user_id'] = auth()->user()->id;
            $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);

            post::where('id', $post->id)
                ->update($validated);

            Alert::success('Success', 'Berhasil Update Post');
            return redirect('/admin/posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if (!Gate::allows('delete-post', $post)) {
            abort(403);
        }
        if ($post->image) {
            Storage::delete($post->image);
        }

        post::destroy($post->id);
        return redirect('/admin/posts');
    }
}
