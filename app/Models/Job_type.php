<?php

declare(strict_types=1);

namespace App\Models;

class Job_type extends BaseModel
{
    public function get_all()
    {
        return $this->db->table('job_types')->get()->getResultArray();
    }

    public function add_choice()
    {
        $data = ['job_type_title' => $this->request()->getPost('job_type_title')];

        return $this->db->table('job_types')->insert($data);
    }

    public function delete_choice($jtid)
    {
        if (! $this->db->table('job_types')->where('Job_type_id', $jtid)->delete()) {
            return false;
        }
        $this->db->table('members')->where('job_type', $jtid)->update(['job_type' => 1]);

        return true;
    }
}
