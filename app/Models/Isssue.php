<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isssue extends Model
{
    use HasFactory;

    protected $table = 'issue';

    protected $fillable = [
        'quanitity', 'issue-to', 'issue-by',
    ];
}
