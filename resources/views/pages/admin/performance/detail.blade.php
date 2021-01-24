@extends('layouts.admin')
@section('title', 'Data Kinerja')
@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Data Kinerja</h1>
          <a href="{{route('performance.create')}}" class="btn btn-primary btn-sm shadow-sm">Tambah Kinerja</a>
          </div>
          @if (Auth::user()->roles == 'ADMIN')
            <a class="btn btn-warning" href="{{ route('export', ['id'=> $members_id]) }}">Export Data Kinerja</a>   
          @endif
          <div class="row">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kegiatan</th>
                                <th>Lama Waktu</th>
                                <th>Hasil Yang DiHarapkan</th>
                                <th>Waktu</th>
                                @if (Auth::user()->roles == 'ADMIN')
                                <th>Action</th> 
                                @endif
                                
                    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item as $key => $performance)
                                <tr> 
                                {{-- <td>{{$item->firstItem() + $key}}</td> --}}
                                <td>{{$loop->iteration}}</td>
                                <td>{{$performance->kegiatan}}</td>
                                <td>{{$performance->lama_waktu}}</td>
                                <td>{{$performance->hasil}}</td>
                                <td>{{$performance->waktu}}</td>
                                @if (Auth::user()->roles == 'ADMIN')
                                <td>
                                        <a href="{{route('performance.edit', $performance->id)}}" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>   
                                        <form action="{{route('performance.destroy', $performance->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> 
                                </td>
                                @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                      {{-- <div>
                          Showing
                          {{$item->firstItem()}}
                          to
                          {{$item->lastItem()}}
                          of
                          {{$item->total()}}
                          entries
                      </div>
                      
                      <div style="margin-left: 850px">
                        {{$item->links()}}
                     </div> --}}
                  </div>
              </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection