<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile($id)
    {
        // ambil id user dari model User
        $user = User::findOrFail($id);

        // jika user ada redirect ke view pofile index, jika tidak ada redirect ke dashboard
        if ($user) {
            return view('pages.admin.profile.index')->withUser($user);
        } else {
            return redirect()->back();
        }
    }


    public function edit()
    {
        // jika ada id auth user yang di parsing ke view edit profile maka tampilkan view edit, jika tidak redirect kembali
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('pages.admin.profile.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        // ambil id auth user
        $user = User::find(Auth::user()->id);

        // jika username,email tidak dirubah maka jangan aktifkan validasi unique username, tapi jika diubah aktifkan validasi unique username dan email sehingga user tidak bisa menginput username dan email yang sama.
        if ($user) {
            if (Auth::user()->username === $request['username']) {
                $request->validate([
                    'name' => 'required|max:50',
                    'username' => 'required|max:50',
                    'email' => 'required|max:50'
                ]);
            } else {
                $request->validate([

                    'name' => 'required|max:50',
                    'username' => 'required|unique:users|max:50',
                    'email' => 'required|unique:users|max:50'
                ]);
            }


            // Simpan data yang di input user kemudian redirect ke view index profile dengan alert sukses.
            $user->name = $request['name'];
            $user->username = $request['username'];
            $user->email = $request['email'];


            $user->save();
            return redirect()->route('profile.index', $user->id)->with('status', 'Profile Berhasil Diupdate');
        } else {
            return redirect()->back();
        }
    }

    public function passwordEdit()
    {
        // if (Auth::user()) {
        //     return view('pages.admin.profile.editPassword');
        // } else {
        //     return redirect()->back();
        // }

        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('pages.admin.profile.editPassword')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }


    public function passwordUpdate(Request $request)
    {
        // cara ke 1
        // $validate = $request->validate([

        //     'oldPassword' => 'required|min:7',
        //     'password' => 'required|min:7|required_with:password_confirmation',
        //     // 'required' => 'required|min:7',
        // ]);

        // $user = User::find(Auth::user()->id);

        // if ($user) {
        //     if (Hash::check($request['oldPassword'], $user->password) && $validate) {
        //         $user->password = Hash::make($request['password']);


        //         $user->save();
        //         $request->with('status', 'Password berhasil di Update');
        //         return redirect()->back();
        //     } else {
        //         $request->with('status', 'Password yang anda masukan tidak sesuai');
        //         return redirect()->route('password.edit');
        //     }
        // }

        // Cara ke2
        // if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
        //     return back()->with('error', 'Your Current password does match with what you provided');
        // }
        // if (!(strcmp($request->get('current_password'), $request->get('new_password'))) == 0) {
        //     return back()->with('error', 'Your Current password cannot be same with new password');
        // }

        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|string|min:6|confirmed'
        // ]);

        // $user = Auth::user();
        // $user->password = bcrypt($request->get('new_password'));

        // $user->save();

        // return back()->with('status', 'Password changed succesfully');
    }
}
