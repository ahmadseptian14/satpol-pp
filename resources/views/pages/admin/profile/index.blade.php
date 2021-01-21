
@extends('layouts.admin')

@section('title', 'Profile Admin')
    
@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          @if (session('status'))
          <div class="alert alert-success">
              {{session('status')}}
          </div>
        @endif
          
          <div class="container">
          <div class="row">
              <div class="card-body">
              
                <div class="card mb-3 px-2 py-2" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{asset(Auth::user()->avatar)}}" class="card-img" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                      <h5 class="card-title ">{{$user->name}}</h5>
                      <h5 class="card-title ">{{$user->username}}</h5>
                      <h5 class="card-title ">{{$user->email}}</h5>

                      <a href="{{route('profile.edit', $user->id)}}" class="btn btn-primary btn-sm d-block mb-1"><i class="fa fa-pencil"></i>Edit Profile</a>

                      <a href="{{route('profile.avatar', $user->id)}}" class="btn btn-primary btn-sm d-block mb-1"><i class="fa fa-pencil"></i>Edit Foto</a>

                      <a href="{{route('password.request')}}" class="btn btn-primary btn-sm d-block mb-1"><i class="fa fa-pencil"></i>Edit Password</a>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
        
               
          </div>
        </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection

