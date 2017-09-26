<?php

declare(strict_types=1);

namespace ApiV1\Models;

use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string username
 * @property string nickname
 * @property string description
 * @property string banner
 * @property string avatar
 * @property int vk_id
 * @property int ok_id
 * @property int facebook_id
 * @property User[] followers
 * @property User[] following
 * @property int followers_count
 * @property int following_count
 * @property Question[] questions
 * @property Reply[] replies
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'banner', 'avatar', 'facebook_id', 'nickname'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * @return null|string
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatar ? env('APP_URL') . '/storage/avatars/' . $this->avatar : null;
    }

    /**
     * @return null|string
     */
    public function getBannerUrl(): ?string
    {
        return $this->banner ? env('APP_URL') . '/storage/banners/' . $this->banner : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }
}
