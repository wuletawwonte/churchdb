<?php

declare(strict_types=1);

/**
 * CI3-compatible date helpers removed from CodeIgniter 4.
 */

if (! function_exists('human_to_unix')) {
    /**
     * Convert MySQL datetime / common date string to Unix timestamp.
     */
    function human_to_unix(?string $datestr): int|false
    {
        $datestr = trim((string) $datestr);
        if ($datestr === '') {
            return false;
        }

        $ts = strtotime($datestr);

        return $ts !== false ? $ts : false;
    }
}

if (! function_exists('timespan')) {
    /**
     * @param int|false|string $time Unix timestamp of the past instant
     * @param int|false|string|null $now Unix timestamp of "now", or null/'' for current time
     * @param int $units Max number of segments (largest units first), as in CI3
     */
    function timespan($time = '', $now = '', int $units = 7): string
    {
        if ($time === '' || $time === false) {
            return '';
        }

        $time = (int) $time;

        if ($now === '' || $now === null || $now === false) {
            $now = time();
        } else {
            $now = (int) $now;
        }

        $seconds = abs($now - $time);
        $parts   = [];
        $count   = 0;

        $years = (int) floor($seconds / 31557600);
        if ($years > 0) {
            $parts[] = $years . ' ' . ($years > 1 ? 'ዓመታት' : 'ዓመት');
            $seconds -= $years * 31557600;
            $count++;
        }

        $months = (int) floor($seconds / 2629743);
        if ($months > 0 && $count < $units) {
            $parts[] = $months . ' ' . ($months > 1 ? 'ወራት' : 'ወር');
            $seconds -= $months * 2629743;
            $count++;
        }

        $weeks = (int) floor($seconds / 604800);
        if ($weeks > 0 && $count < $units) {
            $parts[] = $weeks . ' ' . ($weeks > 1 ? 'ሳምንታት' : 'ሳምንት');
            $seconds -= $weeks * 604800;
            $count++;
        }

        $days = (int) floor($seconds / 86400);
        if ($days > 0 && $count < $units) {
            $parts[] = $days . ' ' . ($days > 1 ? 'ቀናት' : 'ቀን');
            $seconds -= $days * 86400;
            $count++;
        }

        $hours = (int) floor($seconds / 3600);
        if ($hours > 0 && $count < $units) {
            $parts[] = $hours . ' ' . ($hours > 1 ? 'ሰዓታት' : 'ሰዓት');
            $seconds -= $hours * 3600;
            $count++;
        }

        $minutes = (int) floor($seconds / 60);
        if ($minutes > 0 && $count < $units) {
            $parts[] = $minutes . ' ' . ($minutes > 1 ? 'ደቂቃዎች' : 'ደቂቃ');
            $seconds -= $minutes * 60;
            $count++;
        }

        if ($seconds > 0 && $count < $units) {
            $parts[] = $seconds . ' ' . ($seconds > 1 ? 'ሰከንዶች' : 'ሰከንድ');
        }

        if ($parts === []) {
            return '0 ሰከንድ';
        }

        return implode(', ', $parts);
    }
}

if (! function_exists('nice_date')) {
    /**
     * Normalize assorted date strings and format for display (CodeIgniter 3 compatible).
     *
     * @param string|int|false|null $bad_date
     * @param string|false          $format PHP date() format (e.g. 'M d, Y')
     */
    function nice_date($bad_date = '', $format = false): string
    {
        if ($bad_date === null || $bad_date === false || $bad_date === '') {
            return '';
        }

        $bad_date = is_int($bad_date) ? (string) $bad_date : trim((string) $bad_date);
        if ($bad_date === '') {
            return '';
        }

        if ($format === false || $format === '') {
            $format = 'Y-m-d';
        }

        if (preg_match('/^\d{10}$/', $bad_date)) {
            return date($format, (int) $bad_date);
        }

        if (preg_match('/^\d{13}$/', $bad_date)) {
            return date($format, (int) floor((int) $bad_date / 1000));
        }

        if (preg_match('/^\d{8}$/', $bad_date)) {
            $dt = DateTime::createFromFormat('Ymd', $bad_date);
            if ($dt instanceof DateTime) {
                return $dt->format($format);
            }
        }

        if (preg_match('/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})$/', $bad_date, $m)) {
            return date($format, mktime((int) $m[4], (int) $m[5], (int) $m[6], (int) $m[2], (int) $m[3], (int) $m[1]));
        }

        if (str_contains($bad_date, '.')) {
            $bad_date = str_replace('.', '-', $bad_date);
        }

        $ts = strtotime($bad_date);

        return $ts !== false ? date($format, $ts) : '';
    }
}
