<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 * @package App\Models
 */
class Like extends Model
{
    /** @var bool */
    public $timestamps = false;

    public function setCreatedAtAttribute()
    {
        $this->attributes['created_at'] = Carbon::now();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function questions()
    {
        return $this->morphedByMany(Question::class, 'likable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function replies()
    {
        return $this->morphedByMany(Reply::class, 'likable');
    }
}