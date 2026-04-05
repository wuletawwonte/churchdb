<?php

declare(strict_types=1);

namespace App\Models;

class Member extends BaseModel
{
    /** @var list<string>|null */
    private ?array $membersFieldCache = null;

    /**
     * @return list<string>
     */
    private function membersFieldNames(): array
    {
        if ($this->membersFieldCache === null) {
            $names                     = $this->db->getFieldNames('members');
            $this->membersFieldCache = is_array($names) ? $names : [];
        }

        return $this->membersFieldCache;
    }

    private function membersHas(string $column): bool
    {
        return in_array($column, $this->membersFieldNames(), true);
    }

    /**
     * Active members use status = 'ያለ' when the column exists (newer schema).
     */
    private function applyActiveStatusFilter(\CodeIgniter\Database\BaseBuilder $builder, ?string $tableAlias = null): void
    {
        if (! $this->membersHas('status')) {
            return;
        }
        $key = $tableAlias === null ? 'status' : $tableAlias . '.status';
        $builder->where($key, 'ያለ');
    }

    public function add($avatar)
    {
        $colors = ['#00c0ef', '#0073b7', '#3c8dbc', '#39cccc', '#f39c12', '#ff851b', '#00a65a', '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777', '#001f3f'];
        $spouse = $this->request()->getPost('spouse');
        if ($this->request()->getPost('spouse') == 0) {
            $spouse = null;
        }

        $data = [
            'title'                 => $this->request()->getPost('title'),
            'firstname'             => $this->request()->getPost('firstname'),
            'middlename'            => $this->request()->getPost('middlename'),
            'lastname'              => $this->request()->getPost('lastname'),
            'gender'                => $this->request()->getPost('gender'),
            'kifle_ketema'          => $this->request()->getPost('kifle_ketema'),
            'kebele'                => $this->request()->getPost('kebele'),
            'mender'                => $this->request()->getPost('mender'),
            'house_number'          => $this->request()->getPost('house_number'),
            'home_phone'            => $this->request()->getPost('home_phone'),
            'level_of_education'    => $this->request()->getPost('level_of_education'),
            'field_of_study'        => $this->request()->getPost('field_of_study'),
            'job_type'              => $this->request()->getPost('job_type'),
            'workplace_name'        => $this->request()->getPost('workplace_name'),
            'workplace_phone'       => $this->request()->getPost('workplace_phone'),
            'monthly_income'        => $this->request()->getPost('monthly_income'),
            'mobile_phone'          => $this->request()->getPost('mobile_phone'),
            'email'                 => $this->request()->getPost('email'),
            'birthdate'             => $this->request()->getPost('birthdate'),
            'hide_age'              => $this->request()->getPost('hide_age'),
            'birth_place'           => $this->request()->getPost('birth_place'),
            'membership_year'       => $this->request()->getPost('membership_year'),
            'membership_cause'      => $this->request()->getPost('membership_cause'),
            'membership_level'      => $this->request()->getPost('membership_level'),
            'ministry'              => $this->request()->getPost('ministry'),
            'marital_status'        => $this->request()->getPost('marital_status'),
            'spouse'                => $spouse,
            'avatar'                => $avatar,
            'profile_color'         => $colors[array_rand($colors, 1)],
        ];

        if ($this->membersHas('status')) {
            $data['status'] = 'ያለ';
        }
        if ($this->membersHas('status_remark')) {
            $data['status_remark'] = '';
        }

        $this->db->table('members')->insert($data);
        $last_id = (int) $this->db->insertID();
        $tracked_change = [
            'by_user'        => session()->get('current_user')['firstname'] . ' ' . session()->get('current_user')['lastname'],
            'change_occured' => 'created',
            'member_id'      => $last_id,
        ];
        $this->db->table('timelines')->insert($tracked_change);

        if ($this->request()->getPost('spouse') != null) {
            $this->db->table('members')->where('id', $this->request()->getPost('spouse'))
                ->update(['marital_status' => 'ያገባ/ች', 'spouse' => $last_id]);
        }

        return true;
    }

