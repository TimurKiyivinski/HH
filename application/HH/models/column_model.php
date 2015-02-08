<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Column_model extends CI_Model
{
    /**
     * id (PK, Auto Increment, int)
     * category_id (FK, int)
     * column_name (string)
     */

    private $table = 'category_column';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Query for a category detail list by the id
     *
     * @param int, place id
     * @return associative array of data
     */
    public function get($id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($id === FALSE)
        {
            return NULL;
        }

        $this->db->from($this->table);
        $this->db->where('category_id', $id);
        
        return $query->result_array();
    }
    
    /**
     * Query all the places
     *
     * @return array of associative array of data
     */
    public function get_all()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}

/* End of file column_model.php */
/* Location: application/models/column_model.php */
