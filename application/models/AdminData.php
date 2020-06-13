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
	// public function login($email, $password) {
	// 	//SELECT email FROM users WHERE email = '$email' and pass = '$password'
    //     $q = $this->db->where(['email'=>$email,'pass'=>$password])
    //             ->get('users');
    //     return $q->num_rows();
	// }

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
}



?>