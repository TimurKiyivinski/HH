<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');
        $this->load->model('place_model');
    }

    public function index($area = 'all')
    {
        $this->data['area'] = $area; 
        $this->data['title'] = ucfirst($area); 
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);
        
        $this->load->view('map', $this->data);
    }
}

/* End of file map.php */
/* Location: ./application/controllers/map.php */
