@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
          {{-- <a href="{{route('performance.create')}}" class="btn btn-primary btn-sm shadow-sm">Tambah Anggota</a> --}}
          </div>

          <div class="row">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                    <img src="{{Storage::url($item->member->image)}}" alt="" width="150px" class="img-thumbnail">
                                    </td>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                            
                                <td>
                                     <a href="{{route('performance.show', $item->members_id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>   
                                </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                      {{$items->links()}}
                  </div>
              </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection

