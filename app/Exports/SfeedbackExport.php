<?php

namespace App\Exports;

use App\Models\Sfeedback;

use Maatwebsite\Excel\Concerns\FromCollection;

class SfeedbackExport implements FromCollection
{
    
    public function collection()
    {
        return Sfeedback::all();
    }


    
}
