<?php

declare(strict_types=1);

namespace App\Models;

class Ministry extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('ministries')
            ->orderBy('ministry_id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add_choice()
    {
        $data = ['ministry_title' => $this->request()->getPost('ministry_title')];

        return $this->db->table('ministries')->insert($data);
    }

    public function delete_choice($mid)
    {
        if (! $this->db->table('ministries')->where('ministry_id', $mid)->delete()) {
            return false;
        }
        $this->db->table('members')->where('ministry', $mid)->update(['ministry' => 1]);

        return true;
    }

    public function update_ministry()
    {
        $old = $this->request()->getPost('ministry_old_title');
        $new = $this->request()->getPost('ministry_new_title');
        $this->db->table('ministries')->where('ministry_title', $old)->update(['ministry_title' => $new]);
        $this->db->table('members')->where('ministry', $old)->update(['ministry' => $new]);

        return true;
    }

    public function from_id($id)
    {
        $res = $this->db->table('ministries')->where('ministry_id', $id)->get()->getResultArray();

        return $res[0];
    }

    public function delete_ministry($id, $title)
    {
        $this->db->table('ministries')->where('ministry_id', $id)->delete();
        $this->db->table('members')->where('ministry', $title)->update(['ministry' => '']);

        return true;
    }
}
