<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'IdCategory',
        'Judul',
        'Penerbit',
        'TahunTerbit',
        'Pengarang',
        'Sampul',
        'CreateAt',
        'CreateBy',
        'Isactive'
    ];
}
