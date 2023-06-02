<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    /**
     * ReviewController constructor.
     */
    public function __construct(private ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * Display a paginated list of reviews with replies.
     */
    public function index()
    {
        $reviews = $this->reviewService->getPaginatedReviewsWithReplies();

        return ReviewResource::collection($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request): ReviewResource
    {
        $review = $this->reviewService->createReview($request->validated());

        return new ReviewResource($review);
    }
}
