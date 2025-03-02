<?php

namespace App\Services;
use App\Models\Movie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CreateMovieService
{
    /**
     * Create a new class instance.
     */
    public function store()
    {   
        $movie = new Movie();

        $thumbnailPath =  Storage::url(Storage::put('public/movies', UploadedFile::fake()->image('photo1.jpg', 300, 300)->size(100)));
        
        $movie ->fill([
            'title' =>'Movie '. mt_rand(1,100).Str::random(4),
            'duration' => 90,
            'country' => Str::random(10),
            'director' => Str::random(10),
            'description' => Str::random(20),
            'thumbnail' =>  $thumbnailPath,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $movie->save();
    }
}
