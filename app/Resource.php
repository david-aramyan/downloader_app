<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['url', 'status_id', 'name'];

    /**
     * Get the status for the resource.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
