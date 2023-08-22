@extends('admin/template/templateadmin')
@section('admin')
    @include('vendor/sweetalert/alert')
    <!-- partial -->
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Post</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Postingan Anda</h6>
                        <a href="/admin/category/create" type="button" class="btn btn-primary"><i
                                data-feather="file-plus"></i>
                            Buat Kategori</a>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($categories as $category)
                                    <tbody>
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <div class="d-inline-flex gap-1" aria-label="Basic example">
                                                    <a href="/admin/category/{{ $category->slug }}/edit" type="button"
                                                        class="btn btn-success" data-confirm-delete="true"><i
                                                            data-feather="edit"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('category.destroy', $category->slug) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger show_confirm"
                                                            data-toggle="tooltip" title='Delete'><i
                                                                data-feather="trash-2"></i></button>
                                                    </form>
                                                    {{-- <form action="/admin/posts/{{ $post->slug }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-outline-danger "
                                                            data-confirm-delete="true">Delete</button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal.fire({
                    title: 'Apakah anda yakin ingin menghapus data?',
                    text: "Anda tidak dapat mengembalikan data yang terhapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Data anda telah dihapus.',
                            'success'
                        )
                    }
                });
        });
    </script>
@endpush
