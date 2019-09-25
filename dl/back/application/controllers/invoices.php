<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoices extends CI_Controller 

{	
	public function index()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{		

			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			
			$this->load->model('invoices_model');		  
			$resultIN = $this->invoices_model->invs_model();
			$data['invoices'] = $resultIN['invoices'];
			$data['inv_rows'] = $resultIN['inv_rows'];
			$data['NApagetitle'] = 'My Invoices'; 
			$this->load->view('invoices/index', $data);
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
	
	public function pay_now()
	{
	  if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
		$this->load->model('students_model');		  
		$result = $this->students_model->sutdent_profile();
		$data['userdatas'] = $result['userdatas'];
		$data['users'] = $result['users'];
		
		$userId = $this->session->userdata('user_id');
		$inv_no = $this->input->post('inv_no');
		$tAmount = $this->input->post('tAmount');
		$exp_date = date('Y-m-d h:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+60,date('Y')));
			$this->db->select('*');
			$this->db->where('u_id', $userId);
			$querymc = $this->db->get("nana_my_credits");
			$rowmc = $querymc->row();
			$num_rowmc = $querymc->num_rows();
			
			if($num_rowmc > 0){
				if($tAmount <= $rowmc->credits){

						
								$this->db->select('*');
								$this->db->where('inv_no', $inv_no);
								$queryin = $this->db->get("nana_invoice");
								$rowin = $queryin->row();
								$num_rowin = $queryin->num_rows();

						
					if($num_rowin > 0) 
					{	
						foreach($queryin->result() as $rowinv)
						{
										//add enroll quizzes	
									
										$this->db->select('*');
										$this->db->where('qz_id', $rowinv->qz_id);
										$queryqz= $this->db->get("nana_quiz");
										$rowqz = $queryqz->row();
									
										
								
												$data = array (	
												'qz_id' => $rowinv->qz_id,
												'u_id' => $userId,
												'enroll_date' => date('Y-m-d H:i:s'),
												'end_date' => $exp_date,		
												'attempts' => 0,	
												'status'=> 1
												
												);
												
												$queryp = $this->db->insert('quiz_enroll', $data);
										$data = array (	
											'payment_type' => 'TCD',
											'payment_status' => 1
											);
										$this->db->where('inv_no', $rowinv->inv_no);
										$queryup = $this->db->update("nana_invoice", $data);	
						}
									
									//update or insert my credits
									
									
									
									
							if($num_rowmc > 0)
							{
									
									$data = array (	
											'credits' => ($rowmc->credits - $tAmount),
											'last_update' => date('Y-m-d H:i:s')
											);
										$this->db->where('u_id', $userId);
										$queryup = $this->db->update("nana_my_credits", $data);
									
							}
							else 
							{
									
									$data = array (	
											'u_id' => $userId,
											'credits' => (-$tAmount),
											'last_update' => date('Y-m-d H:i:s')
											);
										
										$querymc = $this->db->insert("nana_my_credits", $data);
									
									
							}
							
							$data = array (	
							
							'u_id' => $userId,
							'inv_id' => $inv_no,
							'amount' => $tAmount,		
							'date' => date('Y-m-d H:i:s'),	
							'type'=> 'TCD'
							
							);
							
							$queryp = $this->db->insert('nana_payment', $data);
									
									
					}
								
								
								
								
						
						redirect(base_url().'message/payment_success');
								
								
				}
				else 
				{
							
					$data['message'] =" your credit is not enough for pay this invoice";
					$data['btn_name'] ="Top Up Credits";
					$data['url'] ="invoices/top_up";
					$data['NApagetitle'] = 'Error message'; 
					$this->load->view('messages/mesages_errors', $data);
							
							
				}
			}
			
		else 
				{
							
					$data['message'] =" your credit is not enough for pay this invoice";
					$data['btn_name'] ="Top Up Credits";
					$data['url'] ="invoices/top_up";
					$data['NApagetitle'] = 'Error message'; 
					$this->load->view('messages/mesages_errors', $data);
							
							
				}
				
	    }else
		{		 
		  redirect(base_url().'users/index');
		}
	}
	
	
	public function top_up(){
	
	if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
		$this->load->model('students_model');		  
		$result = $this->students_model->sutdent_profile();
		$data['userdatas'] = $result['userdatas'];
		$data['users'] = $result['users'];
		$data['NApagetitle'] = 'Top Up Credits'; 
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
			
				$exp_date = date('Y-m-d h:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+30,date('Y')));
				
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
					$data['btn_name'] ="Try Again";
					$data['url'] ="invoices/top_up";
					$data['NApagetitle'] = 'Error message'; 
					$this->load->view('messages/mesages_errors', $data);
				
				
				}
		 
		 
		 
		 }
		 
		 else {
		 
			$data['message'] ="Please enter authorize code !";
			$data['btn_name'] ="My Invoices";
			$data['url'] ="invoices";
			$data['NApagetitle'] = 'Error message'; 
			$this->load->view('messages/mesages_errors', $data);
		 
		 }
	 
		}
		
		else {
		
		
		 redirect(base_url().'users/index');
		
		}
	 
	
	 
	 }   
	
}

?>