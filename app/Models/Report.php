<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 
        'description', 
        'status', 
        'user_id', 
        'assigned_to', 
        'resolution_notes', 
        'resolved_at', 
    ];
}
