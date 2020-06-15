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
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));

			if($query->num_rows() == 1) {
				$result = $query->row_array();
				return $result;
				
			}
			else {
				return false;
			}
		}
	}

	public function total_responses()
	{
		//SELECT count(*) FROM `volunteer` 
		return $this->db->count_all_results('volunteer');
	}

	public function all()
	{
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
		redirect('Dashboard/list');
			}
			else{
				$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
				redirect('Dashboard/list');
			}
		}


}



?>