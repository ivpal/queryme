<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @package App\Models
 * @property int id
 * @property string content
 * @property int user_id
 * @property Reply[] replies
 * @property User user
 * @property User[] likes
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Question extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function likes()
    {
        return $this->morphToMany(User::class, 'likable');
    }
}