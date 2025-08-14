<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'user_id',
        'category_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
