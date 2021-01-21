@extends('layouts.admin')
@section('title', 'Edit Data Kinerja')
@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Edit Data Kinerja {{$item->member->nama}}</h1>
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
            <form action="{{route('performance.update', $item->id)}}" method="POST" enctype="multipart/form-data">
             @method('PATCH')
            @csrf
        
            <div class="form-group">
                <label for="kegiatan">Kegiatan</label>
            <input type="text" class="form-control" name="kegiatan" placeholder="Kegiatan" value="{{$item->kegiatan}}">
            </div>
            <div class="form-group">
                <label for="lama_waktu">Lama Waktu</label>
            <input type="text" class="form-control" name="lama_waktu" placeholder="Lama Waktu" value="{{$item->lama_waktu}}">
            </div>
            <div class="form-group">
                <label for="hasil">Hasil Yang Diharapkan</label>
            <input type="text" class="form-control" name="hasil" placeholder="Hasil Yang Diharapkan" value="{{$item->hasil}}">
            </div>
            <div class="form-group">
                <label for="waktu">Waktu</label>
            <input type="date" class="form-control" name="waktu" placeholder="Waktu" value="{{$item->waktu}}">
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