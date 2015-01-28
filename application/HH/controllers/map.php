<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->data['href'] = $this->config->item('href');
        $this->load->model('place_model');
        $this->load->model('location_model');
        $this->load->model('category_model');
    }

    /**
     * Shows the main page
     */
    public function index()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $this->go();
    }

    /**
     * Views the default map with all pointers
     * */
    public function go()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());

        // TODO: Fix this error screen
        // or change default behaviour

        $default_lat = 1.556316;
        $default_long = 110.344055;

        $this->data['zoom'] = 16;
        $this->data['latitude'] = $default_lat;
        $this->data['longitude'] = $default_long;
        $this->data['enable_navigation'] = 0;

        // TODO: Create a model to get the area name instead
        $this->data['area_array'] = $this->category_model->get_all();
        $this->data['title'] = 'Maps';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        $this->load->view('map', $this->data);
    }

    /**
     * Views the map with only one place enabled
     *
     * @param int, place_id
     */
    public function nav($place_id = -1)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());

        $place = $this->location_model->get($place_id);
        $this->data['zoom'] = 20;
        $this->data['latitude'] = $place[0]['latitude'];
        $this->data['longitude'] = $place[0]['longitude'];
        $this->data['enable_navigation'] = 1;
        $this->data['place_id'] = $place_id;
        $this->data['title'] = 'Maps';
        $this->data['head'] = $this->load->view('templates/head', $this->data, TRUE);
        $this->data['banner'] = $this->load->view('templates/banner', $this->data, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', $this->data, TRUE);
        $this->data['js'] = $this->load->view('templates/js', $this->data, TRUE);

        $this->load->view('map', $this->data);
    }

    /**
     * Gets a JSON object based on area id
     *
     * @param int, area
     */
    public function get_places($area = FALSE)
    {
        // Get all the places under one area
        $data['places'] = $this->place_model->get_by_area($area);

        // Check if place exists
        if (empty($data['places']))
        {
            show_error('There are no places here.', 505);
        }

        // Iterate though all places in an area
        // and add it to an array
        for ($i = 0; $i < count($data['places']); $i++)
        {
            $data['locations'][$i] = $this->location_model->get(intval($data['places'][$i]['id']));
            $data['locations'][$i]['name'] = $data['places'][$i]['name'];
        }

        // Set output type as JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data['locations']));
    }

    /**
     * Gets a JSON object based on place id
     *
     * @param int, place_id
     */
    public function get_place($place_id = FALSE)
    {
        // Get all the places under one area
        $data['place'] = $this->place_model->get($place_id);

        // Check if place exists
        if (empty($data['place']))
        {
            show_error('This place does not exist.', 505);
        }

        $data['locations'][0] = $this->location_model->get(intval($data['place']['id']));
        $data['locations'][0]['name'] = $data['place']['name'];

        // Set output type as JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data['locations']));
    }
}

/* End of file map.php */
/* Location: ./application/controllers/map.php */
