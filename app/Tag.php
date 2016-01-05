<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    /**
     * Gets the articles associated with the tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
     
     /**
      *Fillable fields for a tag
      * 
      * @return Array
      */
     
     protected $fillable = [
        'name'
    ];
     
    public function articles(){
        return $this->belongsToMany('App\Article');
    }
}
