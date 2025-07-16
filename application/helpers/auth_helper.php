<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_admin_logged_in')) {
    function is_admin_logged_in()
    {
        $CI =& get_instance();
        if (!isset($CI->session)) {
            log_message('error', 'Session library is not loaded');
            return false;
        }
        return $CI->session->userdata('logged_in') === true;
    }
}
