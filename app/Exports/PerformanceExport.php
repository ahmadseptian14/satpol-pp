<?php

namespace App\Exports;

use App\Performance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerformanceExport implements  FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($performance)
    {
        $this->performance = $performance;
    }

    public function view(): View
    {   
        return view('pages.admin.performance.performance-excel', [
            'item' => $this->performance
        ]);
    }

}
