<?php

$p = __DIR__ . '/../app/Controllers/Admin.php';
$c = file_get_contents($p);
$c = preg_replace('/(\s)redirect\(([^;]+)\)\s*;/', '$1return redirect()->to(site_url($2));', $c);
file_put_contents($p, $c);
echo "ok\n";
