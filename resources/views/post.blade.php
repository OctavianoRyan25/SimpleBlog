@extends('template/template')

@section('isi')
    <div class="container" style="margin-block: 10px">
        <div class="row profile-body">
            {{-- <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title mb-0">About</h6>
                            <div class="dropdown">
                                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="git-branch" class="icon-sm me-2"></i> <span
                                            class="">Update</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span class="">View
                                            all</span></a>
                                </div>
                            </div>
                        </div>
                        <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of
                            Social.
                        </p>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted">November 15, 2015</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                            <p class="text-muted">New York, USA</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">me@nobleui.com</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                            <p class="text-muted">www.nobleui.com</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="img-xs rounded-circle" src="/assets/images/profile.png" alt="">
                                        <div class="ms-2">
                                            <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a>
                                            <p class="tx-11 text-muted">{{ $post->created_at->diffForHumans() }}</p>
                                            <a href="/posts?category={{ $post->category->slug }}">
                                                <span
                                                    class="badge bg-{{ $post->category->color }}">{{ $post->category->name }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3">{{ $post->title }}</h3>
                                <img class="img-fluid rounded-2" src="/../storage/{{ $post->image }}" alt="">
                                <p style="margin-block: 10px">{!! $post->body !!}</p>
                            </div>
                        </div>
                    </div>
                    <section class="gradient-custom">
                        <div class="row d-flex">
                            <div class="col-md-12 col-lg-10 col-xl-12">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-grid mb" style="margin-bottom: 10px">
                                            <button class="btn btn-primary" type="button" id="btn-komentar">Lihat
                                                komentar</button>
                                        </div>
                                        <div class="komentar" id="komentar">
                                            {{-- <h4 class="text-center mb-4 pb-2">Komentar</h4> --}}
                                            <form action="" method="post">
                                                @csrf
                                                <div class="text-editor" style="margin-bottom: 10px">
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <textarea name="body" id="body">
                                                    </textarea>
                                                    <button class="btn btn-primary" id="" type="submit"
                                                        style="margin-block: 10px">Kirim</button>
                                                </div>
                                            </form>
                                            <div class="row">
                                                <div class="col">
                                                    @foreach ($post->komentar as $komentar)
                                                        <div class="d-flex flex-start" style="margin-top: 20px">
                                                            <img class="rounded-circle shadow-1-strong me-3"
                                                                src="/assets/images/profile.png" alt="avatar"
                                                                width="40" height="40" />
                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                <div>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <p class="mb-1">
                                                                            {{ $komentar->user->username }} <span
                                                                                class="small">-
                                                                                {{ $komentar->created_at->diffForHumans() }}</span>
                                                                        </p>
                                                                        <a href="#!"><i
                                                                                class="fas fa-reply fa-xs"></i><span
                                                                                class="small" id="reply">
                                                                                reply</span></a>
                                                                    </div>
                                                                    <p class="small mb-0">
                                                                        {!! $komentar->body !!}
                                                                    </p>
                                                                </div>
                                                                {{-- <div class="d-flex flex-start mt-4">
                                                                    <a class="me-3" href="#">
                                                                        <img class="rounded-circle shadow-1-strong"
                                                                            src="/assets/images/profile.png" alt="avatar"
                                                                            width="40" height="40" />
                                                                    </a>
                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                        <div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <p class="mb-1">
                                                                                    Simona Disa <span class="small">-
                                                                                        3 hours ago</span>
                                                                                </p>
                                                                            </div>
                                                                            <p class="small mb-0">
                                                                                letters, as opposed to using 'Content
                                                                                here, content here',
                                                                                making it look like readable English.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-start mt-4">
                                                                    <a class="me-3" href="#">
                                                                        <img class="rounded-circle shadow-1-strong"
                                                                            src="/assets/images/profile.png" alt="avatar"
                                                                            width="40" height="40" />
                                                                    </a>
                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                        <div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <p class="mb-1">
                                                                                    John Smith <span class="small">- 4
                                                                                        hours ago</span>
                                                                                </p>
                                                                            </div>
                                                                            <p class="small mb-0">
                                                                                the majority have suffered alteration in
                                                                                some form, by
                                                                                injected humour, or randomised words.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-4 ">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <h6 class="card-title">Postingan terkait</h6>
                                <hr>
                                @foreach ($relates as $related)
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            @if ($related->image != null)
                                                <img src="/../storage/{{ $related->image }}" class="img-md rounded"
                                                    alt="...">
                                            @else
                                                <img class="img-sm rounded"
                                                    src="https://source.unsplash.com/600x400/?{{ $related->category->name }}&client_id=2EFsFAjAKXaEhM_CALuqjt5bS77rEmqHo5-ZGLHD53s"
                                                    alt="">
                                            @endif
                                            <div class="ms-2">
                                                <a href="{{ $related->slug }}">
                                                    <p>{{ Str::limit($related->title, 40) }}</p>
                                                </a>
                                                <p class="tx-13">By {{ $related->user->name }}</p>
                                                <p class="tx-11 text-muted">{{ $related->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right wrapper end -->
        </div>
    </div>
@endsection
@push('ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn-komentar').click(function(event) {
                var x = $(this).text();
                if (x == "Lihat komentar") {
                    $(this).text('Sembunyikan komentar')
                    $('#komentar').slideDown()
                } else {
                    $(this).text('Lihat komentar')
                    $('#komentar').slideUp()
                }

            })
            $('#reply').click(function(event) {
                $('#body').setText('Tulis komentar')
            })
        })
    </script>
@endpush
