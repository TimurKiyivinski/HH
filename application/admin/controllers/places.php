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
        $this->output->enable_profiler(TRUE);
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
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        // output view
        $this->load->view('category', $this->data);
    }

    /**
     * Shows list of places from a category
     *
     * @param int, category id
     */
    public function list_places($category_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category_id === FALSE)
        {
            redirect($this->data['href']['places']['categories']);
        }

        // get category details
        $this->load->model('category_model');
        $category = $this->category_model->get($category_id);

        if (empty($category))
        {
            show_404();
        }

        $this->data['src']['category_icon'] = 'public/images/icons/'.url_title($category['name'], '_', TRUE).'_icon.png';
        if ( ! file_exists(FCPATH . $this->data['src']['category_icon']))
        {
            $this->data['src']['category_icon'] = FALSE;
        }

        // load required libaries
        $this->load->model('place_model', 'place');
        $this->load->model('photo_model', 'photos');

        // get data from db
        $places = $this->place->get_by_category($category_id);
        $photos = $this->photos->get_by_places($places);

        if (empty($places))
        {
            // TODO: tell user that this category is empty
        }

        foreach ($photos as $img)
        {
            $this->data['thumbnails'][$img['place_id']] = $img['photo_link'];
        }

        $this->data['places'] = $places;
        $this->data['category'] = $category;

        // load view
        $this->data['title'] = $category['name'] . ' List';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        // output view
        $this->load->view('list_places', $this->data);
    }

    /**
     * Display the details of a place
     *
     * @param int , category id
     * @param int , place id
     */
    public function details($place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($place_id === FALSE)
        {
            show_404();
        }



        $this->load->model('place_model');

        // get data from db
        $this->data['place'] = $this->place_model->get($place_id);

        // get category details
        $this->load->model('category_model');
        $category = $this->category_model->get($this->data['place']['category_id']);

        if (empty($this->data['place']))
        {
            show_404();
        }

        // load views
        $this->data['title'] = $this->data['place']['name'];
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);
        $this->load->view(url_title($category['name'], '_', TRUE).'/detail', $this->data);
    }

    /**
     * Show add new place form
     *
     * @param int , category id
     */
    public function add($category_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category_id === FALSE)
        {
            show_404();
        }

        $this->load->model('category_model');
        $this->load->model('area_model');

        $category = $this->category_model->get($category_id);
        $category_columns = $this->category_model->get_columns($category_id);
        $areas = $this->area_model->get_all();

        $this->load->library('form_validation');

        if (empty($category))
        {
            show_404();
        }

        if ($this->input->post())
        {
            $this->load->model('place_model');
            $query = $this->place_model->add_place();
        }

        $this->load->helper('form');
        $this->load->helper('inflector');

        $this->data['category'] = $category;
        $this->data['areas'] = $areas;
        $this->data['category_columns'] = $category_columns;

        // load views
        $this->data['title'] = $this->data['category']['name'];
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);
        $this->load->view(url_title($category['name'], '_', TRUE).'/add', $this->data);
    }
}

/* End of file places.php */
/* Location: ./application/controllers/places.php */
