<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemen extends Model
{
    use HasFactory;
    protected $fillable = ['tag_elemen', 'nama_elemen', 'deskripsi', 'icon_elemen', 'html_elemen'];
}
