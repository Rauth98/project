<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventsdata extends CI_Controller {

    function __construct()
	{
		parent:: __construct();
		$this->load->model('EventsModel');
	}

    public function AllCompletEvents($user_id)
	{
		$this->EventsModel->get_AllCompletEvents($user_id);
	}

    public function CompletEvents_using_id($user_id,$id)
	{
		$this->EventsModel->get_CompletEvents_using_id($user_id,$id);
	}	
	
}
