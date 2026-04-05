<?php

declare(strict_types=1);

namespace App\Models;

class Kebele extends BaseModel
{
    public function fetch_kebeles($kifle_ketema_title)
    {
        $res = $this->db->table('kebeles')
            ->where('kifle_ketema_title', $kifle_ketema_title)
            ->orderBy('kebele_title', 'ASC')
            ->get();
        $output = '<option value="">አልተመረጠም</option>';
        foreach ($res->getResult() as $row) {
            $output .= '<option value="' . $row->kebele_title . '">' . $row->kebele_title . '</option>';
        }

        return $output;
    }

    public function get_all()
    {
        return $this->db->table('kebeles')->get()->getResultArray();
    }

    public function get_from_kifle_ketema($kifle_ketema)
    {
        return $this->db->table('kebeles')
            ->where('kifle_ketema_title', $kifle_ketema)
            ->get()
            ->getResultArray();
    }

    public function from_id($id)
    {
        $res = $this->db->table('kebeles')->where('kebele_id', $id)->get()->getResultArray();

        return $res[0];
    }

    public function add_choice()
    {
        $data = [
            'kebele_title'       => $this->request()->getPost('kebele_title'),
            'kifle_ketema_title' => $this->request()->getPost('kifle_ketema_title'),
        ];

        return $this->db->table('kebeles')->insert($data);
    }

    public function update_kebele()
    {
        $old = $this->request()->getPost('kebele_old_title');
        $new = $this->request()->getPost('kebele_new_title');
        $this->db->table('kebeles')->where('kebele_title', $old)->update(['kebele_title' => $new]);
        $this->db->table('menders')->where('kebele_title', $old)->update(['kebele_title' => $new]);
        $this->db->table('members')->where('kebele', $old)->update(['kebele' => $new]);

        return true;
    }

    public function delete_kebele($id, $title)
    {
        $this->db->table('kebeles')->where('kebele_id', $id)->delete();
        $this->db->table('menders')->where('kebele_title', $title)->delete();
        $this->db->table('members')->where('kebele', $title)->update(['kebele' => '', 'mender' => '']);

        return true;
    }
}
