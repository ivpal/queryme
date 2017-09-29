<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Follower
 * @package ApiV1\Models
 * @property int follower_id
 * @property int following_id
 * @property Carbon created_at
 */
class Follower extends Model
{
    /** @var array */
    protected $fillable = ['follower_id', 'following_id'];

    /** @var bool */
    public $timestamps = false;

    public function setCreatedAtAttribute()
    {
        $this->attributes['created_at'] = Carbon::now();
    }
}