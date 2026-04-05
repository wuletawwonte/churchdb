<?php

$p = __DIR__ . '/../app/Controllers/Admin.php';
$c = file_get_contents($p);
$c = str_replace(
    'return return redirect()->to(site_url()->to(site_url(',
    'return redirect()->to(site_url(',
    $c
);
$c = preg_replace("/site_url\('([^']+)'\)\)\);/", "site_url('$1'));", $c);
file_put_contents($p, $c);
echo "fixed\n";
