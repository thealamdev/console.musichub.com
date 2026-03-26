<?php

namespace App\Http\Controllers;

use App\DTOs\SongDTO;
use App\Helpers\ApiResponse;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSongRequest;
use App\Http\Resources\SongResource;
use App\Services\SongService;
use Illuminate\Http\JsonResponse;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @SongService $service
     */
    public function index(SongService $service): JsonResponse
    {
        try {
            $data = $service->getAll();
            return ApiResponse::success(
                data: SongResource::collection(resource: $data),
                message: 'Songs retrieved successfully'
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                code: $e->getCode(),
                errors: $e
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     * @StoreSongRequest $request
     * @SongService $service
     */
    public function store(StoreSongRequest $request, SongService $service)
    {
        try {
            $data = SongDTO::fromRequest($request);
            $song = $service->store($data);
            return ApiResponse::success(
                data: new SongResource($song),
                message: 'Song created successfully'
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                code: $e->getCode()
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
