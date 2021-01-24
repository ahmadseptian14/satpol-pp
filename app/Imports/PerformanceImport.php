<?php

namespace App\Imports;

use App\Performance;
use Maatwebsite\Excel\Concerns\ToModel;

class PerformanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Performance([
            'kegiatan' => $row['kegiatan'],
            'lama_waktu' => $row['lama_waktu'],
            'hasil' => $row['hasil'],
            'waktu' => $row['waktu']
        ]);
    }
}
