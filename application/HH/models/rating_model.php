<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rating_model extends CI_Model
{
    /**
     * id (PK, Auto Increment, int)
     * name (string)
     */

    private $table = 'rating';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Get rating by place_id
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
        $query = $this->db->get($this->table);

        if ($query->num_rows() === 1)
            return $query->row_array();
    }

    /**
     * Query all the ratings
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
     * Update a rating, if doesn't exist, add new
     *
     * @return bool, status of operation
     **/
    public function update()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $data = array();
        $data['place_id'] = $this->input->post('place_id');
        $data['total'] = $this->input->post('rate');
        $data['count'] = 1;

        $this->db->where('place_id', $data['place_id']);
        $query = $this->db->get($this->table);

        if ($query->num_rows() === 1)
        {
            $row = $query->row_array();
            $row['total'] += $data['total'];
            $row['count']++;

            $this->db->where('place_id', $data['place_id']);
            return $this->db->update($this->table, $row);
        }
        else {
            return $this->db->insert($this->table, $data);
        }
    }

    /**
     * Deletes rating by place
     *
     * @param int, place id
     * @return bool, status of operation
     */
    public function remove($place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($place_id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('place_id', $place_id);
        $this->db->delete($this->table);

        return TRUE;
    }
}

/* End of file rating_model.php */
/* Location: application/models/rating_model.php */
