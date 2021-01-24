<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use App\Performance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\PerformanceExport;
use App\Imports\PerformanceImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\PerformanceRequest;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ambil semua data nama member dan tampilkan di view create kinerja
        $members = Member::all();

        return view('pages.admin.performance.create', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerformanceRequest $request)
    {
        // ambil semua data yang diinput dan store data dengan method create
        $data = $request->all();

        Performance::create($data);
        return redirect()->route('member.index')->with('status', 'Data Kinerja Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($members_id)
    {
        // tamilkan semua data performance berdasarkan id member dengan relasi member dan foreignid members_id, tampilkan per 5data dengan pagination
        $item = Performance::with(['member'])->where('members_id', $members_id)->get();
        // $item = Performance::with(['member'])->where('members_id', $members_id)->paginate(5);
        $members = Member::all();

        return view('pages.admin.performance.detail', ['item' => $item, 'members' => $members, 'members_id' => $members_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if (Auth::user()->roles == 'ADMIN') {
                // ambil data performance berdasarkan id dan kirim ke view edit performance
            $item = Performance::findOrFail($id);
            $members = Member::all();

            return view('pages.admin.performance.edit', ['item' => $item, 'members' => $members]);
        }
            return redirect()->back();
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerformanceRequest $request, $id)
    {
        // ambil semua data yang diinput dan update data
        $data = $request->all();
        $item = Performance::findOrFail($id);
        $item->update($data);

        return redirect()->route('member.index')->with('status', 'Data Kinerja Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if (Auth::user()->roles == 'ADMIN') {
                // ambil id performance dan lakukan method deleted
            $item = Performance::findOrFail($id);
            $item->delete();

            return redirect()->route('member.index')->with('status', 'Data Kinerja Berhasil Dihapus');
        }
            return redirect()->back();
       
    }

    public function export($members_id) 
    {   
        $user = Auth::user()->roles == 'ADMIN';
        
        if($user)
        {
            $performance = Performance::with(['member'])->where('members_id', $members_id)->get();
        return Excel::download(new PerformanceExport($performance), 'kinerja.xlsx');
        }
        return redirect()->back();
        
    }

    public function import() 
    {
        Excel::import(new PerformanceImport,request()->file('file'));
           
        return back();
    }

}
 