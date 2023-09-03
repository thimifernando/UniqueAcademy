<?php

namespace App\Exports;

use App\Models\Exam;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuestionExport implements FromCollection
{
    
    public function collection()
    {
        return Exam::all();
    }
}
