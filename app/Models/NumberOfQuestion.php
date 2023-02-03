<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberOfQuestion extends Model
{
    use HasFactory;
    protected $table = 'numberofquestions';

    protected $fillable = [
        'numofquest'
    ];
}
