<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sfeedback extends Model
{
   
    
    protected $table = 'studentfeedback';
    protected $primaryKey = 'fs_id';
    protected $fillable = ['fs_name', 'fs_date', 'subject', 'email', 'phonenumber', 'description'];

    use HasFactory;
}
