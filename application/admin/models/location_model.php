<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_model extends CI_Model
{

    private $table = 'location';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Get place location by place id
     *
     * @param int, place id
     * @return associative array of data
     */
    public function get($place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($place_id === FALSE)
        {
            return NULL;
        }

        $this->db->where('place_id', $place_id);
        $query = $this->db->from($this->table);

        return $query->result_array();
    }
}

/* End of file location_model.php */
/* Location: application/models/location_model.php */


