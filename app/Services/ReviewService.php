<?php

namespace App\Services;

use App\Events\ReplyCreated;
use App\Events\ReviewCreated;
use App\Models\Reply;
use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewService
{
    /**
     * The default number of reviews per page.
     */
    const REVIEWS_PER_PAGE = 10;

    /**
     * Create a new review.
     */
    public function createReview(array $data): Review
    {
        $review = Review::create($data);

        event(new ReviewCreated($review));

        return $review;
    }

    /**
     * Create a new reply for a review.
     */
    public function createReply(Review $review, array $data): Reply
    {
        $reply = $review->replies()->create($data);

        event(new ReplyCreated($review->user, $reply));

        return $reply;
    }

    /**
     * Get the paginated reviews with replies.
     */
    public function getPaginatedReviewsWithReplies(?int $perPage = null): LengthAwarePaginator
    {
        return Review::with('replies')->paginate($perPage ?? self::REVIEWS_PER_PAGE);
    }
}
