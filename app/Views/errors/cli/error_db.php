<?php
defined('SYSTEMPATH') || exit('No direct script access allowed');

echo "\nDatabase error: ",
	($heading ?? 'Database Error'),
	"\n\n",
	($message ?? ''),
	"\n\n";