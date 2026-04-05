<?php

declare(strict_types=1);

namespace App\Models;

class Note extends BaseModel
{
    public function add()
    {
        $data = [
            'member_id'    => $this->request()->getPost('member_id'),
            'note_content' => $this->request()->getPost('note_content'),
            'user_id'      => session()->get('current_user')['id'],
        ];

        return $this->db->table('notes')->insert($data);
    }

    public function get_notes($id)
    {
        return $this->db->table('notes')
            ->where('member_id', $id)
            ->join('users', 'notes.user_id = users.id')
            ->get()
            ->getResultArray();
    }
}
