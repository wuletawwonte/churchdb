<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Offset-based pagination (matches legacy CI3 uri_segment behaviour).
     */
    protected function paginationByOffset(string $path, int $perPage, int $total, int $offset): string
    {
        if ($total <= $perPage) {
            return '';
        }

        $pageCount = (int) ceil($total / $perPage);
        $current   = (int) floor($offset / $perPage);
        $html      = "<ul class='pagination pagination-sm'>";

        for ($i = 0; $i < $pageCount; $i++) {
            $off    = $i * $perPage;
            $url    = $off === 0 ? site_url($path) : site_url($path . '/' . $off);
            $active = $i === $current ? " class='active'" : '';
            $html .= "<li{$active}><a href='{$url}'>" . ($i + 1) . '</a></li>';
        }

        return $html . '</ul>';
    }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }
}
