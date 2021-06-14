<?php

namespace App\Models;

use CodeIgniter\Model;

class ShowingModel extends Model
{
    protected $table = 'showing';

    protected $allowedFields = ['showTime', 'endtime', 'datePlayed', 'room'];

    public function getShowing($id = NULL, $date = NULL, $showTime = NULL)
    {
        return $this->asArray()
            ->select('showing.id, cinemaName, showtime')
            ->join('movie', 'movie.id = showing.movieId')
            ->join('cinema', 'cinema.id = showing.cinemaId')
            ->where(['movie.id' => $id, 'DATE(showtime)' => $date, 'endtime >=' => $showTime])
            ->findAll();
    }
}
