<?php

namespace ReportBuilder\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportButilder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'content'
    ];

    protected $casts = [
        'created_at' => 'date:D, d-m-y',
        'updated_at' => 'date:D, d-m-y'
    ];
}
