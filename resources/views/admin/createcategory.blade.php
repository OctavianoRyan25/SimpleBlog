@extends('admin/template/templateadmin')
@section('admin')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bootstrap MaxLength</h4>
            <p class="text-muted mb-3">Read the <a href="https://github.com/mimo84/bootstrap-maxlength" target="_blank">
                    Official Bootstrap MaxLength Documentation </a>for a full list of instructions and other
                options.</p>
            <form action="/admin/category" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="name" class="col-form-label">Name</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control @error('name') is-invalid @enderror" maxlength="30" name="name"
                            id="name" type="text" placeholder="Nama judul...">
                        @error('name')
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
                            placeholder="Nama slug...">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="color" class="col-form-label">Warna Kategori</label>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-select @error('color') is-invalid @enderror" name="color" id="color">
                            <option selected disabled>Pilih warna</option>
                            <option value="primary">primary</option>
                            <option value="secondary">secondary</option>
                            <option value="success">success</option>
                            <option value="danger">danger</option>
                            <option value="warning">warning</option>
                            <option value="info">info</option>
                            <option value="light">light</option>
                            <option value="dark">dark</option>
                        </select>
                        @error('color')
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
        const title = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        title.addEventListener("change", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
