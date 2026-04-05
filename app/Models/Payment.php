<?php

declare(strict_types=1);

namespace App\Models;

class Payment extends BaseModel
{
    public function add()
    {
        $data = [
            'member_id'      => $this->request()->getPost('member_id'),
            'payment_type'   => $this->request()->getPost('payment_type'),
            'payment_amount' => $this->request()->getPost('payment_amount'),
        ];
        if (! $this->db->table('payments')->insert($data)) {
            return false;
        }

        return $this->db->insertID();
    }

    public function get_payments($id)
    {
        return $this->db->table('payments')
            ->where('member_id', $id)
            ->get()
            ->getResultArray();
    }

    public function get_details($pid)
    {
        $rows = $this->db->table('payments')
            ->select('*, payments.id as pid')
            ->join('members', 'members.id = payments.member_id')
            ->where('payments.id', $pid)
            ->get()
            ->getResultArray();

        return $rows[0];
    }

    public function get_all()
    {
        return $this->db->table('payments')
            ->select('*, payments.id as pid')
            ->join('members', 'members.id = payments.member_id')
            ->get()
            ->getResultArray();
    }
}
