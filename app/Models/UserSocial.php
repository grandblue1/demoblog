<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\UserCreated;
use App\Events\UserSocialUpdated;

/**
 * 
 *
 * @property int $id
 * @property string $provider
 * @property string $provider_id
 * @property string $provider_token
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereProviderToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereUserId($value)
 * @mixin \Eloquent
 */
class UserSocial extends Model
{
    use HasFactory;

    protected $table = "user_social";
    protected $fillable = ['user_id', 'provider_id', 'provider_token', 'provider'];
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
        'updated' => UserSocialUpdated::class,
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
