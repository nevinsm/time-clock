<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'location', 'open_hours'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'open_hours' => 'array',
    ];

    // Relationships
    // =========================================================================

    /**
     * The students that belong to the shop.
     */
    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }
}
