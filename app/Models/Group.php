<?php

declare(strict_types=1);

namespace App\Models;

class Group extends BaseModel
{
    public function record_count()
    {
        return $this->db->table('groups')->countAll();
    }

    public function get_all($attrib, $order, $limit = null, $start = null)
    {
        return $this->db->table('groups')
            ->orderBy($attrib, $order)
            ->limit($limit, $start)
            ->get()
            ->getResultArray();
    }

    public function deletegroup($gid)
    {
        $this->db->table('group_members')->where('group_id', $gid)->delete();

        return $this->db->table('groups')->where('gid', $gid)->delete();
    }

    public function add()
    {
        $data = [
            'type' => $this->request()->getPost('type'),
            'name' => $this->request()->getPost('name'),
        ];
        $this->db->table('groups')->insert($data);
    }

    public function get_one($id)
    {
        $res = $this->db->table('groups')->where('gid', $id)->get()->getResultArray();

        return $res[0];
    }

    public function get_sunday_classes()
    {
        return $this->db->table('groups')
            ->where('type', 'የሰንበት ትምህርት ቡድን')
            ->get()
            ->getResultArray();
    }

    public function get_assigned_groups($id)
    {
        return $this->db->table('groups')
            ->select('groups.gid, groups.name, groups.type, groups.created, group_members.role')
            ->join('group_members', 'groups.gid = group_members.group_id', 'inner')
            ->where('group_members.member_id', $id)
            ->get()
            ->getResultArray();
    }
}
