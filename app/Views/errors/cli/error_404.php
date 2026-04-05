<?php
defined('SYSTEMPATH') || exit('No direct script access allowed');

echo "\nERROR: ",
	($heading ?? '404 Page Not Found'),
	"\n\n",
	($message ?? ''),
	"\n\n";