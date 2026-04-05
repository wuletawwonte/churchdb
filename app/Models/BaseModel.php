<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * Lightweight base for legacy CI3-style models (query builder, no CI4 Model CRUD).
 */
abstract class BaseModel
{
    protected \CodeIgniter\Database\BaseConnection $db;

    public function __construct(?ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    protected function request(): \CodeIgniter\HTTP\IncomingRequest
    {
        return service('request');
    }
}
