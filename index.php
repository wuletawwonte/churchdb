<?php

/**
 * Legacy entry when the web server document root points at the project root.
 * Prefer pointing the vhost at the `public/` directory instead.
 */
require __DIR__ . '/public/index.php';
