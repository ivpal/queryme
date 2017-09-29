<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reply
 * @package App\Models
 * @property int id
 * @property string content
 * @property int question_id
 * @property int user_id
 * @property Question question
 * @property User user
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Reply extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }
}