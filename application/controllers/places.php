<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Places controller handles the view for displaying the list of categories,
 * list of places, and place details.
 */
class Places extends CI_Controller {

    private $data;

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');
    }

    /**
     * Shows the main page
     */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->list_categories();
    }

    /**
     * List out all categories
     */
    public function list_categories()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->load->model('category_model');
        $this->data['categories'] = $this->category_model->get_all();

        // load view
        $this->data['title'] = 'Categories';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['foot'] = $this->load->view('templates/foot', $this->data, TRUE);

        // output view
        $this->load->view('category', $this->data);
    }

    /**
     * Shows list of places from a category
     *
     * @param category, string
     */
    public function list_places($category = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category === FALSE)
        {
            redirect($this->data['href']['places']['categories']);
        }

        if ( ! file_exists(APPPATH."/views/{$category}.php"))
        {
            show_404();
        }

        $this->load->model("{$category}_model", 'category');

        // get data from db
        $this->data['places'] = $this->category->get_all();
        $this->data['category'] = $category;

        // load view
        $this->data['title'] = ucfirst($category) . ' List';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['foot'] = $this->load->view('templates/foot', $this->data, TRUE);

        // output view
        $this->load->view($category, $this->data);
    }

    /**
     * Display the details of a place
     *
     * @param category , string
     * @param id , place id
     */
    public function details($category = FALSE, $place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category === FALSE OR $place_id === FALSE)
        {
            show_404();
        }

        $this->load->model("{$category}_model", 'category');

        // get data from db
        $this->data['place'] = $this->category->get_place($place_id);

        if (empty($this->data['place']))
        {
            show_404();
        }

        // load views
        $this->data['title'] = $this->data['place']['name'];
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['foot'] = $this->load->view('templates/foot', $this->data, TRUE);
        $this->load->view("{$category}/detail", $this->data);
    }
}

/* End of file places.php */
/* Location: ./application/controllers/places.php */
