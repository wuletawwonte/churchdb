<?php

$src = '/tmp/churchdb_ci3_bak/application/controllers/Admin.php';
$dst = __DIR__ . '/../app/Controllers/Admin.php';
$code = file_get_contents($src);

$code = preg_replace('/<\?php\s*defined\([^)]+\)[^;]+;\s*/', "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\\Controllers;\n\n", $code);
$code = str_replace('class Admin extends CI_Controller {', 'class Admin extends BaseController
{', $code);

// Remove old constructor (auth handled by AuthFilter)
$code = preg_replace(
    '/public function __construct\(\) \{[^}]*\$this->load->model\([^;]+;[^}]*\$this->lang->load\([^;]+;[^}]*\}\s*/s',
    '',
    $code
);

$models = "age_group|members_backup|payment|kifle_ketema|mender|kebele|note|user|cnfg|member|timeline|group|group_member|job_type|membership_cause|membership_level|ministry";
$code = preg_replace_callback(
    '/\$this->(' . $models . ')->/',
    static function ($m) {
        return '$this->' . $m[1] . 'Model->';
    },
    $code
);

$code = str_replace('$this->input->post(', '$this->request->getPost(', $code);
$code = str_replace('$this->input->get(', '$this->request->getGet(', $code);
$code = str_replace('$this->session->set_userdata(', 'session()->set(', $code);
$code = str_replace('$this->session->set_flashdata(', 'session()->setFlashdata(', $code);
$code = str_replace('$this->session->flashdata(', 'session()->getFlashdata(', $code);
$code = str_replace('$this->session->userdata(', 'session()->get(', $code);
$code = str_replace('$this->session->unset_userdata(', 'session()->remove(', $code);
$code = str_replace('$this->session->sess_destroy();', 'session()->destroy();', $code);

$code = preg_replace('/\$_SESSION\[\'filtermember\'\]\[\'(\w+)\'\]/', "(session()->get('filtermember') ?? [])['$1']", $code);
$code = preg_replace('/\$_SESSION\[\'current_user\'\]/', "session()->get('current_user')", $code);

$code = str_replace('$this->load->view(', 'return view(', $code);
// Multiple views in sequence — CI3 pattern: header, body, footer — need echo view
$code = str_replace('return view(\'templates/header\', $data);
		$this->load->view(', 'echo view(\'templates/header\', $data);
		return view(', $code);
$code = str_replace('return view(\'templates/header\', $data);
		$this->load->view(', 'echo view(\'templates/header\', $data);
		return view(', $code);

file_put_contents($dst, $code);
echo "Wrote $dst (partial — manual fix required)\n";
