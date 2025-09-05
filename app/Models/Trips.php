<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $primaryKey = 'trip_id';

    protected $fillable = [
        'user_id',
        'trip_name',
        'currency',
        'start_date',
        'end_date',
        'destination',
        'budget',
        'remaining_budget',
        'trip_image',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'trip_id');
    }
}
