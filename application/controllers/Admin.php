<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends Admin_controller
{
    public function index()
    {
        $this->load->view('Admin/index');
    }

    public function login()
	{

		$this->logged_in();

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
			   $email_exists = $this->AdminData->check_email($this->input->post('email'));
           	if($email_exists == 1) {
           		$login = $this->AdminData->login($this->input->post('email'), $this->input->post('password'));
                if($login) {

           			$logged_in_sess = array(
           				'id' => $login['sno'],
				        'username'  => $login['name'],
				        'email'     => $login['email'],
				        'logged_in' => TRUE
					);
					
					$this->session->set_userdata($logged_in_sess);
           			redirect('Dashboard/index', 'refresh');
           		}
           		else {
           			$this->data['errors'] = 'Incorrect email/password combination';
           			$this->load->view('Admin/index', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = 'Email does not exists';

           		$this->load->view('Admin/index', $this->data);
           	}	
        }
        else {
            // false case
            $this->load->view('Admin/index');
        }	
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/index', 'refresh');
	}

}