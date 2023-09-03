<?php

namespace App\Exports;

use App\Models\Notice;
use Maatwebsite\Excel\Concerns\FromCollection;

class NoticesExport implements FromCollection
{
    
    public function collection()
    {
        return Notice::all();
    }
}
