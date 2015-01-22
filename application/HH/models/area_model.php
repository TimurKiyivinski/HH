<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends CI_Model
{
    /**
     * id (PK, Auto Increment, int)
     * name (string)
     */

    private $table = 'area';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Get area by id
     *
     * @param int, area id
     * @return associative array of data
     */
    public function get($id = FALSE)
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
     * Query all the areas
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
     * Add a new area
     *
     * @return bool, status of operation
     **/
    public function add()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $data = array();
        $data['name'] = $this->input->post('name');

        return $this->db->insert($this->table, $data);
    }

    /**
     * Deletes a area by id
     *
     * @param int, area id
     * @return bool, status of operation
     */
    public function remove($id = FALSE)
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

/* End of file area_model.php */
/* Location: application/models/area_model.php */
