<?php

declare(strict_types=1);

namespace App\Models;

class Group_member extends BaseModel
{
    public function add_group_member()
    {
        $data = [
            'group_id'  => $this->request()->getPost('group_id'),
            'member_id' => $this->request()->getPost('member_id'),
            'role'      => $this->request()->getPost('role'),
        ];
        $this->db->table('group_members')->insert($data);
    }

    public function remove_group_member($mid, $gid)
    {
        $this->db->table('group_members')
            ->where('member_id', $mid)
            ->where('group_id', $gid)
            ->delete();
    }
}
