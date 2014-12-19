<?php

class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['head'] = $this->load->view('templates/head', $data, TRUE);
        $data['NavBar'] = $this->load->view('templates/NavBar', $data, TRUE);
        $data['foot'] = $this->load->view('templates/foot', $data, TRUE);
        
        $this->load->view('pages/'.$page, $data);
    }
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
