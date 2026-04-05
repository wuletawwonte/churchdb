<?php

declare(strict_types=1);

$src = '/tmp/churchdb_ci3_bak/application/controllers/Admin.php';
$code = file_get_contents($src);

$header = <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Controllers;

PHP;

$code = preg_replace('/<\?php\s*defined\([^)]+\)[^;]+;\s*/', $header, $code);
$code = str_replace('class Admin extends CI_Controller {', 'class Admin extends BaseController
{', $code);

// Drop CI3 constructor (auth via AuthFilter)
$code = preg_replace(
    '/\tpublic function __construct\(\) \{\s*parent::__construct\(\);\s*if\(\$this->session->userdata\(\'is_logged_in\'\) == FALSE\) \{[^}]+\}[^}]+set_userdata\(\'last_visited\', time\(\)\);\s*\$this->load->model\([^;]+;\s*\$this->load->helper\(\'text\', \'file\'\);\s*\$this->lang->load\(\'label_lang\', \'amharic\'\);\s*\}\s*/s',
    '',
    $code
);

$map = [
    'age_group'          => 'ageGroupModel',
    'members_backup'     => 'membersBackupModel',
    'payment'            => 'paymentModel',
    'kifle_ketema'       => 'kifleKetemaModel',
    'mender'             => 'menderModel',
    'kebele'             => 'kebeleModel',
    'note'               => 'noteModel',
    'user'               => 'userModel',
    'cnfg'               => 'cnfgModel',
    'member'             => 'memberModel',
    'timeline'           => 'timelineModel',
    'group'              => 'groupModel',
    'group_member'       => 'groupMemberModel',
    'job_type'           => 'jobTypeModel',
    'membership_cause'   => 'membershipCauseModel',
    'membership_level'   => 'membershipLevelModel',
    'ministry'           => 'ministryModel',
];

foreach ($map as $old => $new) {
    $code = str_replace('$this->' . $old . '->', '$this->' . $new . '->', $code);
}

$code = str_replace('$this->input->post(', '$this->request->getPost(', $code);
$code = str_replace('$this->input->get(', '$this->request->getGet(', $code);
$code = str_replace('$this->session->set_userdata(', 'session()->set(', $code);
$code = str_replace('$this->session->set_flashdata(', 'session()->setFlashdata(', $code);
$code = str_replace('$this->session->flashdata(', 'session()->getFlashdata(', $code);
$code = str_replace('$this->session->userdata(', 'session()->get(', $code);
$code = str_replace('$this->session->unset_userdata(', 'session()->remove(', $code);

$code = preg_replace('/\$_SESSION\[\'filtermember\'\]\[\'(\w+)\'\]/', "(session()->get('filtermember') ?? [])['$1']", $code);
$code = preg_replace('/\$_SESSION\[\'filtermember\'\]/', "session()->get('filtermember')", $code);
$code = preg_replace('/\$_SESSION\[\'current_user\'\]/', 'session()->get(\'current_user\')', $code);

$code = str_replace('$this->load->view(', 'echo view(', $code);

// redirect
$code = preg_replace_callback(
    '/redirect\(\s*\'([^\']*)\'\s*\)\s*;/',
    static fn ($m) => 'return redirect()->to(site_url(\'' . $m[1] . '\'));',
    $code
);
$code = str_replace('redirect();', 'return redirect()->to(site_url());', $code);

// Pagination blocks — replace with helper calls (markers)
$code = str_replace("\$this->pagination->initialize(\$config);\n\n\t\t\$page = (\$this->uri->segment(3)) ? \$this->uri->segment(3) : 0;\n\n\t\t\$data['links'] = \$this->pagination->create_links();", <<<'PHP'
$page = (int) ($this->request->getUri()->getSegment(3) ?? 0);
		$data['links'] = $this->paginationByOffset('admin/users', $config['per_page'], $config['total_rows'], $page);
PHP
    , $code);

$code = str_replace("\$this->pagination->initialize(\$config);\n\n\t\t\$page = (\$this->uri->segment(3)) ? \$this->uri->segment(3) : 0;\n\n\t\t\$data['links'] = \$this->pagination->create_links();\n\t\t\$data['active_menu'] = \"groups\";", <<<'PHP'
$page = (int) ($this->request->getUri()->getSegment(3) ?? 0);
		$data['links'] = $this->paginationByOffset('admin/listgroups', $config['per_page'], $config['total_rows'], $page);
		$data['active_menu'] = "groups";
PHP
    , $code);

$code = str_replace("\$data['users'] = \$this->userModel->get_all_users(\$config['per_page'], \$page);", '$data[\'users\'] = $this->userModel->get_all_users($config[\'per_page\'], $page);', $code);

// dbutil backup
$code = str_replace("\$this->load->dbutil();", '', $code);
$code = str_replace("\$backup = \$this->dbutil->backup(\$prefs);", '$utils = \\CodeIgniter\\Database\\Config::utils();
		$backup = $utils->backup($prefs);', $code);

$code = str_replace("\$this->load->helper('file');\n\t\twrite_file('database/mybackup.txt', \$backup);", "\$this->load->helper('file');\n\t\twrite_file(ROOTPATH . 'database/mybackup.txt', \$backup);", $code);

$code = str_replace("\$this->load->helper('file');", "helper(['file']);", $code);
$code = str_replace("\$this->load->helper('download');", "helper(['download']);", $code);

// Upload library
$code = preg_replace_callback(
    '/\$this->load->library\(\'upload\', \$config\);\s*\n\s*if \( ! \$this->upload->do_upload\(\'([^\']+)\'\)\)\s*\n\s*\{([^{]+)\$this->session->setFlashdata\(\'error\', \$this->upload->display_errors\(\)\);([^\}]+)\}\s*\n\s*else\s*\n\s*\{([^\}]+)\$avatar = \$this->upload->data\(\'file_name\'\);([^\}]+)\}/s',
    static function ($m) {
        return 'if (! $this->runUpload(\'' . $m[1] . '\', $config, $errorMsg)) {
			' . trim($m[2]) . 'session()->setFlashdata(\'error\', $errorMsg);' . str_replace('$this->upload->display_errors()', '$errorMsg', $m[3]) . '}
		else
		{' . str_replace("\$avatar = \$this->upload->data('file_name');", '$avatar = $this->uploadFileName;', $m[4]) . $m[5] . '}';
    },
    $code
);

file_put_contents(__DIR__ . '/../app/Controllers/Admin.php', $code);
echo "Admin.php written — verify upload blocks manually\n";
