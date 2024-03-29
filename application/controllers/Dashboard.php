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
		$data['reviewResponse_total'] = $this->AdminData->reviewResponse_total();
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

	
	public function deleteList($userID)
	{
		
			$this->AdminData->deleteListRow($userID);
			//$this->session->set_flashdata('success', 'Record deleted successfully...');
			$this->render_template('Admin/list');
		
	}


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

	
	//Updatin$this->render_template('Admin/nssRegisUpdate');g registration date of NSS candidate

	public function nssRegisUpdate()
	{
		$dateTime = $this->input->post('dateTime');
		$boys = $this->input->post('boys');
		$girls = $this->input->post('girls');
		$status =  $this->input->post('r3');
		$sessionYear = $this->input->post('sessionYear');
		$cordiName = $this->input->post('coordinator');
		$phone = $this->input->post('phone');
		// print_r($phone);
		// exit;
		if($dateTime)
		{
			$this->AdminData->registerVar($dateTime,$boys,$girls,$status,$sessionYear,$cordiName,$phone);
			$this->session->set_flashdata('success','Registration Data Successfully updated...');
			
		}

		$this->render_template('Admin/nssRegisUpdate');
	}

	//This function is used to show review application

	public function showReview(){
		$review = $this->AdminData->reviewShow();
		// print_r($review);
		$data = array();
		$data['review'] = $review;
		$this->render_template('Admin/reviewList', $data);
	}

	 //Approved incomming form

	 public function approvedReview($id){
      
		$gender = $this->UsersData->getGender($id);
		
            $add_it = $this->UsersData->regNo($gender['gender']); //REGISTRATION
        
            if($gender['gender'] == 'Male')                    //NO.
               {                                        //GENERATE 
                   $regno = 1001;                       //BY
               }elseif($gender['gender'] == 'Female'){            //  THIS    
                   $regno = 2001;                       //CODE
               }                                        //VALUE IN 
			   $regno +=$add_it;      
			                  //REGNO.
        // if($this->UsersData->checkRegistrationNumber($regno) != $regno){
        //     print_r($this->UsersData->checkRegistrationNumber($regno) != $regno);
        //     print_r("Successful");
        //     exit;
            $this->UsersData->approvedReviewForm($id, $regno);
		    redirect(base_url('Dashboard/showReview'));
        // }
		// else{
        //     print_r("Error occure");
        //     exit;
        //     $this->session->set_flashdata('errorInReg','Opps!!! Registration number is not generated yet. Please try again after reloading...');
        // }
       
        
    }

	//This function is used to review the application and generate application number

	public function deleteReviewResponse($userID){
		$this->AdminData->deleteReviewList($userID);
		redirect(base_url('Dashboard/showReview'));
	}

}

?>
