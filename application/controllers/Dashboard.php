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
		$this->render_template('/Admin/dashboard');
	}
}

?>