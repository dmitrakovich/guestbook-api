<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

/**
 * Class Reply
 *
 * @package App\Models
 * @property int $id
 * @property int $review_id
 * @property int $user_id
 * @property string $content
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \App\Models\User $user
 * @property \App\Models\Review $review
 */
class Reply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'review_id',
        'user_id',
    ];

    /**
     * Get the user who created the review.
     */
    public function user(): Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the review that the reply belongs to.
     */
    public function review(): Relations\BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
