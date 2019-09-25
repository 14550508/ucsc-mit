<?php 
class UserProfileModel extends CI_Model {


	public function getRank($username){

		 $this->db->WHERE('username', $username);
                 $queryUser = $this->db->get('nana_users');
                 $userRow = $queryUser->row();
                 $user_id = $userRow->u_id;
                 
                 
                 $this->db->select('points, s1.u_id, (SELECT COUNT(*) FROM nana_points AS s2 WHERE s2.points > s1.points ) +1 AS `rank`' , FALSE);
		 $this->db->WHERE('u_id',  $user_id);
		 $query = $this->db->get('nana_points s1');         
                 $row = $query->row();

                 if($query->num_rows() > 0){

                         $res['rank'] = $row->rank;
                         $res['points'] = $row->points;
                 }
                 else{

                    $res['rank'] = 'NA';
                    $res['points'] = 0;    
                 }

                        $this->db->SELECT('qz_id', 'u_id');
                        $this->db->WHERE('u_id', $user_id);
                        $this->db->group_by('qz_id');
                        $query1 = $this->db->get('nana_user_answers');

                        $this->db->WHERE('follow_profile_id', $user_id);
                        $this->db->WHERE('follow_status', 1);
                        $query2 = $this->db->get('nana_followers');
                        
                        
                        $res['Tquiz'] = $query1->num_rows();
                        $res['Tfollowers'] = $query2->num_rows();

                        return $res;


	}

	

	


}