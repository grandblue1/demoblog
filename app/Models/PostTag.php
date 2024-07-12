<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $post_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Post $posts
 * @property-read \App\Models\Tag $tags
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag withoutTrashed()
 * @mixin \Eloquent
 */
class PostTag extends Pivot
{
    use SoftDeletes;
    public $incrementing = true;
    protected $table = 'post_tags';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function tags(){
        return $this->belongsTo(Tag::class,'tag_id');
    }
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
