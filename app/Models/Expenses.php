<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $primaryKey = 'expense_id';

    protected $fillable = [
        'user_id',
        'trip_id',
        'amount',
        'category',
        'expense_date',
        'notes',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trips::class, 'trip_id');
    }
}
