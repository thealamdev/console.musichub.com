<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Services\SongServices;
use App\Http\Requests\StoreSongRequest;
use App\Http\Resources\SongResource;
use Illuminate\Http\JsonResponse;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SongServices $service): JsonResponse
    {
        try {
            $res = SongResource::collectiond(resource: $service->getSongs());
            return ApiResponse::success(data: $res, message: 'Songs retrieved successfully');
        } catch (\Exception $e) {
            return ApiResponse::error(message: $e->getMessage(), code: $e->getCode(), errors: $e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request, SongServices $service)
    {
        try {
            $res = $service->storeSong(data: $request->sanitizedValues());
            return ApiResponse::success(data: $res, message: 'Song created successfully');
        } catch (\Exception $e) {
            return ApiResponse::error(message: $e->getMessage(), code: $e->getCode());
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
