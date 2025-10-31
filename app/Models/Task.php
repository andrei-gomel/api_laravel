<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
    ];

    public function showAll()
    {
        return \DB::table('tasks')->orderBy('id', 'desc')->paginate(20);
    }
}
