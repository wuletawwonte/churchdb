<?php

declare(strict_types=1);

namespace App\Models;

class User extends BaseModel
{
    public function user_can_log_in($username, $password)
    {
        $data  = ['username' => $username, 'password' => md5($password)];
        $query = $this->db->table('users')->where($data)->get();

        if ($query->getNumRows() === 1) {
            $row = $query->getResultArray();
            $input_data = [
                'login_count' => (int) $row[0]['login_count'] + 1,
            ];
            $fields = $this->db->getFieldNames('users');
            if (is_array($fields) && in_array('last_login', $fields, true)) {
                $input_data['last_login'] = date('Y-m-d H:i:s');
            }
            $this->db->table('users')->where('username', $username)->update($input_data);

            return true;
        }

        return false;
    }

    public function get_user($attrib, $username)
    {
        $res = $this->db->table('users')->where($attrib, $username)->get()->getResultArray();
        $row = $res[0];
        $row['profile_picture'] = $row['profile_picture'] ?? null;

        return $row;
    }

    public function add()
    {
        $cnfg = model('Cnfg');
        $psw  = $cnfg->get('default_password') ?: '123456';
        $user_type = 'መደበኛ ተጠቃሚ';
        if ($this->request()->getPost('administrator')) {
            $user_type = 'የሲስተም አስተዳደር';
        }

        $data = [
            'firstname'                  => $this->request()->getPost('firstname'),
            'lastname'                   => $this->request()->getPost('lastname'),
            'username'                   => $this->request()->getPost('username'),
            'password'                   => md5((string) $psw),
            'user_type'                  => $user_type,
            'p_register_member'          => $this->request()->getPost('p_register_member'),
            'p_edit_member'              => $this->request()->getPost('p_edit_member'),
            'p_delete_member'            => $this->request()->getPost('p_delete_member'),
            'p_manage_form'              => $this->request()->getPost('p_manage_form'),
            'p_manage_group'             => $this->request()->getPost('p_manage_group'),
            'p_generate_member_report'   => $this->request()->getPost('p_generate_member_report'),
        ];

        return $this->db->table('users')->insert($data);
    }

    public function edit($uid)
    {
        $user_type = 'መደበኛ ተጠቃሚ';
        if ($this->request()->getPost('administrator')) {
            $user_type = 'የሲስተም አስተዳደር';
        }

        $data = [
            'firstname'                  => $this->request()->getPost('firstname'),
            'lastname'                   => $this->request()->getPost('lastname'),
            'username'                   => $this->request()->getPost('username'),
            'user_type'                  => $user_type,
            'p_register_member'          => $this->request()->getPost('p_register_member'),
            'p_edit_member'              => $this->request()->getPost('p_edit_member'),
            'p_delete_member'            => $this->request()->getPost('p_delete_member'),
            'p_manage_form'              => $this->request()->getPost('p_manage_form'),
            'p_manage_group'             => $this->request()->getPost('p_manage_group'),
            'p_generate_member_report'   => $this->request()->getPost('p_generate_member_report'),
        ];

        return $this->db->table('users')->where('id', $uid)->update($data);
    }

    public function get_all()
    {
        return $this->db->table('users')->get()->getResultArray();
    }

    public function get_my($attrib)
    {
        $data = $this->db->table('users')
            ->where('username', session()->get('current_user')['username'])
            ->get()
            ->getResultArray();

        return $data[0][$attrib];
    }

    public function edit_one($attrib, $value)
    {
        $this->db->table('users')
            ->where('username', session()->get('current_user')['username'])
            ->update([$attrib => $value]);
    }

    public function delete_user($uid)
    {
        return $this->db->table('users')->where('id', $uid)->delete();
    }

    public function users_count()
    {
        return $this->db->table('users')->countAll();
    }

    public function get_all_users($limit = null, $start = null)
    {
        return $this->db->table('users')
            ->limit($limit, $start)
            ->get()
            ->getResultArray();
    }

    public function changepassword()
    {
        $data = ['password' => md5((string) $this->request()->getPost('new_password'))];

        return $this->db->table('users')->where('id', session()->get('current_user')['id'])->update($data);
    }

    public function saveprofilechange($profile_picture)
    {
        $current_user = $this->get_current_user();
        if ($current_user === null) {
            return false;
        }

        $data = [
            'firstname'       => $this->request()->getPost('firstname'),
            'lastname'        => $this->request()->getPost('lastname'),
            'username'        => $this->request()->getPost('username'),
            'profile_picture' => $profile_picture,
        ];
        if ($profile_picture == null) {
            $data['profile_picture'] = $current_user['profile_picture'] ?? null;
        }

        return $this->db->table('users')->where('id', $current_user['id'])->update($data);
    }

    public function get_current_user(): ?array
    {
        $sessionUser = session()->get('current_user');
        if (! is_array($sessionUser) || ! isset($sessionUser['id'])) {
            return null;
        }

        $row = $this->db->table('users')
            ->where('id', $sessionUser['id'])
            ->get()
            ->getFirstRow('array');

        if ($row === null) {
            return null;
        }

        $row['profile_picture'] = $row['profile_picture'] ?? null;

        return $row;
    }
}
