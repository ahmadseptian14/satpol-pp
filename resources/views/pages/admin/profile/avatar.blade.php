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

        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
      @endif
      
        <img src="{{asset(Auth::user()->avatar)}}" alt="" width="20%" class="mb-2">
        <h2>{{$user->name}}</h2>
        <div class="card-shadow">
            <div class="card-body">
            <form action="{{route('profile.update_avatar', $user->id)}}" method="POST" enctype="multipart/form-data">
             @method('POST')
            @csrf
            <label for="">Update Foto</label>
            <input type="file" name="avatar">
            <input type="submit" class="pull-right btn btn-sm btn-primary">


            {{-- <button class="btn btn-primary btn-block" type="submit">
                Simpan
            </button> --}}
            </form>
            </div>
        </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection