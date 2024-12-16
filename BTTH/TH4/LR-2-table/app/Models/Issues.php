<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Issues extends Model
{
    // Model Issues
    protected $fillable = ['computer_id', 'reported_by', 'reported_date', 'description', 'urgency', 'status'];


    public function computer()
    {
        return $this->belongsTo(Computers::class);
    }
}
