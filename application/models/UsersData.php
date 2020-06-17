<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UsersData extends CI_Model
{
    public function allRecord()
    {
       //SELECT count(*) FROM `volunteer` 
       return $this->db->count_all_results('volunteer');
    }

    public function maleRecord()
    {
        //SELECT count(*) FROM `volunteer` WHERE gender ='Male'
        $this->db->where('gender','Male');
        return $this->db->count_all_results('volunteer');
    }

    public function femaleRecord()
    {
        //SELECT count(*) FROM `volunteer` WHERE gender ='female'
        $this->db->where('gender','Female');
        return $this->db->count_all_results('volunteer');
    }

    public function regNo($gender)
    {
        //"SELECT count(*) FROM `volunteer` WHERE `gender`= '$gender'";
        $this->db->where('gender', $gender);
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
    
}