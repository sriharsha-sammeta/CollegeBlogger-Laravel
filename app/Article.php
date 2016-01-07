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

    /**
     * gets the published_at attribure formatted as 'Y-m-d'
     *
     * also, $date will be a string from the db-> needs to be converted to Carbon instance for further processing
     * if, this method is not there then Laravel would have automatically created the Carbon instance for us.
     * since we are interrupting in between, we have to parse it
     *
     * @param $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     *
     * scope to retrieve only published articles
     *
     * @param $query
     * @param $op
     * @return mixed
     */
    public function scopePublished($query, $op)
    {
        return $query->where('published_at', $op, Carbon::now());
    }

    /**
     * this is a dummy attribute with only a getter
     * if someone sets it in mass assignment -> it will fail
     * if someone sets it indivudally -> it will pass like any other random attribute
     * if you save it to db then it will fail as this column is not made in db !
     *
     * this is only for show.blade.php to demonstrate diffForHumans method of Carbon
     * ex: posted 3 mins back
     *
     * @return static
     */

    public function getRealPublishedAtAttribute(){
        return Carbon::parse($this->attributes['published_at']);
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


    /**
     * Gets the tags associated with the article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Gets list of tag ids associated with a current article
     *
     * @return mixed
     */
    public function getTagListAttribute()
    {
        //we can do $article->tag_list
        return $this->tags->lists('id')->toArray();
    }
}
