<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Credits extends CI_Controller 

{	
	public function index()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{		

			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			$this->load->model('credits_model');		  
			$resultUC = $this->credits_model->ucdlist_model();
			$data['ucredits'] = $resultUC['ucredits'];
			$data['ucd_rows'] = $resultUC['ucd_rows'];
			
			
			$data['NApagetitle'] = 'My Credits';
			$this->load->model('credits_model');		  
			$resultCD = $this->credits_model->cdlist_model();
			$data['credits'] = $resultCD['credits'];
			$data['cd_rows'] = $resultCD['cd_rows'];
			$this->load->view('credits/index', $data);
		}
		else
		{		 
		  redirect(base_url().'users/index');
		}
	}
        
    
	
	 public function delete_invoice()
	{
		$id = $this->input->get('id');
        $this->db->where('inv_no' , $id);
		$this->db->where('payment_status' , 0);
	    $query = $this->db->delete('nana_invoice');
                
              if ($this->db->affected_rows() > 0)  {
			  
			  echo '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
		      Invoice has been deleted
		</div>';
			  
			  }else {
			  
			   echo '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
		Can not delete paid invoices
		</div>';
			  
			  }
                
			 
	}
	
		
	
	public function top_up(){
	
	if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
		$this->load->model('students_model');		  
		$result = $this->students_model->sutdent_profile();
		$data['userdatas'] = $result['userdatas'];
		$data['users'] = $result['users'];
		$data['NApagetitle'] = 'Top Up';
		$this->load->view('invoices/top_up', $data);
		
		}
	else
		{		 
		  redirect(base_url().'users/index');
		}
	
	
	
	
	
	}
	/// top up
	
	public function az_code_check(){
	 if($this->session->userdata('is_logged_in') == TRUE )
			{
		$azc = $this->input->post('a_code');
		
		$userId = $this->session->userdata('user_id');
		 if( $azc !=""){
			
			$this->db->select('*');
			$this->db->where('code', $azc);
			$this->db->where('status', 1);
            $query = $this->db->get("nana_live_codes");
			$row = $query->row();
			$num_row = $query->num_rows();
			
			$this->db->select('*');
			$this->db->where('code_id', $azc);
			$queryc = $this->db->get("nana_user_credit");
			$rowc = $queryc->row();
			$num_rowc = $queryc->num_rows();
			
				$exp_date = date('Y-m-d h:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+60,date('Y')));
				
				if($num_row == 1 && $num_rowc == 0)
				{
				
					$data = array (	
					
					'u_id' => $userId,
					'code_id' => $row->id,
					'code' => $row->code,		
					'credit' => $row->amount,	
					'reason' => 'Top Up credit AZC',
					'add_date' => date('Y-m-d H:i:s'),	
					'exp_date' => $exp_date,
					'type'=> 'AZC',
					'status' => 1
					);
					

					$query = $this->db->insert('nana_user_credit', $data);
					$data = array (	
					'status' => 3
					);
					$this->db->where('code', $azc);
					$queryup = $this->db->update("nana_live_codes", $data);
				
				//add credit to my credit table
				
							$this->db->select('*');
							$this->db->where('u_id', $userId);
							$querymc = $this->db->get("nana_my_credits");
							$rowmc = $querymc->row();
							$num_rowmc = $querymc->num_rows();
							
									if($num_rowmc > 0)
									{
									
											$data = array (	
											'credits' => ($rowmc->credits + $row->amount),
											'exp_date' => $exp_date,
											'last_update' => date('Y-m-d H:i:s')
											);
											$this->db->where('u_id', $userId);
											$queryup = $this->db->update("nana_my_credits", $data);
									
									}
									else {
									
											$data = array (	
											'u_id' => $userId,
											'credits' => $row->amount,
											'exp_date' => $exp_date,
											'last_update' => date('Y-m-d H:i:s')
											);
										
											$querymc = $this->db->insert("nana_my_credits", $data);
									
									
									}
							
							
				
								
								
					
				
				
					
					
					redirect(base_url().'message/topup_success');		
				}
				
				else {
				
				    $data['message'] ="Invalid authorize code !";
					$data['btn_name'] ="My Invoices";
					$data['url'] ="invoices";
					$data['NApagetitle'] = 'Errors';
					$this->load->view('messages/mesages_errors', $data);
				
				
				}
		 
		 
		 
		 }
		 
		 else {
		 
			$data['message'] ="Please enter authorize code !";
			$data['btn_name'] ="My Invoices";
			$data['url'] ="invoices";
			$data['NApagetitle'] = 'Errors';
			$this->load->view('messages/mesages_errors', $data);
		 
		 }
	 
		}
		
		else {
		
		
		 redirect(base_url().'users/index');
		
		}
	 
	
	 
	 }   
	
}

?>