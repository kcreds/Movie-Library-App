<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Resources\V1\MovieCollection;
use App\Http\Resources\V1\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        return new MovieCollection(Movie::all());
    }

    public function store(StoreMovieRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imagePath = $image->store('movies', 'public');
            $validatedData['image'] = $imagePath;
        }

        Movie::create($validatedData);

        return response()->json('Movie Created');
    }

    public function update(StoreMovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $validatedData = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imagePath = $image->store('movies', 'public');

            if ($movie->image) {
                Storage::disk('public')->delete($movie->image);
            }

            $validatedData['image'] = $imagePath;
        }

        $movie->update($validatedData);

        return response()->json('Movie Updated');
    }
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::disk('public')->delete($movie->image);
        }

        $movie->delete();
        return response()->json('Movie Deleted');
    }

    public function redirectToSlug($slug)
    {
        $movie = Movie::where('slug', $slug)->first();

        if (!$movie) {
            $movie = Movie::where('id', $slug)->first();
        }

        if (!$movie) {
            abort(404, 'Movie not found');
        }

        return new MovieResource($movie);
    }
}
