<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_controller
{ 
    public function index()
    {
        date_default_timezone_set('Asia/Calcutta');
        $resDate = $this->UsersData->fetchRegDate();
        $respo = '';
        foreach($resDate as $row)
        {
            $respo = explode('-',$row['regisDate']);
        }
        $data['start_at'] = date("Y-m-d H:i:s", strtotime(trim($respo[0])));
        $data['end_at']   = date("Y-m-d H:i:s", strtotime(trim($respo[1])));
        $currentDateTime = date('Y-m-d H:i:s');
        
       


        $boys = $this->UsersData->getBoysReg();
        $girls = $this->UsersData->getGirlsReg();
        
        $regStatus = $this->UsersData->getStatus();
        $formStatus = implode("",$regStatus[0]);
        $data['status'] = 'ON';

        // print_r($data);

        if($data['start_at'] <= $currentDateTime && $data['end_at'] >= $currentDateTime && $data['status']== $formStatus)
        {
            $this->load->view('Users/index',$data);
        }
        else
        {  
            return redirect('/Users/close');
        }
    }


    public function check_terms()
    {

        $data['MaleTotal'] = $this->UsersData->maleRecord();
        $data['FemaleTotal'] = $this->UsersData->femaleRecord();

        $boys = $this->UsersData->getBoysReg();
        $girls = $this->UsersData->getGirlsReg();

        $TotalBoy = implode("",$boys[0]);
        $TotalGirl = implode("",$girls[0]);

        $boys_disabled="";
        $girls_disabled="";
        $disabled_msg = "";
        if($data['MaleTotal'] >= $TotalBoy)
        {
            $boys_disabled = "disabled";
            $disabled_msg = "Notice:Registration for boys has been closed";
        }
        if($data['FemaleTotal'] >= $TotalGirl)
        {
            $girls_disabled = "disabled";
            $disabled_msg = "Notice:Registration for girls has been closed";
        }
        if($this->input->post('instructions'))
        {
            $this->session->set_userdata('disabledMsg', $disabled_msg);
            $this->session->set_userdata('boys_disabled',$boys_disabled);
            $this->session->set_userdata('girls_disabled',$girls_disabled);
            return redirect("/Users/register");
        }


    }

    public function register()
    {
        $this->load->view('Users/register');
    }


    public function getDataForm()
    {

        date_default_timezone_set('Asia/Calcutta');
        $t = microtime(true);
        $micro = sprintf("%06d",($t - floor($t)) * 1000000);
        $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
        
        $sessionNss = $this->UsersData->getSessionYear();
 
        $email = $this->input->post('email');
        $existMail = $this->UsersData->fetchMail($email);
            //print_r($existMail);
        if($existMail >= 1)
        {
        $this->session->set_flashdata('matchFound', 'matchFound');
        return redirect('/Users/login');
        }
        else
        {    
            $formArray = array();
            $formArray['email'] = $this->input->post('email');
            $formArray['pass'] = $this->input->post('pass');
                    // $formArray['reg_no'] = $regno;//Registration no......
            $formArray['gender'] = $this->input->post('gender');
            $formArray['name'] = strtoupper($this->input->post('name'));
            $formArray['gender'] = $this->input->post('gender');
            $formArray['category'] = $this->input->post('category');
            $formArray['dob'] = $this->input->post('dob');
            $formArray['bloodgrp'] = $this->input->post('bloodgrp');
            $formArray['class'] = $this->input->post('class');
            $formArray['branch'] = $this->input->post('branch');
            $formArray['whatsappno'] = $this->input->post('whatsappno');
            $formArray['altno'] = $this->input->post('altno');
            $formArray['fathername'] = strtoupper($this->input->post('fathername'));
            $formArray['fatheroccupation'] = strtoupper($this->input->post('fatheroccupation'));
            $formArray['mothername'] = strtoupper($this->input->post('mothername'));
            $formArray['familyincome'] = $this->input->post('familyincome');
            $formArray['caddr'] = strtoupper($this->input->post('caddr'));
            $formArray['paddr'] = strtoupper($this->input->post('paddr'));
            $formArray['is_nssV'] = $this->input->post('is_nssV');
            $formArray['nssYear'] = $this->input->post('nssYear');
            $formArray['t1'] = strtoupper($this->input->post('t1'));
            $formArray['t1a'] = $this->input->post('t1a');
            $formArray['t1b'] = $this->input->post('t1b');
            $formArray['t2'] = strtoupper($this->input->post('t2'));
            $formArray['t2a'] = $this->input->post('t2a');
            $formArray['t2b'] = $this->input->post('t2b');
            $formArray['t3'] = strtoupper($this->input->post('t3'));
            $formArray['t3a'] = $this->input->post('t3a');
            $formArray['t3b'] = $this->input->post('t3b');
            $formArray['t4'] = strtoupper($this->input->post('t4'));
            $formArray['t4a'] = $this->input->post('t4a');
            $formArray['t4b'] = $this->input->post('t4b');
            $formArray['t5'] = strtoupper($this->input->post('t5'));
            $formArray['t5a'] = $this->input->post('t5a');
            $formArray['t5b'] = $this->input->post('t5b');
            $formArray['t6'] = strtoupper($this->input->post('t6'));
            $formArray['t6a'] = $this->input->post('t6a');
            $formArray['t6b'] = $this->input->post('t6b');
            $formArray['hobbies'] = $this->input->post('hobbies');
            $formArray['timestamp']=date_format($d,'Y-m-d H:i:s.u');
            $interest_data = $this->input->post('interest');
            if(isset($interest_data))
            {
                $interest = implode(', ',$this->input->post('interest'));
            }
            else 
            {
                $interest = NULL;
            }
            // $year1 = idate('Y');
            // $year2 = idate('y')+1;

            $formArray['interest'] = $interest;
            $formArray['session'] = $sessionNss[0]['sessionYear'];
            $this->UsersData->registerUser($formArray);
            $this->session->set_flashdata('success_msg','registered');
            return redirect('/Users/login');
        }     
    }

    public function loginForm()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
            $loginUser = $this->UsersData->isvalidate($username, $password);//it return array object of the user
            // has reistration number -> login and generate pdf
            // registration is null -> pending for approval
            // registrtaion is negative -> application rejected
            // print_r($loginUser);
            // exit;
            if($loginUser->reg_no != NULL)
            {
                $this->session->set_userdata('loginUser',$loginUser);
                return redirect('/Users/generate_pdf');
            }
            else if($loginUser->reg_no == NULL){
                $this->session->set_flashdata('not_approve','notApproved');
                return redirect('/Users/login');
            }
            else {
            $this->session->set_flashdata('error_msg','error_msg');
            return redirect('/Users/login');
        }
    }


    public function login()
    {
        $this->load->view('Users/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('loginUser');
        return redirect('/Users/login');
    }

    public function close()
    {
        $this->load->view('Users/close');
    }

    public function generate_pdf()
    {
        if(!$this->session->userdata('loginUser'))// When unauthorized access of pdf form
        {
            return redirect('/Users/login');
        }
        else
        {
            $this->load->view('Users/generate_pdf');
            //$pd = $this->load->view("Users/genrate_pdf");   
        }
    }
}

    



