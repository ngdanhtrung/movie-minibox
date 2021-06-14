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
    public function getPaymentByUser($id = NULL, $offset = 0)
    {
        if ($offset > 0) $offset = ($offset - 1) * 6;
        return $this->asArray()
            ->select('payment.id, cinemaName, cinemaAddress, date, movieName, showtime, endtime, room, seat, amount, image')
            ->join('showing', 'showing.id = payment.showingId')
            ->join('movie', 'movie.id = showing.movieId')
            ->join('cinema', 'cinema.id = showing.cinemaId')
            ->where(['payment.userId' => $id])
            ->orderBy('payment.id', 'desc')
            ->findAll(6, $offset);
    }
    public function getPages($id = NULL)
    {
        return $this->asArray()
            ->select('COUNT(payment.id)')
            ->where(['payment.userId' => $id])
            ->findAll();
    }
}
