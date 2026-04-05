<?php

declare(strict_types=1);

$p = __DIR__ . '/../app/Controllers/Admin.php';
$code = file_get_contents($p);

$code = preg_replace(
    '/<\?php\s*defined\(\'BASEPATH\'\)[^;]+;\s*class Admin extends CI_Controller \{[^}]+public function __construct\(\) \{[^}]+\}[^}]+\}\s*/s',
    <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Controllers;

class Admin extends BaseController
{
    protected $ageGroupModel;
    protected $membersBackupModel;
    protected $paymentModel;
    protected $kifleKetemaModel;
    protected $menderModel;
    protected $kebeleModel;
    protected $noteModel;
    protected $userModel;
    protected $cnfgModel;
    protected $memberModel;
    protected $timelineModel;
    protected $groupModel;
    protected $groupMemberModel;
    protected $jobTypeModel;
    protected $membershipCauseModel;
    protected $membershipLevelModel;
    protected $ministryModel;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);
        helper(['form', 'url', 'text', 'file', 'date', 'download']);

        $this->ageGroupModel        = model('Age_group');
        $this->membersBackupModel = model('Members_backup');
        $this->paymentModel         = model('Payment');
        $this->kifleKetemaModel     = model('Kifle_ketema');
        $this->menderModel        = model('Mender');
        $this->kebeleModel          = model('Kebele');
        $this->noteModel            = model('Note');
        $this->userModel            = model('User');
        $this->cnfgModel            = model('Cnfg');
        $this->memberModel          = model('Member');
        $this->timelineModel        = model('Timeline');
        $this->groupModel           = model('Group');
        $this->groupMemberModel     = model('Group_member');
        $this->jobTypeModel         = model('Job_type');
        $this->membershipCauseModel = model('Membership_cause');
        $this->membershipLevelModel = model('Membership_level');
        $this->ministryModel        = model('Ministry');

        $request->setLocale('amharic');
    }

PHP
    ,
    $code,
    1,
);

$repl = [
    '$this->age_group->'          => '$this->ageGroupModel->',
    '$this->members_backup->'     => '$this->membersBackupModel->',
    '$this->payment->'            => '$this->paymentModel->',
    '$this->kifle_ketema->'       => '$this->kifleKetemaModel->',
    '$this->mender->'             => '$this->menderModel->',
    '$this->kebele->'             => '$this->kebeleModel->',
    '$this->note->'               => '$this->noteModel->',
    '$this->user->'               => '$this->userModel->',
    '$this->cnfg->'               => '$this->cnfgModel->',
    '$this->member->'             => '$this->memberModel->',
    '$this->timeline->'           => '$this->timelineModel->',
    '$this->group->'              => '$this->groupModel->',
    '$this->group_member->'       => '$this->groupMemberModel->',
    '$this->job_type->'           => '$this->jobTypeModel->',
    '$this->membership_cause->'   => '$this->membershipCauseModel->',
    '$this->membership_level->'   => '$this->membershipLevelModel->',
    '$this->ministry->'           => '$this->ministryModel->',
];
$code = str_replace(array_keys($repl), array_values($repl), $code);

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

$code = preg_replace("/redirect\('([^']*)'\)\s*;/", 'return redirect()->to(site_url(\'$1\'));', $code);
$code = str_replace('redirect();', 'return redirect()->to(site_url());', $code);

// Pagination: users()
$code = str_replace(
    <<<'OLD'
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['links'] = $this->pagination->create_links();
		$data['active_menu'] = "users";
OLD
    ,
    <<<'NEW'
		$page = (int) ($this->request->getUri()->getSegment(3) ?? 0);
		$data['links'] = $this->paginationByOffset('admin/users', $config['per_page'], $config['total_rows'], $page);
		$data['active_menu'] = "users";
NEW
    ,
    $code,
);

// Pagination: listgroups
$code = str_replace(
    <<<'OLD'
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['links'] = $this->pagination->create_links();
		$data['active_menu'] = "groups";
OLD
    ,
    <<<'NEW'
		$page = (int) ($this->request->getUri()->getSegment(3) ?? 0);
		$data['links'] = $this->paginationByOffset('admin/listgroups', $config['per_page'], $config['total_rows'], $page);
		$data['active_menu'] = "groups";
NEW
    ,
    $code,
);

// Database backup
$code = str_replace('$this->load->dbutil();', '', $code);
$code = str_replace('$backup = $this->dbutil->backup($prefs);', '$backup = \CodeIgniter\Database\Config::utils()->backup($prefs);', $code);
$code = str_replace("\$this->load->helper('file');\n\t\twrite_file('database/mybackup.txt', \$backup);", "helper(['file']);\n\t\twrite_file(ROOTPATH . 'database/mybackup.txt', \$backup);", $code);
$code = str_replace("\$this->load->helper('download');", "helper(['download']);", $code);

// export_families_csv — no Family model in codebase
$code = preg_replace(
    '/public function export_families_csv\(\) \{[^}]+\$families = \$this->family->get_all_for_export\(\);[^}]+\}/s',
    <<<'PHP'
	public function export_families_csv() {
		session()->setFlashdata('error', 'Family export is not available.');
		return redirect()->to(site_url('admin/listmembers'));
	}
PHP
    ,
    $code,
);

file_put_contents($p, $code);
echo "OK\n";
