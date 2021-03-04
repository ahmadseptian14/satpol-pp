@extends('layouts.admin')
@section('title', 'Tambah Data Kinerja')

@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Patroli </h1>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>                
            @endforeach
        </ul>
    </div>   
    @endif

   <div class="card shadow">
       <div class="card-body">
       <form action="{{route('performance.store')}}" method="POST">
        @csrf

       <div class="form-gorup mb-2">
        <label for="members_d">Nama Pegawai</label>
        <select style="width: 200px" name="members_id" required class="select2multiple " multiple>
            @foreach ($members as $member)
                <option value="{{$member->id}}">
                    {{$member->nama}}
                </option>
            @endforeach
        </select>
       </div>

        <div class="form-group mt-2">
            <label for="kegiatan">Kegiatan</label>
            <input type="text" class="form-control" name="kegiatan" placeholder="Kegiatan">
        </div>
        <div class="form-group">
            <label for="lama_waktu">Lama Waktu</label>
            <input type="text" class="form-control" name="lama_waktu" placeholder="Lama Waktu">
        </div>
        <div class="form-group">
            <label for="hasil">Hasil Yang DiHarapkan</label>
            <input type="text" class="form-control" name="hasil" placeholder="Hasil Yang DiHarapkan">
        </div>
        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="date" class="form-control" name="waktu" placeholder="Waktu">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
       </div>
   </div>
  </div>
  <!-- /.container-fluid -->
@endsection
@push('prepend-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endpush
@push('addon-script')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<script  type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.select2multiple').select2({
        placeholder:"Cari Nama Pegawai",
        allowClear:true,
       
    });
});
</script>
@endpush
