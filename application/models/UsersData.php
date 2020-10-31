<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UsersData extends CI_Model
{
    public function allRecord()
    {
       //SELECT count(*) FROM `volunteer` 
       $year1 = idate('Y');
       $year2 = idate('y')+1;
       $this->db->where('session',$year1."-".$year2);
       return $this->db->count_all_results('volunteer');
    }

    public function maleRecord()
    {
        //SELECT count(*) FROM `volunteer` WHERE gender ='Male'
        $year1 = idate('Y');
        $year2 = idate('y')+1;
        $this->db->where('session',$year1."-".$year2);
        $this->db->where('gender','Male');
        return $this->db->count_all_results('volunteer');
    }

    public function femaleRecord()
    {
        //SELECT count(*) FROM `volunteer` WHERE gender ='female'
        $year1 = idate('Y');
        $year2 = idate('y')+1;
        $this->db->where('session',$year1."-".$year2);
        $this->db->where('gender','Female');
        return $this->db->count_all_results('volunteer');
    }

    public function regNo($gender)
    {
        //"SELECT count(*) FROM `volunteer` WHERE `gender`= '$gender'";
        $this->db->where('gender', $gender);
        $this->db->where('timestamp', idate('Y'));
        return $this->db->count_all_results('volunteer');
    }

    public function fetchMail($email)
    {
        //Select * from `volunteer` where `email` = '$email';
        $this->db->where('email', $email);
        return $this->db->count_all_results('volunteer');
    }

    public function registerUser($formArray)
    {
        $this->db->insert('volunteer', $formArray);
    }

    public function isvalidate($username, $password)
    {
        //SELECT email FROM volunteer WHERE email = '$username' and pass = '$password'
        $q = $this->db->where(['email'=>$username,'pass'=>$password])
                ->get('volunteer');

            // // echo "<pre>";
            //  //print_r($q);
            // if($q -> num_rows())
            // {
                 return $q->row();
            // }
            // else{
            //     return FALSE;
            // }
    }

    // public function fetch_single_details($user_id)
    // {
    //     $this->db->where('reg_no', $user_id);
    //     return $this->db->get('volunteer');
    // }

    public function fetchRegDate()
    {
        $users = $this->db->get('registerVar')->result_array();
		return $users;
    }
    

    	// This function will get the total no. of boys and girls
	
	// public function getBoysGirls(){
	// 	return $this->db->get('registerVar')->result_array();

    // }
    

    public function getBoysReg(){
        return $this->db->select('boys')->where('id', 1)->get('registerVar')->result_array();
    }

    public function getGirlsReg(){
        return $this->db->select('girls')->where('id', 1)->get('registerVar')->result_array();
    }

    public function getRegDate(){
        return $this->db->select('regisDate')->where('id', 1)->get('registerVar')->result_array();
    }

    public function getStatus(){
        return $this->db->select('status')->where('id', 1)->get('registerVar')->result_array();
    }

    public function getSumBoysGirls(){
        $this->db->select('SUM(boys) + SUM(girls) as total', FALSE)->get('registerVar')->result_array();
    }

}
