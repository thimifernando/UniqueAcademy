<?php

namespace App\Exports;
use App\Models\Email;
use Maatwebsite\Excel\Concerns\FromCollection;

class MailsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Email::all();
    }
}
