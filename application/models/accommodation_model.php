<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
     * query for a place by it's id
     *
     * @param id, place id
     */
    public function get_place($id = FALSE)
    {
        if ($id === FALSE)
        {
            return NULL;
        }

        $query = $this->db->get_where('accommodation', array('id' => $id));

        if ($query->num_rows() === 1)
            return $query->row_array();
    }

    /**
     * query all the places from this category
     */
    public function get_all()
    {
        $query = $this->db->get('accommodation');
        return $query->result_array();
    }

    public function add_place()
    {
        $this->name = $this->input->post('name');
        $this->description = $this->input->post('description');
        $this->website = $this->input->post('website');
        $this->location = $this->input->post('location');
        $this->longitude = $this->input->post('longitude');
        $this->latitude = $this->input->post('latitude');

        return $this->db->insert('accommodation', $this);
    }

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
