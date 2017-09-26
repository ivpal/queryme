<?php

namespace ApiV1\Models;

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
}