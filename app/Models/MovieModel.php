<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movie';

    protected $allowedFields = ['movieName', 'director', 'actors', 'genre', 'duration', 'premiereDate', 'language', 'image'];

    public function getPosts($movie = null)
    {
        if (!$movie) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['movie' => $movie])
            ->first();
    }
}
