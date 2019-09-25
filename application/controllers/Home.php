<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
	 
		$this->load->view('temp/head');
		$this->load->view('temp/nav-bar');
		$this->load->view('temp/home-top');
		$this->load->view('temp/services');
		$this->load->view('temp/user-sign-up-modal');
		$this->load->view('temp/login-modal');
		$this->load->view('temp/footer');
		$this->load->view('temp/homeJs');
		$this->load->view('ajax/signUpAjax');
		 
	}
}
