<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    use HasFactory;

    protected $table = 'tbtweets';
    protected $fillable = ['isi_posting','gambar_posting','file_posting'];
}
