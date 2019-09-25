<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

   public function country(){

        $this->load->model('locationModel');
        $this->locationModel->getCuntery();

   }

   public function state(){

        $this->load->model('locationModel');
        $this->locationModel->getState();

   }


   public function town(){

        $this->load->model('locationModel');
        $this->locationModel->getTown();

   }

}


?>