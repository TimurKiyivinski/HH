<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Search model does most of the search API used by the controller
 */
class Search_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Make a search query
     *
     * @param string , search string
     * @return array of place ids
     */
    public function find_all($str = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($str === FALSE)
        {
            return NULL;
        }

        $result = array();

        $this->db->select('place.id');
        $this->db->from('place');
        $this->db->join('category', 'place.category_id = category.id', 'left');
        $this->db->join('area', 'place.area_id = area.id', 'left');
        $this->db->or_like('place.name', $str, 'both');
        $this->db->or_like('place.description', $str, 'both');
        $this->db->or_like('place.address', $str, 'both');
        $this->db->or_like('category.name', $str, 'both');
        $this->db->or_like('area.name', $str, 'both');

        $query = $this->db->get()->result_array();

        foreach ($query as $row)
        {
            $result[] += $row['id'];
        }

        $this->db->select('place_detail.place_id AS "id"');
        $this->db->from('category_column');
        $this->db->join('place_detail', 'place_detail.category_column_id = category_column.id');
        $this->db->like('place_detail.detail', $str, 'both');
        $this->db->group_by('place_detail.place_id');

        $query = $this->db->get()->result_array();

        foreach ($query as $row)
        {
            $result[] += $row['id'];
        }

        // return the non-duplicated search result;
        return array_unique($result);
    }

}

/* End of file search_model.php */
/* Location: application/models/search_model.php */

