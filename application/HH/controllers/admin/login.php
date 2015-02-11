<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

    private $data;

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');

        $this->load->library('session');

        // verify login status
        if ($this->session->userdata('logged_in')) redirect($this->data['href']['admin']['view']);
    }

    /* *
     * Shows the main page
     * */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());

        $this->load->helper('form');
        if($this->input->post('password'))
        {
            $password = $this->input->post('password');

            // cross reference with hardcoded password set in config/password.php
            // NOTE: it's not committed, so you have to create it locally
            $this->config->load('password');
            if ( strcmp( $password, $this->config->item('admin_password') ) == 0 ) {
                $this->session->set_userdata('logged_in', TRUE);
                redirect($this->data['href']['admin']['view']);
            }

            $this->session->set_userdata('error', TRUE);
        }

        $this->data['title'] = 'Login';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        $this->load->view('admin/login', $this->data);
    }

}

/* End of file login.php */
/* Location: ./application/controllers/admin/logout.php */

