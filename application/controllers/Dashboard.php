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
		$this->render_template('/Admin/dashboard', $data);
	}

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

}

?>