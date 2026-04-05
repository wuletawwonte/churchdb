<?php

declare(strict_types=1);

namespace App\Models;

class Membership_level extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('membership_levels')
            ->orderBy('membership_level_id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add_choice()
    {
        $data = ['membership_level_title' => $this->request()->getPost('membership_level_title')];

        return $this->db->table('membership_levels')->insert($data);
    }

    public function delete_choice($mlid)
    {
        if (! $this->db->table('membership_levels')->where('membership_level_id', $mlid)->delete()) {
            return false;
        }
        $this->db->table('members')->where('Membership_level', $mlid)->update(['membership_level' => 1]);

        return true;
    }

    public function update_membership_level()
    {
        $old = $this->request()->getPost('membership_level_old_title');
        $new = $this->request()->getPost('membership_level_new_title');
        $this->db->table('membership_levels')->where('membership_level_title', $old)->update(['membership_level_title' => $new]);
        $this->db->table('members')->where('membership_level', $old)->update(['membership_level' => $new]);

        return true;
    }

    public function from_id($id)
    {
        $res = $this->db->table('membership_levels')->where('membership_level_id', $id)->get()->getResultArray();

        return $res[0];
    }

    public function delete_membership_level($id, $title)
    {
        $this->db->table('membership_levels')->where('membership_level_id', $id)->delete();
        $this->db->table('members')->where('membership_level', $title)->update(['membership_level' => '']);

        return true;
    }
}
