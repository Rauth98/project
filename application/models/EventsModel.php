<?php
class EventsModel extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('EventsModel');
		$this->load->database();
	}

        
          function get_AllCompletEvents($user_id){
        $query = $this->db->query("select * from information where user_id='$user_id' and flag=1");
        if($query->num_rows() > 0){
            header('Content-Type: application/json');
            echo json_encode($query->result()); 
        }else{
            echo "No records found";
        }
    }

	
       function get_CompletEvents_using_id($user_id,$id){
        $query = $this->db->query("SELECT * from information where id='$id' and user_id='$user_id' and flag=1");
        if($query->num_rows() > 0){
            header('Content-Type: application/json');
            echo json_encode($query->result()); 
        }else{
            echo "No records found";
        }
        
    }

  
    function get_Pdf_using_user_id($user_id){
        $query = $this->db->query("SELECT * FROM information WHERE user_id = '$user_id'");
        if($query->num_rows() > 0){
            header('Content-Type: application/json');
            echo json_encode($query->result()); 
        }else{
            echo "No records found";
        }
    }

}