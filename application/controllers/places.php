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
            //show_404();
        }

        // use category_name instead of category['name'] as this is made URL safe
        $category_name = url_title($category['name'], '_', TRUE);
        
        if ( ! file_exists(APPPATH."/models/{$category_name}_model.php"))
        {
            show_404();
        }

        $this->data['src']['category_icon'] = "public/images/icons/{$category_name}_icon.png";
        if ( ! file_exists(FCPATH . $this->data['src']['category_icon']))
        {
            $this->data['src']['category_icon'] = FALSE;
        }

        // load required libaries
        $this->load->model("{$category_name}_model", 'category');
        $this->load->model('photo_model', 'photos');

        // get data from db
        $places = $this->category->get_all();

        if (empty($places))
        {
            // TODO: tell user that this category is empty
        }

        $thumbnails = $this->photos->get_thumbnails($category['id']);

        $this->data['thumbnails'] = array();

        // restructure thumbnails array
        foreach ($thumbnails as $img)
        {
            $this->data['thumbnails'][$img['place_id']] = $img['link'];
        }

        $this->data['places'] = $places;
        $this->data['category'] = $category;

        // load view
        $this->data['title'] = $category['display_name'] . ' List';
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
    public function details($category_id = FALSE, $place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category_id === FALSE OR $place_id === FALSE)
        {
            show_404();
        }

        // get category details
        $this->load->model('category_model');
        $category = $this->category_model->get($category_id);

        if (empty($category))
        {
            show_404();
        }

        $this->load->model("{$category['name']}_model", 'category');

        // get data from db
        $this->data['place'] = $this->category->get_place($place_id);

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
        $this->load->view("{$category['name']}/detail", $this->data);
    }
}

/* End of file places.php */
/* Location: ./application/controllers/places.php */
