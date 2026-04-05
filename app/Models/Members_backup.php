<?php

declare(strict_types=1);

namespace App\Models;

class Members_backup extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('members_backups')->get()->getResultArray();
    }

    public function add($filename)
    {
        $data = [
            'title'    => date('F j, Y'),
            'filename' => $filename,
        ];
        $this->db->table('members_backups')->insert($data);
    }

    public function delete($id)
    {
        return $this->db->table('members_backups')->where('id', $id)->delete();
    }
}
