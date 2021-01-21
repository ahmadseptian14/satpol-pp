@extends('layouts.admin')
@section('title', 'Edit Data Anggota')

@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Edit Profile {{$user->nama}}</h1>
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
            <form action="{{route('profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
             @method('POST')
            @csrf

           
            <div class="form-group">
                <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" value="{{$user->username}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
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