<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Place extends CI_Controller {

    private $data;

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');
    }

    /* *
     * Shows the main page
     * */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        read();
    }

    /* *
     * TODO:
     * Create a new place and insert it into the database
     * */
    public function create()
    {
        $this->load->helper('form');
        if($this->input->post('submit'))
        {
            // Load data from form & modify place details
            // then load the place detail page
            $this->load->model('place_model');
            $this->place_model->add_place();
        }
        else
        {
            // Required models
            $this->load->model('place_model');
            $this->load->model('area_model');
            $this->load->model('category_model');
            $this->load->model('column_model');

            // Data required
            $this->data['areas'] = $this->area_model->get_all();
            $this->data['categories'] = $this->category_model->get_all();
            $this->data['columns'] = $this->column_model->get_all();

            // Load the view for user to modify details
            // Load the view
            $this->data['title'] = 'Create New Place';
            $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
            $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
            $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
            $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

            $this->load->view('admin/new', $this->data);
        }
    }

    /* *
     * Loads the page to view all places
     * */
    public function read()
    {
        $this->load->model('place_model');
        $this->data['places'] = $this->place_model->get_all();

        // Load the view
        $this->data['title'] = 'All places';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        $this->load->view('admin/view', $this->data);
    }

    /* *
     * TODO:
     * Edit details of a place
     *
     * @param int place_id
     * */
    public function update($place_id = FALSE)
    {
        $this->load->helper('form');
        if($this->input->post('submit'))
        {
            // Load data from form & modify place details
            // then load the place detail page
            $this->load->model('place_model');
            $this->place_model->modify_place();
        }
        else
        {
            // Required models
            $this->load->model('place_model');
            $this->load->model('area_model');
            $this->load->model('category_model');
            $this->load->model('column_model');
            
            // Get the desired place
            $this->data['place'] = $this->place_model->get($place_id);

            // Data required
            $this->data['areas'] = $this->area_model->get_all();
            $this->data['categories'] = $this->category_model->get_all();
            $this->data['columns'] = $this->column_model->get_all();

            // Load the view for user to modify details
            // Load the view
            $this->data['title'] = 'Modify '.$this->data['place']['name'];
            $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
            $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
            $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
            $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

            $this->load->view('admin/edit', $this->data);
        }
    }

    /* *
     * Removes a certain place
     *
     * @param int place_id
     * */
    public function remove($place_id = FALSE)
    {
        $this->load->model('place_model');
        $this->place_model->remove_place($place_id);

        // Reload places page after a place is removed
        read();
    }
}

/* End of file place.php */
/* Location: ./application/controllers/admin/place.php */
