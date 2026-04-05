<?php

declare(strict_types=1);

namespace App\Models;

class Timeline extends BaseModel
{
    public function get_timeline($id)
    {
        return $this->db->table('timelines')
            ->where('member_id', $id)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }
}
