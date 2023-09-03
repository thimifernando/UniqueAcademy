<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';
    public $fillable = [
        'subject_id',
        'subject_name',
        'subject_Stream',
    ];
}
