
    <table class="table table-bordered" width="100%">
      <thead>
          <tr>
              <th>NO</th>
              <th>Kegiatan</th>
              <th>Lama Waktu</th>
              <th>Hasil Yang DiHarapkan</th>
              <th>Waktu</th>
              
  
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