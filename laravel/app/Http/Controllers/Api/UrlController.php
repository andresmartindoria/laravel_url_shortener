<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;
//use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UrlResource::collection(Url::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = Url::create($request->validated());
        return new UrlResource($url);
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        return new UrlResource($url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        $url->update($request->validated());
        return new CompanyResource($url);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return response()->noContent();
    }
}
