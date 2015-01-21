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
     *
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->load->helper('form');

        // load view
        $this->data['title'] = 'Search';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        // output view
        $this->load->view('search', $this->data);
    }
     */

    /**
     * Make a search query
     *
     * @param string , search string
     * @return an array of places sorted by category
     */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->load->helper('form');
        if($this->input->post('submit'))
        {
            $this->data['results'] = 0;
        }
        else
        {
            $search = $this->input->post('search');

            $this->load->model('category_model');
            $this->load->model('place_model');
            $this->load->model('search_model');

            // To name the categories
            $category_data = $this->category_model->get_all();

            $places_search = [];

            if ($search != "")
                $places_search = $this->search_model->find_all($search);

            // Check if there are any results
            if (sizeof($places_search) == 0)
            {
                $this->data['results'] = 0;
            }
            else
            {
                $this->data['results'] = 1;

                // Sort all the places by category
                for ($i = 0; $i < sizeof($places_search); $i++)
                {
                    $places[$i] = $this->place_model->get($places_search[$i]);
                    $categories[$places[$i]['category_id']]['name'] = $category_data[$places[$i]['category_id'] - 1]['name'];
                    $categories[$places[$i]['category_id']]['places'][] = $places[$i];
                }
                $this->data['categories'] = $categories;
            }       
        }

        $this->data['title'] = 'Search';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        // output view
        $this->load->view('search', $this->data);
    }

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
