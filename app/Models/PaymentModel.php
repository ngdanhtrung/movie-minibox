<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';

    protected $allowedFields = ['ammount', 'date', 'seat'];

    public function getBookedSeats($id = NULL)
    {
        return $this->asArray()
            ->select('showingId, seat')
            ->join('showing', 'showing.id = payment.showingId')
            ->where(['payment.showingId' => $id])
            ->findAll();
    }
}
