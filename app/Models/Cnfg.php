<?php

declare(strict_types=1);

namespace App\Models;

class Cnfg extends BaseModel
{
    public function get(string $name): string
    {
        $row = $this->db->table('cnfg')->where('name', $name)->get()->getRowArray();

        return $row !== null ? (string) $row['value'] : '';
    }

    public function edit_one($name, $value)
    {
        return $this->db->table('cnfg')->where('name', $name)->update(['value' => $value]);
    }
}
