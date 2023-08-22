<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $popular = Post::orderBy('views', 'desc')->take(3)->get();
        return view('home', [
            "title" => "RyCode",
            // "categories" => category::get(),
            "posts" => post::latest()->with(['category', 'user'])->paginate(6),
            "populars" => $popular
        ]);
    }

    public function posts()
    {
        return view('posts', [
            "title" => "Artikel",
            'nama' => "Ryan Eka",
            "posts" => post::with(['category', 'user'])->Filter(Request(['search', 'category', 'user']))->paginate(9)->withQueryString()
        ]);
    }

    // public function find($id)
    // {
    //     $post = post::findOrFail($id);
    //     DB::table('posts')->where('id', $id)->increment('views');

    //     return view('postingan', [
    //         "title" => "Artikel yang anda baca",
    //         "artikel" => $post
    //     ]);
    // }

    public function category()
    {
        return view('kategori', [
            'title' => "Kategori",
            'categories' => category::withCount('posts')->get()
        ]);
    }

    public function viewpost(post $post)
    {
        $currentPost = Post::findOrFail($post->id);
        $currentCategories = $currentPost->category()->pluck('id');
        $post->increment('views'); // Menambah jumlah views

        // Get related posts with the same categories
        $relatedPosts = Post::whereHas('category', function ($query) use ($currentCategories) {
            $query->whereIn('category_id', $currentCategories);
        })
            ->where('id', '<>', $post->id) // Exclude the current post
            ->take(5) // Limit the number of related posts
            ->get();
        return view('post', [
            'title' => $post->title,
            "post" => $post,
            "relates" => $relatedPosts
        ]);
    }

    public function komentar(Request $request)
    {
        try {
            //code...
            $request->request->add(['user_id' => auth()->user()->id]);
            $request->request->add(['body' => $request->body]);
            $kometar = komentar::create($request->all());
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            report($th);

            return redirect('login');
        }
    }
}
