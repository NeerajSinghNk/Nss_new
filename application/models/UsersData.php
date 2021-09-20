<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UsersData extends CI_Model
{
    public function allRecord()
    {
       //SELECT count(*) FROM `volunteer` 
    //    $year1 = idate('Y');
    //    $year2 = idate('y')+1;
    $sessionNss = $this->UsersData->getSessionYear();
    
       $this->db->where('session',$sessionNss[0]['sessionYear']);
       return $this->db->count_all_results('volunteer');
   }

   public function maleRecord()
   {
        //SELECT count(*) FROM `volunteer` WHERE gender ='Male'
    // $year1 = idate('Y');
    // $year2 = idate('y')+1;
    $sessionNss = $this->UsersData->getSessionYear();

    $this->db->where('session',$sessionNss[0]['sessionYear']);
    $this->db->where('gender','Male');
    return $this->db->count_all_results('volunteer');
}

public function femaleRecord()
{
        //SELECT count(*) FROM `volunteer` WHERE gender ='female'
    // $year1 = idate('Y');
    // $year2 = idate('y')+1;
	$sessionNss = $this->UsersData->getSessionYear();

    $this->db->where('session',$sessionNss[0]['sessionYear']);
    $this->db->where('gender','Female');
    return $this->db->count_all_results('volunteer');
}

public function regNo($gender)
{
        //"SELECT count(*) FROM `volunteer` WHERE `gender`= '$gender'";
    // $year1 = idate('Y');
    // $year2 = idate('y')+1;
	$sessionNss = $this->UsersData->getSessionYear();

    $sessionNss = $sessionNss[0]['sessionYear'];

    $this->db->where('reg_no IS NOT NULL');
    $this->db->where('gender', $gender);
    $this->db->where('session', $sessionNss);
    return $this->db->count_all_results('volunteer');
}

public function fetchMail($email)
{
    $sessionNss = $this->UsersData->getSessionYear();

    $sessionNss = $sessionNss[0]['sessionYear'];
        //Select * from `volunteer` where `email` = '$email';
    $this->db->where('email', $email );
    $this->db->where('session', $sessionNss);
    return $this->db->count_all_results('volunteer');
}

public function registerUser($formArray)
{
    $this->db->insert('volunteer', $formArray);
}

public function isvalidate($username, $password)
{
    // $year1 = idate('Y');
    // $year2 = idate('y')+1;
    $sessionNss = $this->UsersData->getSessionYear();

    $sessionNss = $sessionNss[0]['sessionYear'];
    //Jan 2021 session 2021-22 2020-21, July 2020 July 2021
        //SELECT email FROM volunteer WHERE email = '$username' and pass = '$password'
    // $this->db->where('reg_no');
    $this->db->where('session', $sessionNss);
    $q = $this->db->where(['email'=>$username,'pass'=>$password])
            ->get('volunteer');
            // if('reg_no' == null){
            //     echo "In process";
            // }else{
    return $q->row();
            // }


}



public function fetchRegDate()
{
    $users = $this->db->get('registerVar')->result_array();
    return $users;
}





public function getBoysReg(){
    return $this->db->select('boys')->where('id', 1)->get('registerVar')->result_array();
}

public function getGirlsReg(){
    return $this->db->select('girls')->where('id', 1)->get('registerVar')->result_array();
}

public function getRegDate(){
    return $this->db->select('regisDate')->where('id', 1)->get('registerVar')->result_array();
}

public function cordiName(){
    return $this->db->select('coordinator_name')->where('id', 1)->get('registerVar')->result_array();
}

public function phone(){
    return $this->db->select('phone')->where('id', 1)->get('registerVar')->result_array();
}

public function getStatus(){
    return $this->db->select('status')->where('id', 1)->get('registerVar')->result_array();
}

public function getSumBoysGirls(){
    $this->db->select('SUM(boys) + SUM(girls) as total', FALSE)->get('registerVar')->result_array();
}

public function getGender($id){
    $res = $this->db->select('gender')->where('sno', $id)->get('volunteer')->row_array();
        // print_r($res);
    return $res;
}

// THis function is used to get the session of NSS registration
public function getSessionYear()
{
    return $this->db->select('sessionYear')->where('id', 1)->get('registerVar')->result_array();
}

    //Approved review application

public function approvedReviewForm($id, $regno){


    $this->db->set('reg_no', $regno);
    $this->db->set('sno', $id);
    $this->db->where('sno', $id);
    $this->db->update('volunteer');

        // $sql = "INSERT into volunteer('reg_no') values ($regno) where sno = $id";
}




}
