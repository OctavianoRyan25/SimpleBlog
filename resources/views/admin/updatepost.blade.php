@extends('admin/template/templateadmin')
@section('admin')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bootstrap MaxLength</h4>
            <p class="text-muted mb-3">Read the <a href="https://github.com/mimo84/bootstrap-maxlength" target="_blank">
                    Official Bootstrap MaxLength Documentation </a>for a full list of instructions and other
                options.</p>
            <form action="/admin/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                type
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="kategori_id" class="col-form-label">Kategori</label>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                            id="category_id">
                            <option selected disabled>Pilih kategori</option>
                            @foreach ($categories as $category)
                                @if ($post->category_id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="title" class="col-form-label">Title</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control @error('title') is-invalid @enderror" maxlength="30" name="title"
                            id="title" type="text" value="{{ $post->title }}" placeholder="Nama judul...">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="slug" class="col-form-label">Slug</label>
                    </div>
                    <div class="col-lg-8">
                        <input disabled class="form-control" maxlength="40" name="slug" id="slug" type="text"
                            value="{{ $post->slug }}" placeholder="Nama slug...">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="image" class="form-label">Thumbnail</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <img class="img-preview img-fluid">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="defaultconfig-3" class="col-form-label">Isi post</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="@error('body') is-invalid @enderror" id="body" type="hidden" name="body"
                            value="{{ $post->body }}">
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row">
                <div class="col-lg-3">
                    <label for="defaultconfig-4" class="col-form-label">Text Area</label>
                </div>
                <div class="col-lg-8">
                    <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8"
                        placeholder="This textarea has a limit of 100 chars."></textarea>
                </div>
            </div> --}}
                <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("change", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
