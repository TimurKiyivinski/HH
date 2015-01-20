<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends CI_Controller {

    private $data;

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');
    }

  public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->load->helper('form');

        if($this->input->get())
        {
            // TODO: load search resut
        }

        // TODO: remove stub data
        $this->load->model('area_model');

        $this->data['areas'] = $this->area_model->get_all();
        // end stub data

        // load view
        $this->data['title'] = 'Area';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        // output view
        $this->load->view('area', $this->data);
    }

}

/* End of file area.php */
/* Location: ./application/controllers/area.php */
