<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Photo model handles everything related to the query
 * towards the photo table in the database
 */
class Photo_model extends CI_Model
{
    public $id = '';
    public $category_id = '';
    public $place_id = '';
    public $link = '';
    public $thumbnail = '';

    private $table = 'photos';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
    }

    /**
     * Query the image link of a place
     * or every place in a category
     *
     * @param int, category id
     * @param int, place id
     * @return aarray of ssociative array of data
     */
    public function get_link($category_id = FALSE, $place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category_id === FALSE)
        {
            return NULL;
        }

        $this->db->where('category_id', $category_id);

        // if place id is not specified, get all places from category
        if ($place_id !== FALSE)
        {
            $this->db->where('place_id', $place_id);
        }

        $query = $this->db->get($this->table);

        return $query->row_array();
    }

    /**
     * Query all the image thumbnail links of a place
     * or every place in the category
     *
     * @return array of associative array of data
     */
    public function get_thumbnails($category_id = FALSE, $place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category_id === FALSE)
        {
            return NULL;
        }

        $this->db->where('category_id', $category_id);

        // if place id is not specified, get all from category
        if ($place_id !== FALSE)
        {
            $this->db->where('place_id', $place_id);
        }

        $this->db->where('thumbnail', TRUE);

        $query = $this->db->get($this->table);

        return $query->result_array();
    }

    /**
     * Adds a new image link to photos table
     *
     * @return bool, status of operation
     */
    public function add_link()
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        $data = array();
        $data['category_id'] = $this->input->post('category_id');
        $data['place_id'] = $this->input->post('place_id');
        $data['link'] = $this->input->post('link');
        $data['thumbnail'] = $this->input->post('thumbnail');

        return $this->db->insert($this->table, $data);
    }

    /**
     * Deletes an image link
     *
     * NOTE: It doesn't delete image, only the link to it
     *
     * @param int, category id
     * @param int, place id
     * @return bool, status of operation
     */
    public function remove_place($category_id = FALSE, $place_id = FALSE)
    {
        log_msg(__CLASS__, __FUNCTION__, func_get_args());
        if ($category_id === FALSE || $place_id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('category_id', $category_id);
        $this->db->where('place_id', $place_id);

        $this->db->delete($this->table);

        return TRUE;
    }
}

/* End of file photos_model.php */
/* Location: application/models/photos_model.php */
