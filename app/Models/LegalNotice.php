<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalNotice extends Model
{

    protected $table = 'legal_notices';
    protected $fillable = ['title', 'description'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];
}
