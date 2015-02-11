<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());

        $this->load->library('session');
    }

    /**
     * Logs user out
     */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->session->unset_userdata('logged_in');
        redirect('/admin/login');
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/admin/logout.php */

