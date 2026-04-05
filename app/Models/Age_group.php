<?php

declare(strict_types=1);

namespace App\Models;

class Age_group extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('age_groups')->get()->getResultArray();
    }

    public function editagegroup()
    {
        $data = [
            'start_age' => $this->request()->getPost('start_age'),
            'end_age'   => $this->request()->getPost('end_age'),
        ];

        return $this->db->table('age_groups')
            ->where('ag_id', $this->request()->getPost('ag_id'))
            ->update($data);
    }

    public function get_one($id)
    {
        return $this->db->table('age_groups')
            ->where('age_groups.ag_id', $id)
            ->get()
            ->getResultArray()[0];
    }
}
