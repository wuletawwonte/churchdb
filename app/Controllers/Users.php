<?php

declare(strict_types=1);

namespace App\Controllers;

class Users extends BaseController
{
    protected $userModel;
    protected $cnfgModel;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);
        helper(['form', 'url']);
        $this->userModel = model('User');
        $this->cnfgModel = model('Cnfg');
    }

    public function index()
    {
        if (session()->get('is_logged_in') === true) {
            return redirect()->to(site_url('admin'));
        }
        $data['system_name'] = $this->cnfgModel->get('system_name');

        return view('login', $data);
    }

    public function login()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|trim',
            'password' => 'required|trim',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            session()->remove('is_logged_id');
            session()->setFlashdata('login_failed', 'ይቅርታ, ያስገቡት መረጃ ትክክል አይደለም');

            return redirect()->to(site_url('users'));
        }

        $username = (string) $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

        if (! $this->userModel->user_can_log_in($username, $password)) {
            session()->remove('is_logged_id');
            session()->setFlashdata('login_failed', 'ይቅርታ, ያስገቡት መረጃ ትክክል አይደለም');

            return redirect()->to(site_url('users'));
        }

        $userdata = $this->userModel->get_user('username', $username);
        $filtermember = [
            'gender'             => null,
            'job_type'           => null,
            'membership_level'   => null,
            'ministry'           => null,
            'marital_status'     => null,
            'age_group'          => null,
        ];
        session()->set([
            'current_user'      => $userdata,
            'is_logged_in'      => true,
            'last_visited'      => time(),
            'church_name'       => $this->cnfgModel->get('church_name'),
            'system_name'       => $this->cnfgModel->get('system_name'),
            'system_name_short' => $this->cnfgModel->get('system_name_short'),
            'filtermember'      => $filtermember,
        ]);

        return redirect()->to(site_url('admin'));
    }

    public function relogin()
    {
        return view('relogin');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url());
    }
}
