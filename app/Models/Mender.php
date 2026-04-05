<?php

declare(strict_types=1);

namespace App\Models;

class Mender extends BaseModel
{
    public function fetch_menders($kebele_title)
    {
        $res = $this->db->table('menders')
            ->where('kebele_title', $kebele_title)
            ->orderBy('mender_title', 'ASC')
            ->get();
        $output = '<option value="">አልተመረጠም</option>';
        foreach ($res->getResult() as $row) {
            $output .= '<option value="' . $row->mender_title . '">' . $row->mender_title . '</option>';
        }

        return $output;
    }

    public function get_all()
    {
        return $this->db->table('menders')->get()->getResultArray();
    }

    public function from_id($id)
    {
        $res = $this->db->table('menders')->where('mender_id', $id)->get()->getResultArray();

        return $res[0];
    }

    public function get_from_kebele($kebele)
    {
        return $this->db->table('menders')
            ->where('kebele_title', $kebele)
            ->get()
            ->getResultArray();
    }

    public function add_choice()
    {
        $data = [
            'mender_title' => $this->request()->getPost('mender_title'),
            'kebele_title' => $this->request()->getPost('kebele_title'),
        ];

        return $this->db->table('menders')->insert($data);
    }

    public function update_mender()
    {
        $old = $this->request()->getPost('mender_old_title');
        $new = $this->request()->getPost('mender_new_title');
        $this->db->table('menders')->where('mender_title', $old)->update(['mender_title' => $new]);
        $this->db->table('members')->where('mender', $old)->update(['mender' => $new]);

        return true;
    }

    public function delete_mender($id, $title)
    {
        $this->db->table('menders')->where('mender_id', $id)->delete();
        $this->db->table('members')->where('mender', $title)->update(['mender' => '']);

        return true;
    }
}
