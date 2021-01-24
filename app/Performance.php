<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performance extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'members_id', 'kegiatan', 'lama_waktu', 'hasil', 'waktu'
    ];

    protected $hidden = [];

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id', 'id')->withTrashed();
    }
}
