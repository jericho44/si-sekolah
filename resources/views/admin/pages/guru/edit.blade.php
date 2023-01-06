@extends('admin.app')
@section('title', 'Ubah Guru')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Guru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Guru</li>
                        <li class="breadcrumb-item active">Ubah</li>
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
                            <h3 class="card-title">Form Ubah Guru {{ $guru->name }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('guru.update', $guru->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Masukan Nama Guru</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukan nama guru"
                                        value="{{ $guru->name, old('name') }}">
                                    @error('name')
                                        <div class="text-muted">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{-- {{ dd($guru->id) }} --}}
                                    <label>Sekolah</label>
                                    <select class="form-control select2" style="width: 100%;" name="sekolah_id" required>
                                        <option selected="selected"> -- Pilih Sekolah-- </option>
                                        @foreach ($sekolah as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $guru->sekolah_id ? 'selected' : '' }}>
                                                {{ $data->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelamin">Jenis Kelamin</label>
                                    <select id="kelamin" name="kelamin"
                                        class="select2bs4 form-control @error('kelamin') is-invalid @enderror">
                                        <option value="">-- Jenis Kelamin --</option>
                                        <option value="L" {{ $guru->kelamin === 'L' ? 'selected' : '' }}>
                                            Laki-Laki
                                        </option>
                                        <option value="P" {{ $guru->kelamin === 'P' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
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
