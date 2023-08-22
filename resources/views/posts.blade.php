@extends('template/template')

@section('isi')
    <div class="container" style="margin: 0 auto">
        @if (Request('category'))
            <nav class="page-breadcrumb" style="margin-block: 10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/kategori">Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Request('category') }}</li>
                </ol>
            </nav>
        @elseif(Request('user'))
            <nav class="page-breadcrumb" style="margin-block: 10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Request('user') }}</li>
                </ol>
            </nav>
            {{-- <input type="hidden" name="category" value="{{ Request('category') }}"> --}}
        @endif
        @if (Request('category'))
            <h2><b>ARTIKEL YANG MEMBAHAS MENGENAI {{ Str::upper(Request('category')) }}🔥</b></h2>
        @elseif(Request('user'))
            <h2><b>ARTIKEL YANG DITULIS {{ Str::upper(Request('user')) }}🔥</b></h2>
        @else
            <h2 style="margin-block: 1em"><b>ARTIKEL YANG DAPAT DIBACA🔥</b></h2>
        @endif
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-10  card-style card-margin">
                        <div class="container container-card">
                            <div class="card text-dark" style="width: 26.5rem;">
                                <div class="row justify-content-center">
                                    {{-- <img src="https://source.unsplash.com/600x400/?{{ $artikels->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                    class="rounded card-img-top" alt="..."> --}}
                                    @if ($post->image != null)
                                        <img src="/../storage/{{ $post->image }}" class="card-img-top" alt="...">
                                    @else
                                        <img src="https://source.unsplash.com/600x400/?{{ $post->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                            class="rounded card-img-top" alt="...">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <a href="/post/{{ $post->slug }}">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                    </a>
                                    <a href="/posts?category={{ $post->category->slug }}">
                                        <span
                                            class="badge bg-{{ $post->category->color }}">{{ $post->category->name }}</span>
                                    </a>
                                    <br>
                                    <small class="text-muted">
                                        By <a class="text-decoration-none"
                                            href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}
                                    </small></a></p>
                                    <p class="card-text">
                                        <small class="text-muted">Created
                                            {{ $post->created_at->diffForHumans() }}</small>
                                    </p>
                                    <p class="card-text">{{ Str::limit($post->excerpt, 80) }}</p>
                                    {{-- <a href="/post/{{ $artikels->slug }}" class="btn btn-primary"
                                    style="margin-top: 10px">Baca</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="div">
                    <h2 class="row justify-content-center">Post Not Found</h2>
                </div>
            @endif
        </div>
        <div class="row pagination" style="padding: 0">
            <div class="" style="margin-block: 10px; padding: 0">
                {{ $posts->links() }}
            </div>
        </div>

        {{-- <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
