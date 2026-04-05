<?php

declare(strict_types=1);

namespace App\Controllers;

class Rest extends BaseController
{
    protected $memberModel;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);
        $this->memberModel = model('Member');
    }

    public function get_members()
    {
        $result = $this->memberModel->get_all_for_mobile();
        $this->response->setJSON($result);

        return $this->response;
    }
}
