<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('is_logged_in') !== true) {
            return redirect()->to(site_url('users'));
        }

        $interval = time() - (int) $session->get('last_visited');
        if ($interval > 1200 && $interval < 7200) {
            return redirect()->to(site_url('users/relogin'));
        }
        if ($interval > 7200) {
            return redirect()->to(site_url('users/logout'));
        }

        $session->set('last_visited', time());

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}
