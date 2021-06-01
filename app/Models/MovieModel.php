<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movie';

    protected $allowedFields = ['movieName', 'director', 'actors', 'genre', 'duration', 'premiereDate', 'language', 'image', 'bigImage'];

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
            ->where(['isShowing' => 1, 'premiereDate <=' => date("Y-m-d")])
            ->orderBy('premiereDate', 'desc')
            ->findAll();
    }
    public function getComingSoon()
    {
        return $this->asArray()
            ->where(['isShowing' => 0])
            ->orderBy('premiereDate', 'desc')
            ->findAll();
    }
    public function getMovie($id = NULL)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
}
