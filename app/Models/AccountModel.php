<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['email', 'phoneNumber', 'username', 'passwordHash', 'dob'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['passwordHash']))
            $data['data']['passwordHash'] = password_hash($data['data']['passwordHash'], PASSWORD_DEFAULT);

        return $data;
    }

    public function getUser($uid = NULL)
    {
        return $this->asArray()
            ->where(['id' => $uid])
            ->first();
    }
}
