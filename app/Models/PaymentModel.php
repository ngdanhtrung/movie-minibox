<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';

    protected $allowedFields = ['userId', 'showingId', 'amount', 'date', 'seat'];

    public function getBookedSeats($id = NULL)
    {
        return $this->asArray()
            ->select('showingId, seat')
            ->join('showing', 'showing.id = payment.showingId')
            ->where(['payment.showingId' => $id])
            ->findAll();
    }
    public function getPaymentByUser($id = NULL)
    {
        return $this->asArray()
            ->select('payment.id, cinemaName, cinemaAddress, date, movieName, showtime, room, seat, amount, image')
            ->join('showing', 'showing.id = payment.showingId')
            ->join('movie', 'movie.id = showing.movieId')
            ->join('cinema', 'cinema.id = showing.cinemaId')
            ->where(['payment.userId' => $id])
            ->orderBy('showing.showtime', 'asc')
            ->findAll(10, 0);
    }
}
