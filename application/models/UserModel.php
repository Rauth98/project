<?php
class UserModel extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('UserModel');
		$this->load->database();
	}

        
        function get_validation($email,$pass){
        $query = $this->db->query("select * from user where email='$email' and password='$pass'");
        if($query->num_rows() > 0){
            header('Content-Type: application/json');
            echo json_encode($query->result()); 
        }else{
            echo "No records found";
        }
    }

	
  
    function get_User_using_user_id($user_id){
        $query = $this->db->query("SELECT * FROM user WHERE user_id = '$user_id'");
        if($query->num_rows() > 0){
            header('Content-Type: application/json');
            echo json_encode($query->result()); 
        }else{
            echo "No records found";
        }
    }
    
    
    function insert($email,$password,$phone){
        $data = array(
        'email' => $email,
        'password' => sha1($password),
        'mobile' => $phone
        );

       $query= $this->db->insert('user', $data);
       
       if($query)
		{
			$response=array(
				'status' => true,
				'status_message' =>' Registration Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => false,
				'status_message' =>'Registration Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
        
    }
    

function sendMail($email)
{
    $this->load->helper('string');
    $otp=random_string('alnum',5);
    
    $config = Array(
  'protocol' => 'mail',
  'smtp_host' => 'ssl://smtp.gmail.com',
  'smtp_port' => 587,
  'smtp_user' => 'drogenidesoftwares@gmail.com', // change it to yours
  'smtp_pass' => 'Drogen@143', // change it to yours
  'mailtype' => 'html',
  'charset' => 'utf-8',
  'wordwrap' => TRUE
);

        $message = 'Thanks for Registering with us !'. ' Your One time Password is  ' .$otp . 'Enter This Code In App';
        $this->load->library('email', $config);
      $this->email->set_newline('\r\n');
      $this->email->from('jadhavshripal510@gmail.com'); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject('Otp From Cue');
      $this->email->message($message);
      if($this->email->send())
     {
      	$response=array(
				'status' => true,
				'status_message' =>' Email Sent.',
				'otp'=> $otp
			);
     }
     else
    {
     show_error($this->email->print_debugger());
     
     $response=array(
				'status' => 'false',
				'status_message' =>' ($this->email->print_debugger()).',
				'otp'=> $otp
			);
    }
    
    header('Content-Type: application/json');
		echo json_encode($response);

}

}
