<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
    /**
     * id (PK, Auto Increment, int)
     * name (string)
     */

    private $table = 'category';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Get category by id
     *
     * @param int, category id
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
     * Query all the categories
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
     * Add a new category
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
     * Deletes a category by id
     *
     * @param int, category id
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

/* End of file category_model.php */
/* Location: application/models/category_model.php */
