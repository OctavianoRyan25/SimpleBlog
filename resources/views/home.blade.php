@extends('template/template')

@section('isi')
    <section id="home">
        {{-- Hero --}}
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/assets/images/Logo.png" class="d-block mx-lg-auto img-fluid" alt="" width="700"
                        height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Baca<span>IN</span></h1>
                    <p class="lead">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore voluptate corporis
                        nulla officia expedita ad id deleniti, velit eos placeat ipsam vero! Atque corporis voluptate fugiat
                        at, quibusdam ut provident!"</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start" style="margin-block: 10px">
                        <a href="/posts" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Baca Disini</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Hero --}}
        {{-- Category Card --}}
        <div class="container">
            <div class="row">
                <div class="col-md mb-4 mb-md-0">
                    <h3><b>-KATEGORI</b></h3>
                    <p class="text-muted" style="margin-bottom: 1.5em">Berbagai macam kategori dapat ditemukan di sini</p>
                </div>
                <div class="col-md-auto">
                    <a href="/kategori" style="margin-bottom: 1.5em; font-size: 1.5em;">Lihat Selengkapnya
                        ></a>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card card-category h-60">
                        <img src="/assets/images/Java.svg" class="card-img-top" alt="..." height="150px">
                        <div class="card-body" style="padding-top: 0em">
                            <h5 class="card-title" style="margin-bottom:0em"><b>Java</b></h5>
                            <p class="card-text"><i>~Object-oriented programming language</i></p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card card-category h-60">
                        <img src="/assets/images/go.svg" class="card-img-top" alt="..." height="170px">
                        <div class="card-body" style="padding-top: 0em">
                            <h5 class="card-title" style="margin-bottom:0em"><b>GO</b></h5>
                            <p class="card-text"><i>~Compiled programming language</i></p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card card-category h-60">
                        <img src="/assets/images/Laravel.svg" class="card-img-top" alt="..." height="170px">
                        <div class="card-body" style="padding-top: 0em">
                            <h5 class="card-title" style="margin-bottom:0em"><b>laravel</b></h5>
                            <p class="card-text"><i>~PHP framework for web Artisans</i></p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card card-category h-60">
                        <img src="/assets/images/nodejs2.svg" class="card-img-top" alt="..." height="150px">
                        <div class="card-body" style="padding-top: 0em">
                            <h5 class="card-title" style="margin-bottom:0em"><b>Node</b></h5>
                            <p class="card-text"><i>~Asynchronous event-driven JavaScript runtime</i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Category Card --}}
        {{-- Popular Post --}}
        <div class="container" style="margin-top: 5em">
            <section id="artikel">
                <h3><b>-ARTIKEL PALING BANYAK DIBACA</b></h3>
                <p class="text-muted">Artikel yang paling populer</p>
                <div class="row justify-content-center" style="margin-bottom: 1.5em">
                    @foreach ($populars as $popular)
                        <div class="col-lg-4 col-md-6 col-sm-10  card-style card-margin">
                            <div class="container container-card">
                                <div class="card text-dark" style="width: 26.5rem;">
                                    <div class="row justify-content-center">
                                        {{-- <img src="https://source.unsplash.com/600x400/?{{ $artikels->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                            class="rounded card-img-top" alt="..."> --}}
                                        @if ($popular->image != null)
                                            <img src="/../storage/{{ $popular->image }}" class="card-img-top"
                                                alt="...">
                                        @else
                                            <img src="https://source.unsplash.com/600x400/?{{ $popular->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                                class="rounded card-img-top" alt="...">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <a href="/post/{{ $popular->slug }}">
                                            <h5 class="card-title">{{ $popular->title }}</h5>
                                        </a>
                                        <a href="/posts?category={{ $popular->category->slug }}">
                                            <span
                                                class="badge bg-{{ $popular->category->color }}">{{ $popular->category->name }}</span>
                                        </a>
                                        <br>
                                        <small class="text-muted">
                                            By <a class="text-decoration-none"
                                                href="/posts?user={{ $popular->user->username }}">{{ $popular->user->name }}
                                        </small></a></p>
                                        <p class="card-text">
                                            <small class="text-muted">Created
                                                {{ $popular->created_at->diffForHumans() }}</small>
                                        </p>
                                        <p class="card-text">{{ Str::limit($popular->excerpt, 80) }}</p>
                                        {{-- <a href="/post/{{ $artikels->slug }}" class="btn btn-primary"
                                            style="margin-top: 10px">Baca</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
        {{-- End Popular Post --}}
        {{-- Post --}}
        <div class="container" style="margin-top: 5em">
            <section id="artikel">
                <h3><b>-ARTIKEL TERBARU📋</b></h3>
                <p class="text-muted">Artikel yang baru saja diterbitkan</p>
                <div class="row justify-content-center" style="margin-bottom: 1.5em">
                    @foreach ($posts as $artikels)
                        <div class="col-lg-4 col-md-6 col-sm-10  card-style card-margin">
                            <div class="container container-card">
                                <div class="card text-dark" style="width: 26.5rem;">
                                    <div class="row justify-content-center">
                                        {{-- <img src="https://source.unsplash.com/600x400/?{{ $artikels->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                            class="rounded card-img-top" alt="..."> --}}
                                        @if ($artikels->image != null)
                                            <img src="/../storage/{{ $artikels->image }}" class="card-img-top"
                                                alt="...">
                                        @else
                                            <img src="https://source.unsplash.com/600x400/?{{ $artikels->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                                class="rounded card-img-top" alt="...">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <a href="/post/{{ $artikels->slug }}">
                                            <h5 class="card-title">{{ $artikels->title }}</h5>
                                        </a>
                                        <a href="/posts?category={{ $artikels->category->slug }}">
                                            <span
                                                class="badge bg-{{ $artikels->category->color }}">{{ $artikels->category->name }}</span>
                                        </a>
                                        <br>
                                        <small class="text-muted">
                                            By <a class="text-decoration-none"
                                                href="/posts?user={{ $artikels->user->username }}">{{ $artikels->user->name }}
                                        </small></a></p>
                                        <p class="card-text">
                                            <small class="text-muted">Created
                                                {{ $artikels->created_at->diffForHumans() }}</small>
                                        </p>
                                        <p class="card-text">{{ Str::limit($artikels->excerpt, 80) }}</p>
                                        {{-- <a href="/post/{{ $artikels->slug }}" class="btn btn-primary"
                                            style="margin-top: 10px">Baca</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row pagination" style="padding: 0">
                        <div class="" style="margin-block: 10px; padding: 0">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{-- End Post --}}
    </section>
@endsection
