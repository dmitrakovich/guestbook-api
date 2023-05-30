<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;

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

        return response()->json($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request): JsonResponse
    {
        $review = $this->reviewService->createReview($request->validated());

        return response()->json($review, 201);
    }
}
