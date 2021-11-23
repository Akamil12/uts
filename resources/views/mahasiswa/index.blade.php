@extends('layouts.main')
@section('title', 'data mahasiswa')
@section('content')

@if(session()->has('berhasil'))
    <div class="alert alert-succes">
        {{ session()->get('berhasil') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>data mahasiswa
                </h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-succes">tambah</a>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nim</th>
                            <th>nama</th>
                            <th>kelas</th>
                            <th>prodi</th>
                            <th>jenis kelamin</th>
                            <th>tempat lahir</th>
                            <th>tanggal lahir</th>
                            <th>alamat</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $increment = 1;
                        @endphp
                        @foreach ( $mahasiswa as $item )
                        <tr>
                            <td>{{ $increment++ }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning">edit</a>
                                <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="sumbit" oneclick="return confirm('apakah anda yakin untuk menghapusdata ini?')" class="btn btn-danger">hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
