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
		if($dateTime)
		{
			$this->AdminData->registerVar($dateTime,$boys,$girls,$status);
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
        // $regno = 0;
        // $add_it = '';
		$gender = $this->UsersData->getGender($id);
		// print_r($gender['gender']);
		// print_r($gender[0]['gender']);   
        // foreach($genders as $gender){
            $add_it = $this->UsersData->regNo($gender['gender']); //REGISTRATION
        
            if($gender['gender'] == 'Male')                    //NO.
               {                                        //GENERATE 
                   $regno = 1000;                       //BY
               }elseif($gender['gender'] == 'Female'){            //  THIS    
                   $regno = 2000;                       //CODE
               }                                        //VALUE IN 
			   $regno +=$add_it;      
			//    $add_it--;                  //REGNO.
            // print_r($add_it);
           
        // }
		$this->UsersData->approvedReviewForm($id, $regno);
		$this->render_template('Admin/reviewList');
       
        
    }

	//This function is used to review the application and generate application number

	public function reviewApplication(){
		
	}

}

?>
