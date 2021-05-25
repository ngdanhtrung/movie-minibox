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
            ->where(['movieName' => $movie])
            ->first();
    }
    public function getNowShowing()
    {
        return $this->asArray()
            ->where(['premiereDate <=' => date("Y-m-d")])
            ->orderBy('premiereDate', 'asc')
            ->findAll(12, 0);
    }
    public function getComingSoon()
    {
        return $this->asArray()
            ->where(['premiereDate >=' => date("Y-m-d")])
            ->orderBy('premiereDate', 'asc')
            ->findAll();
    }
}