    public function check_member()
    {
        $res = $this->db->table('members')
            ->where('firstname', $this->request()->getPost('firstname'))
            ->where('middlename', $this->request()->getPost('middlename'))
            ->get()
            ->getResultArray();

        return $res === [];
    }

    public function edit($id, $avatar)
    {
        $spouse = $this->request()->getPost('spouse');
        if ($this->request()->getPost('spouse') == 0) {
            $spouse = null;
        }

        if ($avatar == null) {
            $data = [
                'title'              => $this->request()->getPost('title'),
                'firstname'          => $this->request()->getPost('firstname'),
                'middlename'         => $this->request()->getPost('middlename'),
                'lastname'           => $this->request()->getPost('lastname'),
                'gender'             => $this->request()->getPost('gender'),
                'kifle_ketema'       => $this->request()->getPost('kifle_ketema'),
                'kebele'             => $this->request()->getPost('kebele'),
                'mender'             => $this->request()->getPost('mender'),
                'house_number'       => $this->request()->getPost('house_number'),
                'home_phone'         => $this->request()->getPost('home_phone'),
                'level_of_education' => $this->request()->getPost('level_of_education'),
                'field_of_study'     => $this->request()->getPost('field_of_study'),
                'job_type'           => $this->request()->getPost('job_type'),
                'workplace_name'     => $this->request()->getPost('workplace_name'),
                'workplace_phone'    => $this->request()->getPost('workplace_phone'),
                'monthly_income'     => $this->request()->getPost('monthly_income'),
                'mobile_phone'       => $this->request()->getPost('mobile_phone'),
                'email'              => $this->request()->getPost('email'),
                'birthdate'          => $this->request()->getPost('birthdate'),
                'hide_age'           => $this->request()->getPost('hide_age'),
                'birth_place'        => $this->request()->getPost('birth_place'),
                'membership_year'    => $this->request()->getPost('membership_year'),
                'membership_cause'   => $this->request()->getPost('membership_cause'),
                'membership_level'   => $this->request()->getPost('membership_level'),
                'ministry'           => $this->request()->getPost('ministry'),
                'marital_status'     => $this->request()->getPost('marital_status'),
                'spouse'             => $spouse,
            ];
        } else {
            $data = [
                'title'              => $this->request()->getPost('title'),
                'firstname'          => $this->request()->getPost('firstname'),
                'middlename'         => $this->request()->getPost('middlename'),
                'lastname'           => $this->request()->getPost('lastname'),
                'gender'             => $this->request()->getPost('gender'),
                'kifle_ketema'       => $this->request()->getPost('kifle_ketema'),
                'kebele'             => $this->request()->getPost('kebele'),
                'mender'             => $this->request()->getPost('mender'),
                'house_number'       => $this->request()->getPost('house_number'),
                'home_phone'         => $this->request()->getPost('home_phone'),
                'level_of_education' => $this->request()->getPost('level_of_education'),
                'field_of_study'     => $this->request()->getPost('field_of_study'),
                'job_type'           => $this->request()->getPost('job_type'),
                'workplace_name'     => $this->request()->getPost('workplace_name'),
                'workplace_phone'    => $this->request()->getPost('workplace_phone'),
                'monthly_income'     => $this->request()->getPost('monthly_income'),
                'mobile_phone'       => $this->request()->getPost('mobile_phone'),
                'email'              => $this->request()->getPost('email'),
                'birthdate'          => $this->request()->getPost('birthdate'),
                'hide_age'           => $this->request()->getPost('hide_age'),
                'birth_place'        => $this->request()->getPost('birth_place'),
                'membership_year'    => $this->request()->getPost('membership_year'),
                'membership_cause'   => $this->request()->getPost('membership_cause'),
                'membership_level'   => $this->request()->getPost('membership_level'),
                'ministry'           => $this->request()->getPost('ministry'),
                'marital_status'     => $this->request()->getPost('marital_status'),
                'spouse'             => $spouse,
                'avatar'             => $avatar,
            ];
        }

        $this->db->table('members')->where('id', $id)->update($data);
        $tracked_change = [
            'by_user'        => session()->get('current_user')['firstname'] . ' ' . session()->get('current_user')['lastname'],
            'change_occured' => 'updated',
            'member_id'      => $id,
        ];
        $this->db->table('timelines')->insert($tracked_change);

        return true;
    }

