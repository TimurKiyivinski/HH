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
        if($this->input->post('submit'))
        {
            // Load data from form & create a new place
        }
        else
        {
            // Load the view for user to insert details
        }
    }

    /* *
     * Loads the page to view all places
     * */
    public function read()
    {
    }

    /* *
     * TODO:
     * Edit details of a place
     *
     * @param int place_id
     * */
    public function update($place_id = FALSE)
    {
        if($this->input->post('submit'))
        {
            // Load data from form & modify place details
        }
        else
        {
            // Load the view for user to modify details
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
    }
}

/* End of file place.php */
/* Location: ./application/controllers/admin/place.php */
