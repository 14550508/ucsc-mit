<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organic extends CI_Controller 

{

	
	public function index()
	{
	
	if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{		
			
			
			$this->load->model('practicals_model');		  
            $result = $this->practicals_model->soql();
            
             $data['oqlist'] = $result['oqlist'];
             $data['num_quiz'] = $result['num_quiz'];
			 
			 $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
                          $data['NApagetitle'] = 'Organic Transformation';
            $this->load->view('practicals/alchemistry/organic/index', $data);
		}
		else
		{		 
		  redirect(base_url().'users/index');
		}
            
	}
        
        
        public function phypracticals()
	{
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			 $data['NApagetitle'] = 'Physics Practicals';
			$this->load->view('practicals/alphysics/prismangle/selectprism', $data);
           
	}
        
        public function chepracticals()
		
	{
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			 $data['NApagetitle'] = 'Chemistry Practicals';
            $this->load->view('practicals/alchemistry/index', $data);
	}
        
         public function prismangle()
	{
            $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			 $data['NApagetitle'] = 'Physics Practicals';
			$this->load->view('practicals/alphysics/prismangle/index', $data);
	}
        
        public function selectprismangle()
	{
            $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			 $data['NApagetitle'] = 'Physics Practicals';
			$this->load->view('practicals/alphysics/prismangle/selectprism', $data);
	}
        
        public function findprismangle()
	{
            
             $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			 $data['NApagetitle'] = 'Physics Practicals';
            $this->load->view('practicals/alphysics/prismangle/findprismangle', $data);
	}
        
         public function organicselectquiz()
	{
          
            $this->load->model('practicals_model');		  
            $result = $this->practicals_model->soql();
            
             $data['oqlist'] = $result['oqlist'];
             $data['num_quiz'] = $result['num_quiz'];
			 
			 $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
                           $data['NApagetitle'] = 'Organic Select Question';
            $this->load->view('practicals/alchemistry/organic/index', $data);
	}
        
      public function organicquiz()
	{
          $oqid = $this->input->post('organicquizid');
          $user_idd = $this->session->userdata('user_id');
          
          $this->load->library('session');
          $newdata = array(
                   'userid'  =>  $user_idd,
                   'q_id' => $oqid,
                  'logged_in' => TRUE
               );

            $this->session->set_userdata($newdata);
            $user_id = $this->session->userdata('userid');
            $this->load->model('practicals_model');		  
            $result1 = $this->practicals_model->oqal($oqid, $user_id);
            
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
            
             $data['oqalist'] = $result1['oqalist'];
             $data['num_ans'] = $result1['num_ans'];
             $data['oqqlist'] = $result1['oqqlist'];
             $data['num_quz'] = $result1['num_quz'];
             
             $data['ansgrplist'] = $result1['ans_grp'];
             $data['num_ansg'] = $result1['num_ansg'];
           $data['NApagetitle'] = 'Organic Question';
            $this->load->view('practicals/alchemistry/organic/organicquiz', $data);
	}
        
        public function updateGroups()
	 {
            $group_id = $this->input->get('g_id');
            $this->load->model('practicals_model');		  
            $result = $this->practicals_model->updateGroups($group_id, $oqid);
            
         }
       
        public function addAnswers()                
           {            
             $m_id = $this->input->post('m_id');                    
             $g_id = $this->input->post('g_id');
              $oqid = $this->session->userdata('q_id');
                    
            $this->load->model('practicals_model');		  
            $result = $this->practicals_model->addAnswers($m_id, $g_id, $oqid);      
            
           }
           
            public function removeAnswers()                
           {            
             $m_id = $this->input->post('m_id');                    
           
             $oqid = $this->session->userdata('q_id');
                    
            $this->load->model('practicals_model');		  
            $result = $this->practicals_model->removeAnswers($m_id, $oqid);      
            
           }
           
            public function checkAnswers()                
           {  
               $oqid = $this->session->userdata('q_id');  
               $user_id = $this->session->userdata('userid');
              $this->load->model('practicals_model');		  
            $result1 = $this->practicals_model->oqal($oqid, $user_id);
            
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
            
             $data['oqalist'] = $result1['oqalist'];
             $data['num_ans'] = $result1['num_ans'];
             $data['oqqlist'] = $result1['oqqlist'];
             $data['num_quz'] = $result1['num_quz'];
             
             $data['ansgrplist'] = $result1['ans_grp'];
             $data['num_ansg'] = $result1['num_ansg'];
                 $data['NApagetitle'] = 'Organic Check answers';
                $this->load->view('practicals/alchemistry/organic/check_answers', $data);
           }
        
           public function restAnswers() {
             
               $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			   
			   $oqid = $this->session->userdata('q_id');  
               $user_id = $this->session->userdata('userid');
               $this->load->model('practicals_model');		  
               $result1 = $this->practicals_model->restAnswers($oqid, $user_id);  
               
             $data['oqalist'] = $result1['oqalist'];
             $data['num_ans'] = $result1['num_ans'];
             $data['oqqlist'] = $result1['oqqlist'];
             $data['num_quz'] = $result1['num_quz'];
             
             $data['ansgrplist'] = $result1['ans_grp'];
             $data['num_ansg'] = $result1['num_ansg'];
           $data['NApagetitle'] = 'Organic Reset quiz';
            $this->load->view('practicals/alchemistry/organic/organicquiz', $data);
               
           }
		   
		     public function electronics()
	{
             $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			 $data['NApagetitle'] = 'practicals Electronics';			
			 $this->load->view('practicals/alphysics/electronics/index', $data);
	}
	
	 public function vistonquiz()
	{
             $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			$data['NApagetitle'] = 'practicals viston';			
			 $this->load->view('practicals/alphysics/electronics/vistonquiz', $data);
	}
}

?>