<?php

namespace App;

use App\Performance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image', 'nip', 'nama', 'slug', 'agama', 'angkatan', 'jenis_kelamin', 'alamat', 'jabatan', 'no_hp'
    ];



    protected $hidden = [];

    public function performances()
    {
        return $this->hasMany(Performance::class, 'members_id', 'id')->withTrashed('image');
    }
}
