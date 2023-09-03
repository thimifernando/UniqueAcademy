<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisment';
    protected $primaryKey = 'a_id';
    public $fillable = [
        'a_id',
        'date',
        'img',
        'video',
        'category',
        'title',
    ];
}
