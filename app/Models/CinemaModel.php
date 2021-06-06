<?php

namespace App\Models;

use CodeIgniter\Model;

class CinemaModel extends Model
{
    protected $table = 'cinema';

    protected $allowedFields = ['cinemaName', 'cinemaAddress'];
    public function getCinemas()
    {
        return $this->findAll();
    }
}
