<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfdata extends CI_Controller {

    function __construct()

	{
		parent:: __construct();
		$this->load->model('PdfModel');
	}

    public function AllPdfData()

	{
		$this->PdfModel->get_AllPdfData();
	}

    public function PdfUsing_Id($user_id,$id)
	
	{
		$this->PdfModel->get_Pdf_using_id($user_id,$id);
	}

    public function PdfUsing_user_id($id)
	
	{
		$this->PdfModel->get_Pdf_using_user_id($id);
	}
	
	
}
