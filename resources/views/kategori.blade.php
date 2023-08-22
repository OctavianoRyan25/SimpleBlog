@extends('template/template')

@section('isi')
    <div class="container-fluid" style="margin-block: 10px">
        <div class="container">
            <h3 style="margin-block: 15px">Kategori yang tersedia</h3>
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center list-group-item-{{ $category->color }}">
                        <a class="text-{{ $category->color }}"
                            href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
                        <span class="badge bg-{{ $category->color }} rounded-pill">{{ $category->posts_count }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
