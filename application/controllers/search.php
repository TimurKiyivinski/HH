<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('accommodation_model');
    }

    // TODO: Fix search
    public function index()
    {
        $data['accommodation'] = $this->accommodation_model->get_accommodation();

        $data['head'] = $this->load->view('templates/head', $data, TRUE);
        $data['navbar'] = $this->load->view('templates/navbar', $data, TRUE);
        $data['foot'] = $this->load->view('templates/foot', $data, TRUE);

        $this->load->view('search', $data);
    }

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */

