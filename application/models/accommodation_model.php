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
        $this->load->database();
    }

    /**
     * Query for a place by it's id
     *
     * @param int, place id
     * @return associative array of data
     */
    public function get_place($id = FALSE)
    {
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
        if ($id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('id', $id);
        $this->db->delete('accommodation');

        return TRUE;
    }
}

/* End of file accommodation_model.php */
/* Location: application/models/accommodation_model.php */
