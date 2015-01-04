<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Accommodation model handles everything related to the query
 * towards the accommodation table in the database
 */
class Accommodation_model extends CI_Model
{
    public $id = '';
    public $name = '';
    public $description = '';
    public $address = '';
    public $longitude = '';
    public $latitude = '';
    public $telephone = '';
    public $email = '';
    public $website = '';
    public $rating = '';
    public $picture = '';
    public $room_rates = '';
    public $type = '';
    public $approved = '';

    private $table = 'accommodation';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Query for a place by it's id
     *
     * @param int, place id
     * @return associative array of data
     */
    public function get_place($id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($id === FALSE)
        {
            return NULL;
        }

        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        if ($query->num_rows() === 1)
            return $query->row_array();
    }

    /**
     * Query all the places from this category
     *
     * @return array of associative array of data
     */
    public function get_all()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * Adds a new place to accommodation table
     *
     * @return bool, status of operation
     */
    public function add_place()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['website'] = $this->input->post('website');
        $data['location'] = $this->input->post('location');
        $data['longitude'] = $this->input->post('longitude');
        $data['latitude'] = $this->input->post('latitude');

        return $this->db->insert($this->table, $data);
    }

    /**
     * Deletes a place by id
     *
     * @param int, place id
     * @return bool, status of operation
     */
    public function remove_place($id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('id', $id);
        $this->db->delete($this->table);

        return TRUE;
    }
}

/* End of file accommodation_model.php */
/* Location: application/models/accommodation_model.php */
