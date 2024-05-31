<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $fillable = [
        'task_name',
        'task_description',
    ];
    // Other model properties and methods

    /**
     * Get the user that owns the record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}