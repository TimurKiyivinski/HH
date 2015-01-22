<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class extends the session library.
 *
 * @package     SmartHome
 * @subpackage  Libraries
 * @category    Sessions
 * @author      @feliciousx
 */
class MY_Session extends CI_Session
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Check for ajax request. Do not update an
     * existing session on AJAX calls to prevent
     * session disappearing
     */
    function sess_update()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());

        if (!$this->CI->input->is_ajax_request())
            return parent::sess_update();
    }

}

/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */

