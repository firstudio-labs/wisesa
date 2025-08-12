<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'data_link'];

    protected $casts = [
        'data_link' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
