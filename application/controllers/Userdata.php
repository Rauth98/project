<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {

    function __construct()
	{
		parent:: __construct();
		$this->load->model('UserModel');
	}
	
    public function Login($email,$pass)
	{
		$this->UserModel->get_validation($email,$pass);
	}

    public function UserUsing_user_id($id)
	{
		$this->UserModel->get_User_using_user_id($id);
	}
	
	 public function register($username,$password,$phone)
	{
		$this->UserModel->insert($username,$password,$phone);
	}
	
	 public function SendMail($email)
	{
		$this->UserModel->sendMail($email);
	}
	
	
}
