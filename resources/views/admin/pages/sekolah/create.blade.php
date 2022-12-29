@extends('admin.app')
@section('title', 'Tambah Sekolah')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sekolah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Sekolah</li>
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
                            <h3 class="card-title">Form Tambah Sekolah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('sekolah.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Masukan Nama Sekolah</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukan nama sekolah"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-muted">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npsn">Masukan NPSN</label>
                                            <input type="text" class="form-control @error('npsn') is-invalid @enderror"
                                                id="npsn" name="npsn" placeholder="Masukan NPSN"
                                                value="{{ old('npsn') }}">
                                            @error('npsn')
                                                <div class="text-muted">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Masukan Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" placeholder="Masukan alamat"
                                                value="{{ old('alamat') }}">
                                            @error('alamat')
                                                <div class="text-muted">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_pos">Masukan Kode Pos</label>
                                            <input type="text"
                                                class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos"
                                                name="kode_pos" placeholder="Masukan kode pos"
                                                value="{{ old('kode_pos') }}">
                                            @error('kode_pos')
                                                <div class="text-muted">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kepala_sekolah">Nama Kepala Sekolah</label>
                                            <input type="text"
                                                class="form-control @error('kepala_sekolah') is-invalid @enderror"
                                                id="kepala_sekolah" name="kepala_sekolah" placeholder="Nama Kepala Sekolah"
                                                value="{{ old('kepala_sekolah') }}">
                                            @error('kepala_sekolah')
                                                <div class="text-muted">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <select class="form-control select2" style="width: 100%;" name="desa_id"
                                                required>
                                                <option selected="selected"> -- Pilih Desa-- </option>
                                                @foreach ($desa as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" name="status"
                                                class="select2bs4 form-control @error('status') is-invalid @enderror">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="negeri">Negeri</option>
                                                <option value="swasta">Swasta</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="akreditasi">Akreditasi</label>
                                            <select id="akreditasi" name="akreditasi"
                                                class="select2bs4 form-control @error('akreditasi') is-invalid @enderror">
                                                <option value="">-- Pilih Akreditasi --</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                            <select id="jenjang_pendidikan" name="jenjang_pendidikan"
                                                class="select2bs4 form-control @error('jenjang_pendidikan') is-invalid @enderror">
                                                <option value="">-- Pilih Jenjang Pendidikan --</option>
                                                <option value="sd">SD</option>
                                                <option value="mi">MI</option>
                                                <option value="smp">SMP</option>
                                                <option value="mts">MTS</option>
                                                <option value="sma">SMA</option>
                                                <option value="man">MAN</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_berdiri">Tanggal Berdiri</label>
                                            <input type="date" id="tanggal_berdiri" name="tanggal_berdiri"
                                                class="form-control @error('tanggal_berdiri') is-invalid @enderror">
                                        </div>
                                    </div>
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
