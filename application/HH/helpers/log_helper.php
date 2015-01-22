<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Log information message
 *
 * Logs class name, function name and parameter values of function
 * that was calling it.
 *
 * Format: $ip | $class :: $function ($arg_list)
 * Note: $arg_list is serialized array of argument passed in
 *
 * @author @feliciousx
 *
 * @access public
 * @param string    the caller's class name
 * @param string    the caller's name (function name)
 * @param array     array of values from the function parameters
 * @return n/a
 */
if ( ! function_exists('log_msg'))
{
    function log_msg($class, $function, $arg_list = [])
    {
        $CI =& get_instance();
        $ip = '';

        if ($CI->input->is_cli_request())
        {
            $ip = 'CLI';
        }
        else
        {
            $ip = $CI->input->ip_address();
        }

        $log = $ip . ' | ' . $class . '::' . $function . '( ';
        for ($i = 0; $i < sizeof($arg_list); $i++)
        {
            $log .= serialize($arg_list[$i]) . ' ';
        }

        $log .= ')';

        log_message('info', $log);
    }
}

/* End of file log_helper.php */
/* Location: ./application/helpers/log_helper.php */

