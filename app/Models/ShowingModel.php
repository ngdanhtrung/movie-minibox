<?php

namespace App\Models;

use CodeIgniter\Model;

class ShowingModel extends Model
{
    protected $table = 'showing';

    protected $allowedFields = ['showTime', 'datePlayed', 'room'];

    public function getShowing($id = NULL)
    {
        return $this->asArray()
            ->join('movie', 'movie.id = showing.movieId')
            ->where(['movie.id' => $id])
            ->findAll();
    }
}
