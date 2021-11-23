@extends('layouts.main')
@section('title', 'edit mahasiswa')
@section('content')
    <div class="contener mt-5">
        <div class="card">
            <div class="card-header">
                <h3>edit mahasiswa</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="from-group mb-3">
                        <label for="nim">nim</label>
                        <input type="text" name="nim" class="@error('nim') is-invalid @enderror from-control" value="{{ old('nim', $mahasiswa->id) }}" required >
                        @error('nim')
                            <div class="mt-1">
                                <span class="text-danger">{{ $messege }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="from-group mb-3">
                        <label for="nama_lengkap">nama</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}" required >
                    </div>
                    <div class="from-group mb-3">
                        <label for="kelas">kelas</label>
                        <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $mahasiswa->kelas) }}" required >
                    </div>
                    <div class="from-group mb-3">
                        <label for="prodi">prodi</label>
                        <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $mahasiswa->prodi) }}" required >
                    </div>
                    <div class="from-group mb-3">
                        <label for="tempat_lahir">tempat lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" required >
                    </div>
                    <div class="from-group mb-3">
                        <label for="tanggal_lahir">tanggal lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" required >
                    </div>
                    <div class="from-group mb-3">
                        <label for="jenis_kelamin">jenis kelamin</label>
                        <select name="jenis_kelamin" class="from-control" >
                            <option value="">pilih jenis kelamin</option>
                            <option value="laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin == 'laki-laki' ? 'selected' : '') }}>laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin == 'perempuan' ? 'selected' : '') }}>perempuan</option>
                        </select>
                    </div>
                    <div class="from-group mb-3">
                        <label for="alamat">alamat</label>
                        <textarea name="alamat" class="from-control" >{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    </div>

                    <div class="from-group d-flex justify-content-between">
                        <button type="sumbit" class="btn btn-primary">sumbit</button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
