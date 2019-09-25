<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller 

{	

	public function index()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
			{
		   $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			$this->load->model('cart_model');		  
			$resultCt = $this->cart_model->myCart();
			$data['addItems'] = $resultCt['addItems'];
			$data['cart_rows'] = $resultCt['cart_rows'];
			$data['NApagetitle'] = 'My Cart';
			$this->load->view('cart/index', $data);
			
			
			}
		
		else {
		
			redirect(base_url().'users/index');
			}
			
			
	 
	}
	public function addItems()
	{
           
		if($this->session->userdata('is_logged_in') == TRUE )
			{
		  $this->load->model('cart_model');		  
			$resultCt = $this->cart_model->addItems();
			
			
			
			}
			
		
	}
	
	
        
    public function quiz_list()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
			{
			$qz_cat_id = $this->input->post('qz_cat_id');
			if($qz_cat_id !="")
			{
				
				$this->load->model('students_model');		  
				$result = $this->students_model->sutdent_profile();
				$data['userdatas'] = $result['userdatas'];
				$data['users'] = $result['users'];
				
				$this->load->model('quiz_model');		  
				$resultQL = $this->quiz_model->quiz_list($qz_cat_id);
				$data['quiz_lists'] = $resultQL['quiz_lists'];
				$data['NApagetitle'] = 'Quiz List';
				$this->load->view('quiz/quiz_list', $data);
			}
			
			else 
			{
			
			   redirect(base_url().'quiz/index');
			}
		}
		else {
		
			redirect(base_url().'users/index');
			}
	}
	
	
	public function quiz_detail()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
			{
			$qz_id = $this->input->post('qz_id');
			if($qz_id !=""){
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			$this->load->model('quiz_model');		  
			$resultQD = $this->quiz_model->quiz_detail($qz_id);
			$data['quiz_details'] = $resultQD['quiz_details'];
			$data['NApagetitle'] = 'Quiz Details';
			$this->load->view('quiz/quiz_detail', $data);
			}
			else {
			
			redirect(base_url().'quiz/index');
			
			}
			}
			else {
		
			redirect(base_url().'users/index');
			}
			
	}
        
    public function defquiz()
	{
            $data['NApagetitle'] = 'Defualt Quiz';
            $this->load->view('quiz/defquiz');
	}
        
    public function selsctQuiz()
	{
            $this->load->view('practicals/alchemistry/organic/index');
	}
        
     public function delete_item()
	{
		$id = $this->input->get('id');
                $this->db->where('ct_id' , $id);
	        $this->db->delete('nana_scart');
                
                
                
			 
	}

		
	
	 public function select_payment()
	{
		
		$c_code = $this->input->post('c_code');
		
		if($this->session->userdata('is_logged_in') == TRUE )
			{
		   $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			$this->load->model('cart_model');		  
			$resultCt = $this->cart_model->myCart();
			$data['addItems'] = $resultCt['addItems'];
			$data['cart_rows'] = $resultCt['cart_rows'];
			
				if($resultCt['cart_rows'] > 0){
					if($c_code !=''){
			
						$this->load->model('cart_model');		  
						$resultCC = $this->cart_model->check_cupon_code($c_code);
						$data['c_codes'] = $resultCC['c_codes'];
						$data['c_num_rows'] = $resultCC['c_num_rows'];
						
						}
					else {
					 $data['c_num_rows'] =0;
					
					}
			
			
			$data['NApagetitle'] = 'Payment Type';
					$this->load->view('cart/select_payment', $data);
				}
				else {
				
					redirect(base_url().'cart/index');
				}
			
			}
			
			
			
			
			
		
		else {
		
			redirect(base_url().'users/index');
			}
			
                
                
                
			 
	}
	
	
		 public function do_pyament_prossece()
	{
		
		
		
		if($this->session->userdata('is_logged_in') == TRUE )
			{
			$p_type = $this->input->post('p_type');
			$invoice_no = $this->input->post('invi_no');
			
				
				
				if($p_type !=""){
				
					$userId = $this->session->userdata('user_id');
					
					$this->load->model('students_model');		  
					$result = $this->students_model->sutdent_profile();
					$data['userdatas'] = $result['userdatas'];
					$data['users'] = $result['users'];
					 
					$this->load->model('cart_model');		  
					$resultCI = $this->cart_model->add_invoice($p_type, $userId, $invoice_no);
					
					$data['invoices'] = $resultCI['invoices'];
					$data['in_num_rows'] = $resultCI['in_num_rows'];
					$data['inv_sum'] = $resultCI['inv_sum'];
				
					if($resultCI['inv_sum'] == 0){
					
					
					
					$this->db->select('*');
								$this->db->where('inv_no', $invoice_no);
								$queryin = $this->db->get("nana_invoice");
								$rowin = $queryin->row();
								$num_rowin = $queryin->num_rows();

						
					if($num_rowin > 0) 
					{	
					$exp_date = date('Y-m-d h:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+30,date('Y')));
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
											'payment_type' => 'FREE',
											'payment_status' => 1
											);
										$this->db->where('inv_no', $invoice_no);
										$queryup = $this->db->update("nana_invoice", $data);	
						}
						
							redirect(base_url().'enroll/index');
						
						
					 }
					 
					 
					}
					else 
					{
						if($p_type == "AZC"){
						$data['NApagetitle'] = 'Payment';
						$this->load->view('cart/az_code_pyament', $data);
						
						}
						else {
						
											
						redirect(base_url().'invoices/index');
						
						
						}
				
					
				
					}
				
				}
				else {
				
				redirect(base_url().'cart/index');
				
				}
				
			}
			
			
		
		else {
		
			redirect(base_url().'users/index');
			}
			
                
                
                
			 
	}
	public function check_code()
	{
		$code = $this->input->get('code');
		$t_date = date('Y-m-d');
		
			$this->db->select('*');
             $this->db->where('cc_code' , $code);
	        $this->db->where('s_date <=', $t_date);
			$this->db->where('e_date >=', $t_date);
			$this->db->where('status', 1);
		    $query = $this->db->get("nana_cupon_code");        
			
			$res = $query->num_rows();
			if(	$res > 0){
			
			echo '<strong class="badge badge-sm label-success">Valid coupon code</strong>';
			
			}
			
			elseif($code ==''){
			
			
			}
			else {
			
			echo '<strong class="badge badge-sm label-danger">Invalid coupon code</strong>';
			}
                
                
                
			 
	}
	
     public function az_code_check(){
	 if($this->session->userdata('is_logged_in') == TRUE )
			{
		$azc = $this->input->post('a_code');
		$inv_no = $this->input->post('inv_no');
		$tAmount = $this->input->post('tAmount');
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
							
							
				
								
								
				//insert payment
				
				
				
				
					if($tAmount <=  $row->amount) 
					{
						   $data = array (	
							
							'u_id' => $userId,
							'inv_id' => $inv_no,
							'amount' => $tAmount,		
							'date' => date('Y-m-d H:i:s'),	
							'type'=> 'AZC'
							
							);
							
							$queryp = $this->db->insert('nana_payment', $data);
						
			
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
										'attempts' => $rowqz->attempts_allowed,	
										'status'=> 1
										
										);
										
										$queryp = $this->db->insert('quiz_enroll', $data);
								$data = array (	
									'payment_type' => 'AZC',
									'payment_status' => 1
									);
								$this->db->where('inv_no', $rowinv->inv_no);
								$queryup = $this->db->update("nana_invoice", $data);	
							}
							
							//update or insert my credits
							
							
							
							
							if($num_rowmc > 0){
							
							$data = array (	
									'credits' => ($rowmc->credits - $tAmount),
									'last_update' => date('Y-m-d H:i:s')
									);
								$this->db->where('u_id', $userId);
								$queryup = $this->db->update("nana_my_credits", $data);
							
							}else {
							
							$data = array (	
									'u_id' => $userId,
									'credits' => (-$tAmount),
									'last_update' => date('Y-m-d H:i:s')
									);
								
								$querymc = $this->db->insert("nana_my_credits", $data);
							
							
							}
						}
							
					}
					redirect(base_url().'message/payment_success');
				}
				
				else {
				
				    $data['message'] ="Invalid authorize code !";
					$data['btn_name'] ="My Invoices";
					$data['url'] ="invoices";
					$data['NApagetitle'] = 'Error';
					$this->load->view('messages/mesages_errors', $data);
				
				
				}
		 
		 
		 
		 }
		 
		 else {
		 
			$data['message'] ="Please enter authorize code !";
			$data['btn_name'] ="My Invoices";
			$data['url'] ="invoices";
			$data['NApagetitle'] = 'Error';
			$this->load->view('messages/mesages_errors', $data);
		 
		 }
	 
		}
		
		else {
		
		
		 redirect(base_url().'users/index');
		
		}
	 
	
	 
	 }   
        
}

?>