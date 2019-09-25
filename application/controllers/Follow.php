<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Follow extends CI_Controller {

	function __construct() {

        parent::__construct();
        $this->load->model('followModel');
        
    }

	public function following(){

        if($this->session->userdata('is_logged_in') == TRUE ){

        	$profileId = $this->input->post('profileId');
	        $logedUser = $this->input->post('logedUser');
             
	        $this->followModel->followingDB($profileId, $logedUser);
        }

        else
        {
           redirect(base_url());
        }
        


	}


	public function unfollow(){

        if($this->session->userdata('is_logged_in') == TRUE ){

        	$profileId = $this->input->post('profileId');
	        $logedUser = $this->input->post('logedUser');
             
	        $this->followModel->unfollowDB($profileId, $logedUser);
        }

        else
        {
           redirect(base_url());
        }
        


	}


    public function confirmRequest(){

        if($this->session->userdata('is_logged_in') == TRUE ){

            $profileId = $this->input->post('profileId');
            $logedUser = $this->input->post('logedUser');
             
            $this->followModel->confirmRequestDB($profileId, $logedUser);
        }

        else
        {
           redirect(base_url());
        }
        


    }

    public function find(){

        if($this->session->userdata('is_logged_in') == TRUE ){

            $keyword = $this->input->get('q');           
            $this->followModel->findDB($keyword);       
        }

        else
        {
           redirect(base_url());
        } 
    }

    public function getUsername(){

        if($this->session->userdata('is_logged_in') == TRUE ){

            $user_id = $this->input->post('user_id');           
            $this->followModel->getUsernameDB($user_id);       
        }

        else
        {
           redirect(base_url());
        } 
    }

    
}