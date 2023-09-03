<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeachersExport implements FromCollection
{
    
    public function collection()
    {
        return Teacher::all();
    }
}
