<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use App\Performance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\MemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data member yang berada di model Member dan tampilkan per 5 data di view index member

        $items = Member::paginate(5);

        return view('pages.admin.member.index', ['items' => $items]);
    }

    public function search(Request $request)
    {

        $search = "";

        $search = $request->search;

        // jika user menginput request data tidak kosong maka ambil data member dari field "nama" berdasarkan nama yang diinput user, jika request kosong maka tampilkan per 5 data member di view index member 
        if ($search !== "") {
            $items = Member::where("nama", "LIKE", "%" . $search . "%")->paginate(5);
        } else {
            $items = Member::paginate(5);
        }
        // $items = Member::paginate(5);
        return view('pages.admin.member.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tampilkan view edit member ketika user mengklik button dengan route yang dirahakan ke method create
        return view('pages.admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        // nip yang di input harus unique tidak boleh sama dengan nip yang sudah ada di database
        $request->validate([
            'nip' => 'required|unique:members|max:255',
            'image' => 'required'
        ]);

        // ambil semua data yang di input user , dan store image nya kedalam path kemudian jadikan data nama menjadi slug. Dan post data dengan method post.redirect ke index member dengan alert sukses
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        $data['slug'] = Str::slug($request->nama);
        Member::create($data);

        return redirect()->route('member.index')->with('status', 'Pegawai Patroli Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $item = Member::findOrFail($id);

            return view('pages.admin.member.edit', ['item' => $item]);
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
    public function update(MemberRequest $request, $id)
    {

        $image = $request->file('image');
        // ambil semua data yang di input dan store image ke dalam path, kemudian update data dengan method post
        if ($image) {
            $data['image'] = $request->file('image')->store(
                'assets/gallery',
                'public'
            );
        } else {
            $data = $request->all();
            $data['slug'] = Str::slug($request->nama);
        }


        $item = Member::findOrFail($id);
        $item->update($data);

        return redirect()->route('member.index')->with('status', 'Pegawai Patroli Berhasil Diupdate');
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
             // ambil id member dan lakukan method delete
            $item = Member::findOrFail($id);
            $item->delete();

            return redirect()->route('member.index')->with('status', 'Pegawai Berhasil Dihapus');
        }
        return redirect()->back();
       
    }
}
