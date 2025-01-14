<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasird extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kasirs';

    // Kolom yang bisa diisi
    protected $fillable = ['id', 'name', 'price'];
}
