<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AvatarController extends Controller
{
    public function avatar($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.profile.avatar', ['user' => $user]);
    }

    public function update_avatar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            if (request()->hasFile('avatar')) {
                $avataruploaded = request()->file('avatar');
                $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
                $avatarpath = public_path('/images/');
                $avataruploaded->move($avatarpath, $avatarname);

                $user->avatar = public_path('/images/');
                $user->avatar = '/images/' . $avatarname;
                $user->update();
                // dd($avatarname);
            }
            return redirect()->route('profile.avatar', $user->id)->with('status', 'Foto Berhasil Diubah');
        }
    }
}
