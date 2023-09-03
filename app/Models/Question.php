<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = ['question', 'opA', 'opB', 'opC', 'opD', 'answer'];
    
    use HasFactory;
}
