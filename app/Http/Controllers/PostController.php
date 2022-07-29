<?php

namespace App\Http\Controllers;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    private PostRepositoryInterface $PostRepository;

    public function __construct(PostRepositoryInterface $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->PostRepository->getAllPosts()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $postContent = $request->only([
            'author',
            'content'
        ]);

        return response()->json(
            [
                'data' => $this->PostRepository->createPost($postContent)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $postId = $request->route('id');

        return response()->json([
            'data' => $this->PostRepository->getPostById($postId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $postId = $request->route('id');
        $postContent = $request->only([
            'author',
            'content'
        ]);
        // dd($postContent);
        return response()->json([
            'data' => $this->PostRepository->updatePost($postId, $postContent)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $postId = $request->route('id');
        $this->PostRepository->deletePost($postId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
