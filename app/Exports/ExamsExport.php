<?php

namespace App\Exports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExamsExport implements FromCollection
{
    
    public function collection()
    {
        return Question::all();
    }
}
