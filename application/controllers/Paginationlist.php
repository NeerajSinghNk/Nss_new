<?php

class Paginationlist extends Admin_Controller
{

    public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
	}

    //Page list

	public function index()
	{
		

		$config['base_url'] = 'Dashboard/list';
		$config['total_rows'] = $this->AdminData->total_responses();
		$config['per_page'] = 8;
		
		$this->pagination->initialize($config);
		
		//$data['links'] = $this->pagination->create_links();
		$data['listNo'] = $this->AdminData->fetch_list(3, $config['per_page']); 
		$this->render_template('Admin/list', $data);
	}
}


?>