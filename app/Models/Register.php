<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $table='register';

    // If the table doesn't use the default `id` primary key or timestamps, specify them
    // protected $primaryKey = 'id';
    // public $timestamps = false;
}
