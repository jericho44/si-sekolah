@extends('admin.app')
@section('title', 'Tambah Kegiatan')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kegiatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Kegiatan</li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Kegiatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('kegiatan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" placeholder="Title"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <div class="text-muted">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                                            <input type="date" id="tgl_kegiatan" name="tgl_kegiatan"
                                                class="form-control @error('tgl_kegiatan') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foto">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto"
                                                        class="custom-file-input @error('foto') is-invalid @enderror"
                                                        id="foto">
                                                    <label class="custom-file-label" for="foto">Choose file</label>
                                                </div>
                                            </div>
                                            <br>
                                            <img src="" id="preview" class="img-thubmnail">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="summernote" class="form-control" name="deskripsi">
                                        <strong>Pengumuman</strong>
                                    </textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
