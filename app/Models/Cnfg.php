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

    /**
     * @param  list<string>  $names
     * @return array<string, string>
     */
    public function getValues(array $names): array
    {
        $out = [];
        foreach ($names as $n) {
            $out[$n] = '';
        }
        if ($names === []) {
            return $out;
        }
        $rows = $this->db->table('cnfg')->whereIn('name', $names)->get()->getResultArray();
        foreach ($rows as $row) {
            $out[$row['name']] = (string) $row['value'];
        }

        return $out;
    }

    public function edit_one($name, $value)
    {
        return $this->db->table('cnfg')->where('name', $name)->update(['value' => $value]);
    }
}
