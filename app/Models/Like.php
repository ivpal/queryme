<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 * @package App\Models
 */
class Like extends Model
{
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