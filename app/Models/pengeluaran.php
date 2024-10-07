<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    
    // protected $guarded = ['id'];

    protected $fillable = [
    'tanggal',
    'keterangan',
    'nominal',
    'tipe',
    ];
}
