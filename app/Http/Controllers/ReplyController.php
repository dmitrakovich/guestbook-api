<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;

class ReplyController extends Controller
{
    /**
     * ReplyController constructor.
     */
    public function __construct(private ReviewService $reviewService)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReplyRequest $request, Review $review): JsonResponse
    {
        $reply = $this->reviewService->createReply($review, $request->validated());

        return response()->json($reply, 201);
    }
}
