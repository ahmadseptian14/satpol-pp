<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'bulan'
    ];

    public function performances()
    {
        return $this->hasMany(Performance::class, 'times_id', 'id')->withTrashed();
    }
}
