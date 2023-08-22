<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class CategoryController extends Controller
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
        return view('/admin/category', [
            'categories' => category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/createcategory', [
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekomentarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);
        $validated['slug'] = Str::slug(strip_tags($request->name));

        if (category::create($validated)) {
            toast('Success Toast', 'success');
        }


        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    // public function show(komentar $komentar)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('/admin/updatecategory', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekomentarRequest  $request
     * @param  \App\Models\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        if ($request->slug != $category->slug) {
            $validated['slug'] = Str::slug(strip_tags($request->name));
        } else {
            $validated['slug'] = $category->slug;
        }

        if (category::where('id', $category->id)
            ->update($validated)
        ) {
            toast('Success Toast', 'success');
        } else {
            Alert::error('Error', 'Gagal Update Post');
        }
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        category::destroy($category->id);
        return redirect('/admin/category');
    }
}
