<?php
//////////////////////////////////
/////// chamara@skynet.lk ///////
///////////////////////////////



class Cart_model extends CI_Model{
    
    public function addItems(){
        
        $userId = $this->session->userdata('user_id');
		
		$todate = date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->where('u_id', $userId);
		$this->db->where('end_date  >=', $userId);
		$this->db->where('qz_id', $this->input->post('qz_id'));
        $query2 = $this->db->get("quiz_enroll");  
		$num_enrolls = $query2->num_rows();
		if($num_enrolls > 0){
		
			redirect(base_url().'message/allReadyEnroll');
		
		}
		else{
		
		if($this->input->post('qz_id') !="" && $this->input->post('qty') !="" ){
		
			$this->db->select('*');
			$this->db->where('qz_id', $this->input->post('qz_id'));
		    $queryqz = $this->db->get("nana_quiz");        
			$rowqz= $queryqz->row();
			
        $data = array(
           
            'u_id' => $userId,
			'qz_id' => $this->input->post('qz_id'),
            'qty' => $this->input->post('qty'),
            'unit_price' => $rowqz->qz_price,
			'total_amount' => $rowqz->qz_price * $this->input->post('qty'),
			'add_date' => date('Y-m-d H:i:s')
        );
       
        
        $query = $this->db->insert('nana_scart',$data);
		
		redirect(base_url().'cart/index');	   
	 }
       
     }    
       
    }
	
	public function myCart(){
	
	
			$userId = $this->session->userdata('user_id');
			$this->db->select('nana_quiz.qz_name, nana_quiz.qz_information, nana_scart.ct_id, nana_scart.unit_price, nana_scart.qty, nana_scart.add_date, nana_scart.total_amount');
			$this->db->join('nana_quiz', 'nana_scart.qz_id = nana_quiz.qz_id');
		    $this->db->where('u_id', $userId);
		    $query = $this->db->get("nana_scart");        
			$res['addItems'] = $query->result();
			$res['cart_rows'] = $query->num_rows();
			return $res;
	
	}
	
	
	public function check_cupon_code($c_code){
	
			$t_date = date('Y-m-d');
			$userId = $this->session->userdata('user_id');
			$this->db->select('*');
			$this->db->where('cc_code', $c_code);
			$this->db->where('s_date <=', $t_date);
			$this->db->where('e_date >=', $t_date);
			$this->db->where('status', 1);
		    $query = $this->db->get("nana_cupon_code");        
			$res['c_codes'] = $query->result();
			$res['c_num_rows'] = $query->num_rows();
			return $res;
	
	}
    
    public function add_invoice($p_type, $userId, $invoice_no){
        
			
			$this->db->select('*');
			
		    $this->db->where('u_id', $userId);
		    $query = $this->db->get("nana_scart");        
			$query->result();
			
			// Insert invoice data
			/////////////////////////////
			foreach ($query->result() as $row){
			
				$data = array(
				'inv_no' => $invoice_no,
				'u_id' => $userId,
				'qz_id' => $row->qz_id,
				'qty' => $row->qty,
				'unit_price' => $row->unit_price,
				'sub_total' => $row->unit_price*$row->qty,
				'discount' => $this->input->post('discount'),
				'final_total' => (($row->unit_price*$row->qty) * (100- $this->input->post('discount')))/100,
				'payment_type' => $p_type,
				'payment_status' => 0,
				'inv_date' => date('Y-m-d H:i:s')
				);
				
				$query = $this->db->insert('nana_invoice',$data);
			/////////////////////////////	
			
			// delete cart data
			/////////////////	
                $this->db->where('ct_id' , $row->ct_id);
				$this->db->delete('nana_scart');
				
            ///////////////////////////    
			
			}
			
			
				$this->db->select('*');
				$this->db->where('inv_no', $invoice_no);
				$query = $this->db->get("nana_invoice"); 			
				$res['invoices'] = $query->result();
				$res['in_num_rows'] = $query->num_rows();
				
				$this->db->select_sum('final_total', 'inv_sum');
				$this->db->where('inv_no', $invoice_no);
				$queryin = $this->db->get("nana_invoice"); 			
				$row_in = $queryin->row();
				
				$res['inv_sum'] = $row_in->inv_sum;
				
			
            // check payment type
			
			return $res;
			
        
    } 
    
    
    
}

