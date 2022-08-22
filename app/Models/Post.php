<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Post
{

    public function __construct($title, $content,$date,$body,$slug)
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

    public static function all(){

        return collect(File::files(\resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parse(file_get_contents($file)))
        ->map(fn($document) => new Post(
            $document->title, 
            $document->content,
            $document->date,
            $document->body(),
            $document->slug));
    }

    


    public static function find($slug){
        $posts = static::all();

       return $posts->firstWhere('slug', $slug);

        
    }




}

