<?php

namespace App\Exports;

use App\Models\Tutorial;
use Maatwebsite\Excel\Concerns\FromCollection;

class TutorialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tutorial::all();
    }
}
