<?php

/**
 * CI3 model → CI4: run from project root: php tools/convert_ci3_models.php
 */

$srcDir = '/tmp/churchdb_ci3_bak/application/models';
$dstDir = __DIR__ . '/../app/Models';

$files = glob($srcDir . '/*.php') ?: [];

foreach ($files as $src) {
    $base = basename($src);
    if ($base === 'index.html') {
        continue;
    }

    $code = file_get_contents($src);

    $code = preg_replace(
        '/<\?php\s*defined\(\'BASEPATH\'\)\s*OR\s*exit\([^)]*\);\s*/',
        "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\\Models;\n\n",
        $code
    );
    $code = str_replace('extends CI_Model', 'extends BaseModel', $code);

    $code = str_replace('$this->input->post(', '$this->request()->getPost(', $code);
    $code = str_replace('$this->input->get(', '$this->request()->getGet(', $code);
    $code = str_replace('$this->session->userdata(', 'session()->get(', $code);

    $code = preg_replace(
        '/\$_SESSION\[\'filtermember\'\]\[\'(\w+)\'\]/',
        "(session()->get('filtermember') ?? [])['$1']",
        $code
    );
    $code = preg_replace(
        '/\$_SESSION\[\'filtermember\'\]/',
        "session()->get('filtermember')",
        $code
    );
    $code = preg_replace(
        '/\$_SESSION\[\'current_user\'\]/',
        "session()->get('current_user')",
        $code
    );

    $code = str_replace('->order_by(', '->orderBy(', $code);
    $code = str_replace('->or_like(', '->orLike(', $code);
    $code = str_replace('->where_not_in(', '->whereNotIn(', $code);
    $code = str_replace('->or_where(', '->orWhere(', $code);

    $code = str_replace('->result_array()', '->getResultArray()', $code);
    $code = str_replace('->num_rows()', '->getNumRows()', $code);
    $code = str_replace('->row_array()', '->getRowArray()', $code);
    $code = str_replace('->row()', '->getRow()', $code);
    $code = str_replace('->result()', '->getResult()', $code);
    $code = str_replace('$this->db->insert_id()', '$this->db->insertID()', $code);

    $code = preg_replace('/\$this->db->count_all\(\'([^\']+)\'\)/', '$this->db->table(\'$1\')->countAll()', $code);

    $code = preg_replace('/\$this->db->insert\(\'([^\']+)\',\s*/', '$this->db->table(\'$1\')->insert(', $code);
    $code = preg_replace('/\$this->db->update\(\'([^\']+)\',\s*/', '$this->db->table(\'$1\')->update(', $code);
    $code = preg_replace('/\$this->db->delete\(\'([^\']+)\'\)/', '$this->db->table(\'$1\')->delete()', $code);
    $code = preg_replace('/\$this->db->get\(\'([^\']+)\'\)/', '$this->db->table(\'$1\')->get()', $code);
    $code = preg_replace('/\$this->db->get_where\(\'([^\']+)\'\)/', '$this->db->table(\'$1\')->get()', $code);

    $code = preg_replace('/\$this->db->from\(\'([^\']+)\'\)/', '$this->db->table(\'$1\')', $code);

    $code = preg_replace('/\$this->load->model\([^;]+;\s*\n?/', '', $code);

    $code = preg_replace(
        '/public function __construct\(\)\s*\{\s*parent::__construct\(\);\s*\}/s',
        '',
        $code
    );

    $code = preg_replace_callback(
        '/public function __construct\(\)\s*\{([^}]*)\}/s',
        static function (array $m): string {
            $body = trim($m[1]);
            $body = preg_replace('/parent::__construct\(\);\s*/', '', $body);
            $body = preg_replace('/\$this->load->model\([^;]+;\s*/', '', $body);
            if ($body === '') {
                return "public function __construct(?\\CodeIgniter\\Database\\ConnectionInterface \$db = null)\n\t{\n\t\tparent::__construct(\$db);\n\t}";
            }

            return "public function __construct(?\\CodeIgniter\\Database\\ConnectionInterface \$db = null)\n\t{\n\t\tparent::__construct(\$db);\n\t\t" . $body . "\n\t}";
        },
        $code,
        1
    );

    file_put_contents($dstDir . '/' . $base, $code);
}

echo "Converted to $dstDir\n";
