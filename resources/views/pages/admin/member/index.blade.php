@extends('layouts.admin')

@section('title', 'Data Pegawai')
    
@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            {{-- <h1 class="h3 mb-0 text-gray-800">Data Pegawai Patroli</h1> --}}
            @if (Auth::user()->roles == 'ADMIN')
            <a href="{{route('member.create')}}" class="btn btn-primary btn-sm shadow-sm"><i class="fa fa-user-plus mr-1">Tambah Pegawai Patroli</i></a>
            @endif
          </div>
        <form action="{{route('member.search')}}" class="form-inline my-2 my-lg-0" method="POST">
            @csrf
          <input class="form-control mr-sm-2" placeholder="Cari Nama Pegawai" aria-label="Search" name="search">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
        </form>
          <div class="row">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Foto</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Agama</th>
                                <th>Angkatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th>No HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $key => $item)
                                <tr>
                                <td>{{$items->firstItem() + $key}}</td>
                                <td>
                                    <img src="{{Storage::url($item->image)}}" alt="" width="150px" class="img-thumbnail">
                                    </td>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->agama}}</td>
                                <td>{{$item->angkatan}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->jabatan}}</td>
                                <td>{{$item->no_hp}}</td>
                            
                                <td>
                                    <a href="{{route('performance.show', $item->id)}}" class="btn btn-sm btn-info mb-2"><i class="fa fa-eye"></i>Jadwal Patroli</a>   
                                    @if (Auth::user()->roles == 'ADMIN')
                                        <a href="{{route('member.edit', $item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt d-block"></i>Edit Data</a>   
                                        <form action="{{route('member.destroy', $item->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger mt-2 btn-sm" siswa-id ="{{$item->id}}">
                                            <i class="fa fa-trash d-inline">Hapus Data</i>
                                            </button>
                                    </form>
                                    @endif
                                </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                      <div>
                        Showing
                        {{$items->firstItem()}}
                        to
                        {{$items->lastItem()}}
                        of
                        {{$items->total()}}
                        entries
                    </div>

                    <div style="margin-left: 850px">
                        {{$items->links()}}
                     </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
@endsection
@push('addon-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
@push('addon-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
     @if (Session::has('status'))
           toastr.success("{{Session::get('status')}}", "Sukses")
     @endif
</script>
@endpush

