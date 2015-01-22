<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['head'] = $this->load->view('templates/head', $data, TRUE);
        $data['navbar'] = $this->load->view('templates/navbar', $data, TRUE);
        $data['foot'] = $this->load->view('templates/foot', $data, TRUE);
        $data['js'] = $this->load->view('templates/js', $data, TRUE);
        
        $this->load->view('pages/'.$page, $data);
    }

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
