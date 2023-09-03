<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id';
    protected $fillable = ['ex_name', 'subject', 'date', 'time', 'attempt'];
    
    use HasFactory;
}