    public function get_all()
    {
        $b = $this->db->table('members');
        $this->applyActiveStatusFilter($b);

        return $b->orderBy('firstname', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function get_all_for_mobile()
    {
        $b = $this->db->table('members')
            ->select('firstname, middlename, lastname, avatar, profile_color, gender, membership_level');
        $this->applyActiveStatusFilter($b);

        return $b->orderBy('firstname', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function latest_members()
    {
        $b = $this->db->table('members');
        $this->applyActiveStatusFilter($b);

        return $b->limit(12)
            ->orderBy('created', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function record_count()
    {
        $b = $this->db->table('members');
        $this->applyActiveStatusFilter($b);

        return $b->countAllResults();
    }

    public function get_one($id = null)
    {
        $row = $this->db->table('members m')
            ->select('m.*, TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) AS age, m2.id spouse_id, CONCAT(m2.firstname, " ", m2.middlename) AS spouse_name ', false)
            ->where('m.id', $id)
            ->join('members m2', 'm.spouse = m2.id', 'left')
            ->get()
            ->getResultArray();

        return $row[0];
    }

    public function get_filtered_sorted($sage = null, $eage = null)
    {
        $fm = session()->get('filtermember') ?? [];
        $b  = $this->db->table('members m')
            ->select('m.*, TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) AS age, m2.id spouse_id, CONCAT(m2.firstname, " ", m2.middlename) AS spouse_name ', false);
        $this->applyActiveStatusFilter($b, 'm');

        if (($fm['gender'] ?? null) != null) {
            $b->where('m.gender', $fm['gender']);
        }
        if (($fm['job_type'] ?? null) != null) {
            $b->where('m.job_type', $fm['job_type']);
        }
        if (($fm['membership_level'] ?? null) != null) {
            $b->where('m.membership_level', $fm['membership_level']);
        }
        if (($fm['ministry'] ?? null) != null) {
            $b->where('m.ministry', $fm['ministry']);
        }
        if (($fm['marital_status'] ?? null) != null) {
            $b->where('m.marital_status', $fm['marital_status']);
        }
        if ($sage != null) {
            $b->where('TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) >', $sage)
                ->where('TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) <', $eage);
        }

        return $b->join('members m2', 'm.spouse = m2.id', 'left')->get()->getResultArray();
    }

    public function get_members_for_export()
    {
        $fm = session()->get('filtermember') ?? [];
        $b  = $this->db->table('members m')
            ->select('m.*, TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) AS age, m2.id spouse_id, CONCAT(m2.firstname, " ", m2.middlename) AS spouse_name ', false);

        if (($fm['gender'] ?? null) != null) {
            $b->where('m.gender', $fm['gender']);
        }
        if (($fm['job_type'] ?? null) != null) {
            $b->where('m.job_type', $fm['job_type']);
        }
        if (($fm['membership_level'] ?? null) != null) {
            $b->where('m.membership_level', $fm['membership_level']);
        }
        if (($fm['ministry'] ?? null) != null) {
            $b->where('m.ministry', $fm['ministry']);
        }
        if (($fm['marital_status'] ?? null) != null) {
            $b->where('m.marital_status', $fm['marital_status']);
        }

        return $b->orderBy('m.firstname', 'ASC')
            ->join('members m2', 'm.spouse = m2.id', 'left')
            ->get()
            ->getResultArray();
    }

    public function get_by_attrib($attrib, $id)
    {
        $res = $this->db->table('members')->where('id', $id)->get()->getResultArray();

        return $res[0][$attrib];
    }

    public function ajax_get_members()
    {
        $q = $this->request()->getGet('q');

        return $this->db->table('members')
            ->like('firstname', $q)
            ->orLike('middlename', $q)
            ->select("id,concat(firstname,' ',middlename) AS text", false)
            ->limit(8)
            ->get();
    }

    public function get_group_members($id)
    {
        return $this->db->table('members')
            ->select('*')
            ->join('group_members', 'members.id = group_members.member_id', 'inner')
            ->where('group_members.group_id', $id)
            ->get()
            ->getResultArray();
    }

    public function get_non_group_members($id)
    {
        $res = $this->db->table('group_members')->where('group_id', $id)->get()->getResultArray();
        if (count($res) === 0) {
            return $this->get_all();
        }
        $coll = [];
        foreach ($res as $key) {
            $coll[] = $key['member_id'];
        }

        return $this->db->table('members')
            ->whereNotIn('id', $coll)
            ->orderBy('firstname', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function gender_count()
    {
        $maleB = $this->db->table('members');
        $this->applyActiveStatusFilter($maleB);
        $data['male'] = $maleB->where('gender', 'ወንድ')->countAllResults();

        $femaleB = $this->db->table('members');
        $this->applyActiveStatusFilter($femaleB);
        $data['female'] = $femaleB->where('gender', 'ሴት')->countAllResults();

        return $data;
    }

    public function membership_level_count()
    {
        $result  = $this->db->table('membership_levels')->get()->getResultArray();
        $unassignedB = $this->db->table('members');
        $this->applyActiveStatusFilter($unassignedB);
        $resCount = $unassignedB->groupStart()
            ->where('membership_level', 'አልተመረጠም')
            ->orWhere('membership_level', '')
            ->groupEnd()
            ->countAllResults();

        $data   = [['title' => 'አልተመረጠም', 'count' => $resCount, 'color' => '#D3D3D3']];
        $colors = ['#001f3f', '#00a65a', '#0073b7', '#39cccc', '#f39c12', '#ff851b', '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777'];

        $index = 0;
        foreach ($result as $res) {
            $levelB = $this->db->table('members');
            $this->applyActiveStatusFilter($levelB);
            $count = $levelB->where('membership_level', $res['membership_level_title'])
                ->countAllResults();
            $data[] = [
                'title' => $res['membership_level_title'],
                'count' => $count,
                'color' => $colors[$index],
            ];
            $index++;
        }

        return $data;
    }

    public function changestatus()
    {
        if (! $this->membersHas('status')) {
            return false;
        }
        $data = [
            'status' => $this->request()->getPost('status'),
        ];
        if ($this->membersHas('status_remark')) {
            $data['status_remark'] = $this->request()->getPost('status_remark');
        }

        return $this->db->table('members')->where('id', $this->request()->getPost('id'))->update($data);
    }

    public function delete_member($id)
    {
        if (! $this->membersHas('status')) {
            return (bool) $this->db->table('members')->where('id', $id)->delete();
        }
        $data = ['status' => 'የጠፋ'];
        if ($this->membersHas('status_remark')) {
            $data['status_remark'] = '';
        }

        return $this->db->table('members')->where('id', $id)->update($data);
    }

    public function get_inactive_members()
    {
        if (! $this->membersHas('status')) {
            return [];
        }

        return $this->db->table('members')
            ->groupStart()
            ->where('status', 'የሌለ')
            ->orWhere('status', 'የጠፋ')
            ->groupEnd()
            ->get()
            ->getResultArray();
    }

    public function get_gender_specific($gender)
    {
        $b = $this->db->table('members')
            ->select('id, CONCAT(firstname," ", middlename) as text', false)
            ->where('gender !=', $gender);
        $this->applyActiveStatusFilter($b);

        return $b->where('spouse IS NULL', null, false)
            ->get()
            ->getResultArray();
    }

    public function get_gender_specific_ajax($search, $gender)
    {
        $b = $this->db->table('members')
            ->select('id, CONCAT(firstname," ", middlename) as text', false)
            ->where('spouse IS NULL', null, false);
        $this->applyActiveStatusFilter($b);

        return $b->like('firstname', $search, 'both')
            ->where('gender !=', $gender)
            ->get()
            ->getResultArray();
    }

    public function permanent_delete($id)
    {
        $this->db->table('members')->where('id', $id)->delete();
        $this->db->table('members')->where('spouse', $id)->update(['spouse' => null]);

        return true;
    }
}
