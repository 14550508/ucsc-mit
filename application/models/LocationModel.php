<?php 
class LocationModel extends CI_Model {


	public function getCuntery(){

		$this->db->select('CONCAT(sortname, ", ", name) as text, id', FALSE);
		$this->db->like('name', $this->input->get('q'));
        $this->db->limit(10);			
		$query = $this->db->get('nana_countries');                        
        $query->result();               
               
        $rows = array();

        foreach ($query->result() as $cuntery) {
            $rows[] = $cuntery;
        }
        
        print json_encode($rows);  



	}


	public function getState(){

		$this->db->select('CONCAT(name) as text, id', FALSE);
		$this->db->like('name', $this->input->get('q'));
		if($this->input->get('countryId')) $this->db->where('country_id', $this->input->get('countryId'));
        $this->db->limit(10);			
		$query = $this->db->get('nana_states');                        
        $query->result();               
               
        $rows = array();

        foreach ($query->result() as $cuntery) {
            $rows[] = $cuntery;
        }
        
        print json_encode($rows);  



	}

	public function getTown(){

		$this->db->select('CONCAT(name) as text, id', FALSE);
		$this->db->like('name', $this->input->get('q'));
		if($this->input->get('stateId')) $this->db->where('state_id', $this->input->get('stateId'));
        $this->db->limit(10);			
		$query = $this->db->get('nana_cities');                        
        $query->result();               
               
        $rows = array();

        foreach ($query->result() as $town) {
            $rows[] = $town;
        }
        
        print json_encode($rows);  



	}



}