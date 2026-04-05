<?php
defined('SYSTEMPATH') || exit('No direct script access allowed');

echo "\nERROR: ",
	($heading ?? 'Application Error'),
	"\n\n",
	($message ?? ''),
	"\n\n";