<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class accommodation_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_accommodation($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('accommodation');
			return $query->result_array();
		}

		$query = $this->db->get_where('accommodation', array('id' => $id));
		return $query->row_array();
	}

	public function set_accommodation()
	{
		$this->load->helper('url');

		$id = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'name' => $this->input->post('name'),
			'id' => $id,
			'description' => $this->input->post('description'),
			'website' => $this->input->post('website'),
			'location' => $this->input->post('location'),
			'longitude' => $this->input->post('longitude'),
			'latitude' => $this->input->post('latitude'),
			'rating' => $this->input->post('rating')
		);

		return $this->db->insert('accommodation', $data);
	}
}
