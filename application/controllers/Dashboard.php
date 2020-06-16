<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
	}

	public function index()
	{	
		$data['total_responses'] = $this->AdminData->total_responses();
		$data['currentRespo'] = $this->AdminData->currentResponse_total();
		$this->render_template('/Admin/dashboard', $data);
	}

	//Overall responses function

	public function create()
	{

	}
// comment because we are not create a update form

	// public function update($userID)
	// {
	// 	$user = $this->AdminData->editUser($userID);
	// 	$data = array();
	// 	$data['user'] = $user;

	// 	$formArray = array();
	// 	$formArray['email'] = $this->input->post('email');
	// 	$formArray['name'] = $this->input->post('name');

	// 	$this->AdminData->updateuser($userID, $formArray);
		// $this->session->set_flashdata('success', 'Record updated successfully...');
	// 	$this->render_template('Admin/update', $data);
	// }

	public function list()
	{	
		$users = $this->AdminData->all();
		$data = array();
		$data['users'] = $users;
		$this->render_template('Admin/list', $data);
	}

	
	public function delete($userID)
	{
		
			$this->AdminData->deleterow($userID);
			//$this->session->set_flashdata('success', 'Record deleted successfully...');
			$this->render_template('Admin/list');
		
	}

	//Page list

	// public function pageList()
	// {
	// 	$this->load->library('pagination');

	// 	$config['base_url'] = 'Dashboard/list';
	// 	$config['total_rows'] = $this->AdminData->total_responses();
	// 	$config['per_page'] = 7;
	// 	$config["uri_segment"] = 3;
	// 	$this->pagination->initialize($config);

	// 	$page = $this->AdminData->getList($config['per_page'], $this->uri->segment(3)); 
	// 	$this->render_template('Admin/list', $page);
	// }

	//Current responses function
	
	public function currentList()
	{
		$current = $this->AdminData->currentResponses();
		$data = array();
		$data['currentRes'] = $current;
		$this->render_template('Admin/currentList', $data);
	}

	//Current response CURD application for delete

	public function deleteCurrentResponse($userID)
	{
		
			$this->AdminData->deleterow($userID);
			//$this->session->set_flashdata('success', 'Record deleted successfully...');
			$this->render_template('Admin/currentList');
		
	}

	// //Current response CURD application for update

	public function updateCurrentResponse()
	{

	}



	//Summary Application function //Google$summaryRec chart function

	public function summary()
	{
		$summaryRec = array();
		$summaryRec['male'] = $this->AdminData->getTotalmale(); 
		$summaryRec['female'] = $this->AdminData->getTotalfemale(); 
		$summaryRec['totalMaleFemale'] = $this->AdminData->getTotalSummary();
		$summaryRec['year1'] = $this->AdminData->year1();
		$summaryRec['year2'] = $this->AdminData->year2();
		$summaryRec['year3'] = $this->AdminData->year3();
		$summaryRec['year4'] = $this->AdminData->year4();
		$summaryRec['category'] = $this->AdminData->category();
		$summaryRec['nssYear'] = $this->AdminData->nssYear();
		$summaryRec['branch'] = $this->AdminData->branch();
		$this->render_template('Admin/summary', $summaryRec);
	}

	//Google$summaryRec chart function

}

?>