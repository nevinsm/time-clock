<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimePunch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'location', 'open_hours'];

    // Relationships
    // =========================================================================

    /**
     * Get the student that owns the time punch.
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
