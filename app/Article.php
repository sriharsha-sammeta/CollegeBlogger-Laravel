<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'
    ];
    protected $dates = ['published_at'];

    /*
     * for setting published_at attribute
     *
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = ($date > date('Y-m-d')) ? Carbon::parse($date) : Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopePublished($query, $op)
    {
        return $query->where('published_at', $op, Carbon::now());
    }

    /**
     * Article is owned by a User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
