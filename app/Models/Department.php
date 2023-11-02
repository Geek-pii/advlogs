<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';

    protected $fillable = [
        'name',
        'email',
        'position',
        'active'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
