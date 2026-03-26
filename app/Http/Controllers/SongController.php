<?php

namespace App\Http\Controllers;

use App\DTOs\Song\StoreSongData;
use App\DTOs\Song\UpdateSongData;
use App\Helpers\ApiResponse;
use App\Models\Song;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
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
            $data = StoreSongData::make($request);
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
     * Update the specified resource in storage.
     * @UpdateSongRequest $request, 
     * @SongService $service, 
     * @Song $song
     */
    public function update(UpdateSongRequest $request, SongService $service, Song $song)
    {
        try {
            $data = UpdateSongData::make($request);
            $response = $service->update($data, $song);
            return ApiResponse::success(
                data: new SongResource($response),
                message: 'Song Update successfully'
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                code: $e->getCode()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
