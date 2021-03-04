@extends('layouts.admin')
@section('title', 'Tambah Data Pegawai Patroli')


@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Pegawai Patroli</h1>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>   
        @endif

        <div class="card-shadow">
            <div class="card-body">
            <form action="{{route('member.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Image">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
            <input type="text" class="form-control" name="nip" placeholder="NIP" value="{{old('nip')}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old('nama')}}">
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
            <input type="text" class="form-control" name="agama" placeholder="Agama" value="{{old('agama')}}">
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
            <input type="text" class="form-control" name="angkatan" placeholder="Angkatan" value="{{old('angkatan')}}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                <option name="jenis_kelamin">Laki - Laki</option>
                <option name="jenis_kelamin">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{old('alamat')}}">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{old('jabatan')}}">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
            <input type="text" class="form-control" name="no_hp" placeholder="No HP" value="{{old('no_hp')}}">
            </div>
            <button class="btn btn-primary btn-block" type="submit">
                Simpan
            </button>
            </form>
            </div>
        </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection

