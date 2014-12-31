<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data['href'] = $this->config->item('href');
    }

    /**
     * Shows the Search interface
     */
    public function index()
    {
        $this->load->helper('form');

        if($this->input->get())
        {
            $this->load->model('category_model');

            $search = $this->input->get('search');

            $this->data['results'] = $this->category_model->search_all($search);
        }

        // load view
        $this->data['title'] = 'Search';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['foot'] = $this->load->view('templates/foot', $this->data, TRUE);

        // output view
        $this->load->view('search', $this->data);
    }

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */

