<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class AdminData extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/

	public function login($email, $password) {
		if($email && $password) {
			$sql = "SELECT * FROM users WHERE email = ? and pass= ?";
           
			$query = $this->db->query($sql, array($email,$password));
            // print_r($query->row());
            // exit;
			if($query->num_rows() == 1) {
				$result = $query->row_array();
				return $result;
				
			}
			else {
				return false;
			}
		}
	}

	//overall response

	public function total_responses()
	{
		//SELECT count(*) FROM `volunteer` 
		return $this->db->count_all_results('volunteer');
	}

	//current response

	public function currentResponse_total()
	{
		// $year1 = idate('Y');
        // $year2 = idate('y')+1;
		// $sessionNss = $year1."-".$year2;
		$sessionNss = $this->UsersData->getSessionYear();
        
        
		$q = $this->db->where('reg_no IS NOT NULL');
		$q = $this->db->where('session', $sessionNss[0]['sessionYear']);
		return $q->count_all_results('volunteer');
	}

	// Review Responses
	public function reviewResponse_total()
	{
		// $year1 = idate('Y');
        // $year2 = idate('y')+1;
		// $sessionNss = $year1."-".$year2;
		$sessionNss = $this->UsersData->getSessionYear();
        
		$q = $this->db->where('reg_no IS NULL');
		$q = $this->db->where('session', $sessionNss[0]['sessionYear']);
		return $q->count_all_results('volunteer');
	}


	//Use for pagination in list page
	public function fetch_list($limit, $start) {
        $this->db->limit($limit, $start);
		$query = $this->db->get("volunteer");
		return $query->result();

   }

	public function all()
	{
		$this->db->where('reg_no IS NOT NULL');
		$this->db->order_by('name', 'ASC'); 
		$users = $this->db->get('volunteer')->result_array();
		return $users;
	}

	public function getUser($userID)
	{
		$this->db->where('sno', $userID);
		$user = $this->db->get('volunteer')->row_array();
		return $user;
	}

	public function updateuser($userID, $formArray)
	{
		$this->db->where('sno', $userID);
		$this->db->update('volunteer', $formArray);
	}

	public function deleterow($userID){
		$sql_query=$this->db->where('sno', $userID)
						->delete('volunteer');
				   if($sql_query){
		$this->session->set_flashdata('success', 'Record delete successfully');
		redirect('Dashboard/currentList');
			}
			else{
				$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
				redirect('Dashboard/currentList');
			}
	}

	public function deleteListRow($userID){
		$sql_query=$this->db->where('sno', $userID)
						->delete('volunteer');
				   if($sql_query){
		$this->session->set_flashdata('success', 'Record delete successfully');
		redirect('Dashboard/list');
			}
			else{
				$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
				redirect('Dashboard/list');
			}
	}
	
	public function currentResponses()
	{
		// $year1 = idate('Y');
        // $year2 = idate('y')+1;
        // $sessionNss = $year1."-".$year2;
		$sessionNss = $this->UsersData->getSessionYear();
        
		
		date_default_timezone_set('Asia/Calcutta');
		$this->db->where('reg_no IS NOT NULL');
		$this->db->where('session', $sessionNss[0]['sessionYear'])->order_by('name', 'ASC');
		$this->db->join('states','state_id=state');
		$this->db->join('cities','city_id=city');
		$currentRes = $this->db->get('volunteer')->result_array();
		return $currentRes;
	}

	//review application
	public function reviewShow(){
		// $res = '';
		$this->db->where('reg_no')->order_by('name', 'ASC');
		$review = $this->db->get('volunteer')->result_array();
		// print_r($review);
		return $review;
	}

	public function deleteReviewList($userID){
		$sql_query=$this->db->where('sno', $userID)
						->delete('volunteer');
				   if($sql_query){
		$this->session->set_flashdata('success', 'Record delete successfully');
		redirect('Dashboard/showReview');
			}
			else{
				$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
				redirect('Dashboard/showReview');
			}
	}

	

	//Total summary session

	public function getTotalmale()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
	    $this->db->where('gender', 'Male');
		return $this->db->where('session', $sessionNss)->count_all_results('volunteer');
	}

	public function getTotalfemale()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$this->db->where('gender', 'Female');
		return $this->db->where('session', $sessionNss)->count_all_results('volunteer');
		
	}

	public function getTotalSummary()
	{
		return $this->db->count_all_results('volunteer');
	}

	public function year1()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$this->db->where("class", "1st");
		return $this->db->where('session', $sessionNss)->count_all_results('volunteer');
	}

	public function year2()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$this->db->where("class", "2nd");
		return $this->db->where('session', $sessionNss)->count_all_results('volunteer');
	}

	public function year3()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$this->db->where("class", "3rd");
		return $this->db->where('session', $sessionNss)->count_all_results('volunteer');
	}

	public function year4()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$this->db->where("class", "4th");
		return $this->db->where('session', $sessionNss)->count_all_results('volunteer');
	}

	
	//Google pie chart function

	public function category()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$sql="SELECT category, count(*) FROM `volunteer` where session = '$sessionNss' GROUP BY category";
		$query = $this->db->query($sql);
		$result = $query->result_array();         // Returns the result as an array
		return $result;

	}

	public function nssYear()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$sql="SELECT nssYear, count(*) FROM `volunteer` where session = '$sessionNss' GROUP BY nssYear";
		$query = $this->db->query($sql);
		$result = $query->result_array();         // Returns the result as an array
		return $result;
	}

	public function branch()
	{
		$sessionNss = $this->UsersData->getSessionYear();
    	$sessionNss = $sessionNss[0]['sessionYear'];
		$sql="SELECT branch, count(*) FROM `volunteer` where session = '$sessionNss' GROUP BY branch";
		$query = $this->db->query($sql);
		$result = $query->result_array();         // Returns the result as an array
		return $result;
	}

	//Insert a registration date in RegisterVar table
	public function registerVar($dateTime,$boys,$girls,$status,$sessionYear,$cordiName,$phone)
	{
		$this->db->set('regisDate', $dateTime);
		$this->db->set('boys', $boys);
		$this->db->set('girls', $girls);
		$this->db->set('status', $status);
		$this->db->set('sessionYear', $sessionYear);
		$this->db->set('coordinator_name', $cordiName);
		$this->db->set('phone',$phone);
		$this->db->where('id', 1);
		$this->db->update('registervar'); // gives UPDATE `mytable` SET `registerDate` = 'dateTime' WHERE `id` = 1
		
		// if($sql_query){
		// 	$this->session->set_flashdata('success', 'Date & Time Updated Successfully');
		// 	redirect('Dashboard/nssRegisUpdate');
		// 		}
		// 		else{
		// 			$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
		// 			redirect('Dashboard/nssRegisUpdate');
		// 		}
	}


}



?>
