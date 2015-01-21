<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    private $data;

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');
    }

    /**
     * Shows the Search interface
     */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->load->helper('form');

        if($this->input->get())
        {
            // TODO: load search resut
        }

        // TODO: remove stub data
        $this->load->model('category_model');
        $this->load->model('place_model');

        $this->data['categories'] = $this->category_model->get_all();

        foreach ($this->data['categories'] as &$category)
        {
            $category['places'] = $this->place_model->get_by_category($category['id']);
        }

        // load view
        $this->data['title'] = 'Search';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        // output view
        $this->load->view('search', $this->data);
    }

    public function test($param = '')
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->load->model('search_model');

        $result = $this->search_model->find_all($param);

        $this->load->model('place_model');

        $query = $this->place_model->get_by_ids($result);

        var_dump($query);
    }

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
