<?php

declare(strict_types=1);

namespace App\Models;

class Membership_cause extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('membership_causes')->get()->getResultArray();
    }

    public function add_choice()
    {
        $data = ['membership_cause_title' => $this->request()->getPost('membership_cause_title')];

        return $this->db->table('membership_causes')->insert($data);
    }

    public function delete_choice($mcid)
    {
        if (! $this->db->table('membership_causes')->where('membership_cause_id', $mcid)->delete()) {
            return false;
        }
        $this->db->table('members')->where('membership_cause', $mcid)->update(['membership_cause' => 1]);

        return true;
    }

    public function update_membership_cause()
    {
        $old = $this->request()->getPost('membership_cause_old_title');
        $new = $this->request()->getPost('membership_cause_new_title');
        $this->db->table('membership_causes')->where('membership_cause_title', $old)->update(['membership_cause_title' => $new]);
        $this->db->table('members')->where('membership_cause', $old)->update(['membership_cause' => $new]);

        return true;
    }

    public function from_id($id)
    {
        $res = $this->db->table('membership_causes')->where('membership_cause_id', $id)->get()->getResultArray();

        return $res[0];
    }

    public function delete_membership_cause($id, $title)
    {
        $this->db->table('membership_causes')->where('membership_cause_id', $id)->delete();
        $this->db->table('members')->where('membership_cause', $title)->update(['membership_cause' => '']);

        return true;
    }
}
