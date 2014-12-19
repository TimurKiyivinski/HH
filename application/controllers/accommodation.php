<?php

class Accommodation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('accommodation_model');
	}

	public function index()
	{
		$data['accommodation'] = $this->accommodation_model->get_accommodation();
		$data['title'] = 'Accommodation Database';
		$data['head'] = $this->load->view('templates/head', $data, TRUE);
		$data['NavBar'] = $this->load->view('templates/NavBar', $data, TRUE);
		$data['foot'] = $this->load->view('templates/foot', $data, TRUE);
		$data['DisplayRatingSystem'] = $this->load->view('templates/DisplayRatingSystem', $data, TRUE);
		$this->load->view('accommodation/index', $data);
	}

	public function view($id)
	{
		$data['accommodation_item'] = $this->accommodation_model->get_accommodation($id);

		if (empty($data['accommodation_item']))
		{
			show_404();
		}

		$data['title'] = $data['accommodation_item']['name'];
		$data['name'] = $data['accommodation_item']['name'];
		$data['website'] = $data['accommodation_item']['website'];
		$data['location'] = $data['accommodation_item']['location'];
		$data['description'] = $data['accommodation_item']['description'];
		$data['longitude'] = $data['accommodation_item']['longitude'];
		$data['latitude'] = $data['accommodation_item']['latitude'];
		$data['rating'] = $data['accommodation_item']['rating'];

		$RatingCookie = array(
					    'name'   => 'NewRating'.$id,
					    'value'  => '0',
					    'expire' => '86400 * 30',
					    // 'domain' => '.some-domain.com',
					    // 'path'   => '/',
					    // 'prefix' => '$id',
					    'secure' => TRUE
					);

		$this->input->set_cookie($RatingCookie);
        
		$data['head'] = $this->load->view('templates/head', $data, TRUE);
		$data['NavBar'] = $this->load->view('templates/NavBar', $data, TRUE);	
		$data['foot'] = $this->load->view('templates/foot', $data, TRUE);
		$data['DisplayRatingSystem'] = $this->load->view('templates/DisplayRatingSystem', $data, TRUE);
		$data['RatingSystem'] = $this->load->view('templates/RatingSystem', $data, TRUE);
		$this->load->view('accommodation/view', $data);
	}
}

/* End of file accommodation.php */
/* Location: ./application/controllers/accommodation.php */
