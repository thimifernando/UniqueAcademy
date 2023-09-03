<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'f_id';
    protected $fillable = ['f_name', 'f_date', 'subject', 'description'];

    use HasFactory;
}
