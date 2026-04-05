<?php

declare(strict_types=1);

namespace App\Models;

class Kifle_ketema extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('kifle_ketemas')
            ->orderBy('kifle_ketema_id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add_choice()
    {
        $data = ['kifle_ketema_title' => $this->request()->getPost('kifle_ketema_title')];

        return $this->db->table('kifle_ketemas')->insert($data);
    }

    public function from_id($id)
    {
        $res = $this->db->table('kifle_ketemas')->where('kifle_ketema_id', $id)->get()->getResultArray();

        return $res[0];
    }

    public function update_kifle_ketema()
    {
        $old = $this->request()->getPost('kifle_ketema_old_title');
        $new = $this->request()->getPost('kifle_ketema_new_title');
        $this->db->table('kifle_ketemas')->where('kifle_ketema_title', $old)->update(['kifle_ketema_title' => $new]);
        $this->db->table('kebeles')->where('kifle_ketema_title', $old)->update(['kifle_ketema_title' => $new]);
        $this->db->table('members')->where('kifle_ketema', $old)->update(['kifle_ketema' => $new]);

        return true;
    }

    public function delete_kifle_ketema($id, $title)
    {
        $this->db->table('kifle_ketemas')->where('kifle_ketema_id', $id)->delete();
        $kebeles = $this->db->table('kebeles')->where('kifle_ketema_title', $title)->get()->getResultArray();
        foreach ($kebeles as $kebele) {
            $this->db->table('menders')->where('kebele_title', $kebele['kebele_title'])->delete();
        }
        $this->db->table('kebeles')->where('kifle_ketema_title', $title)->delete();
        $this->db->table('members')->where('kifle_ketema', $title)->update([
            'kifle_ketema' => '',
            'kebele'       => '',
            'mender'       => '',
        ]);

        return true;
    }
}
