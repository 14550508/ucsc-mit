<?php 
class PostModel extends CI_Model {

	public function insertPostData(){

      $uploadfile     = $this->input->post('uploadfile');
      $postText       = $this->input->post('postText');
      $profileUserId  = $this->input->post('profileUserId');
      $quizCatList    = $this->input->post('quizCatList');

       if($postText =="" )
       {
          $data = array
          (				
          	'status' => 0,
          	'msg'    => 'Please write your question'
          );
       }
      else
      {
             if($uploadfile !="" )
             {
             	  $insert_data = array
                (
                'post_user_id'    => $this->session->userdata('user_id'), 
                'post_text'       => $postText,
                'post_image'      => $uploadfile,
                'post_profile_id' => $profileUserId,
                'post_status'     => 1
                );

                $inqu =  $this->db->insert('nana_post', $insert_data);
                $postId = $this->db->insert_id();
                if($inqu)
                {
      	         $data = array
      	         (				
                  	'status'  => 1,
                  	'msg'     => 'Post has been added successfully!'
                  );			   
      			    } 

             }

             else 
             {              
              $insert_data = array
                (
                  'post_user_id'    => $this->session->userdata('user_id'), 
                  'post_text'       => $postText,
                  'post_profile_id' => $profileUserId,
                  'post_status'     => 1
                );
                $this->db->insert('nana_post', $insert_data);

                $postId = $this->db->insert_id();
                $data = array
                (				
                	'status' => 1,
                	'msg'    => 'Post has been added successfully!'
      				  );			   
             }

        $postedById = $this->session->userdata('user_id');
        $postedBy   = $this->session->userdata('fname').' '.$this->session->userdata('lname');
        
        
        $this->db->SELECT('createBy');
        $this->db->WHERE('createBy !=', $postedById);
        $this->db->WHERE('createBy !=', 0);
        if($quizCatList) $this->db->WHERE('qu_cat_id', $quizCatList);
        $this->db->order_by('rand()');
        $this->db->group_by('createBy');
        $this->db->LIMIT('50');             
        $quizQuery = $this->db->get('nana_quiz');

            if($quizQuery->num_rows() > 0)
            {
              foreach ($quizQuery->result() as $notifrow )
              {
                $insert_wall_data = array
                    (
                      'wall_post_id'         => $postId, 
                      'wall_post_view_uid'   => $notifrow->createBy,
                      'wall_post_type'       => 'userpost',            
                    );

                $insertWall =  $this->db->insert('nana_wall', $insert_wall_data);

                $insertnotif_data = array
                    (
                      'notifi_link'    => 'notification/userpost/?postId='.$postId.'postedBy='.$postedById, 
                      'notifi_users'   =>  $notifrow->createBy,
                      'notifi_mess'    =>  $postedBy.' need a help ',
                      'notifi_status'  => 1,
                    );
                      
                $insertnotif =  $this->db->insert('nana_notification', $insertnotif_data);                  
              }

             }      

       }
        
        $this->db->select('*');
        $this->db->join('nana_users' , 'nana_post.post_user_id = nana_users.u_id');
        $this->db->join(' nana_userdata' , 'nana_post.post_user_id =  nana_userdata.ud_id');
        $this->db->where('nana_post.post_user_id', $this->session->userdata('user_id'));
        $this->db->where('nana_post.post_status', 1);
        $this->db->order_by('nana_post.post_date', 'DESC');
        $query = $this->db->get('nana_post');

          foreach ($query->result() as $row) 
          {
             $data[] = $row;
          }

        echo   json_encode($data);
	}

  public function totlaPostDataBD()
    {  
        $this->db->select('*');
        $this->db->where('post_user_id', $this->session->userdata('user_id'));
        $this->db->where('nana_post.post_status', 1); 
        $queryRows = $this->db->get('nana_post');
        $num_rows = $queryRows->num_rows();
        $data['totlaRow'] =  $num_rows;

        echo  json_encode($num_rows);

  }

  public function getPostDataBD()
  {
       
        $pageNumr = $this->input->post('pageNumr');
        $profileUserId = $this->input->post('profileUserId');
        $pageSize = 8;

        if($pageNumr <= 0) 
        {            
          $pageNumrfinale = 1;
        }
        else
        {
          $pageNumrfinale = $pageNumr;
        }

        $this->db->select('*');
        $this->db->where('post_user_id', $profileUserId);
        $this->db->where('nana_post.post_status', 1); 
        $queryRows = $this->db->get('nana_post');
        $num_rows = $queryRows->num_rows();
        $numPagers = $num_rows/ $pageSize;
        $start =  ($pageNumrfinale * $pageSize) - $pageSize;
 

   
        $this->db->select('*');
        $this->db->join('nana_users' , 'nana_post.post_user_id = nana_users.u_id');
        $this->db->join(' nana_userdata' , 'nana_post.post_user_id =  nana_userdata.ud_id');
        $this->db->where('post_user_id', $profileUserId);
        $this->db->where('nana_post.post_status', 1);
        $this->db->limit($pageSize, $start);
        $this->db->order_by('nana_post.post_date', 'DESC');       
        $query = $this->db->get('nana_post');
       
       $num_rows = $query->num_rows();
       
        if($num_rows > 0){

           foreach ($query->result() as $row) { 
            $data[] =  $row;  
            }


        }
        else {

           $data = 0;
        }       
     
          echo   json_encode($data);

  }

     public function getCommentsDataBD($post_id, $limit)
    {
        $this->db->select('*');
        $this->db->join('nana_users' , 'nana_post_reply.commentBy = nana_users.u_id');
        $this->db->join('nana_userdata' , 'nana_post_reply.commentBy =  nana_userdata.ud_id');
        $this->db->where('nana_post_reply.postId', $post_id);
        $this->db->limit($limit);
        $this->db->order_by('nana_post_reply.commentDate', 'ASE');       
        $query = $this->db->get('nana_post_reply');
        $this->db->where('nana_post_reply.postId', $post_id);
        $queryTotal = $this->db->get('nana_post_reply');

        $data['totlaComments'] = $queryTotal->num_rows();
       if($query->num_rows() > 0 ){
          foreach ($query->result() as $row) {
               
                $data[] = $row;                 
            }
        
          echo   json_encode($data);
       }
       else
       {

          $data[] = "";
                 echo   json_encode($data);
       }        
     

    }


      public function addCommentsDB()
    {
       
        $postComments = rtrim($this->input->post('postComments'));
        $postId = $this->input->post('postId');

        $checkComment = trim($postComments);

        if($checkComment !=""){

           $insertComment = array(
              'postId' => $postId, 
              'comment' => $postComments, 
              'commentBy' =>  $this->session->userdata('user_id'), 
              'postReplyStatus' =>  1 );

               $query = $this->db->insert('nana_post_reply',  $insertComment);

            if($query){

                $postedById = $this->session->userdata('user_id');
                $postedBy   = $this->session->userdata('fname').' '.$this->session->userdata('lname');

                $this->db->SELECT('post_profile_id');
                $this->db->WHERE('post_id', $postId);
                $postquery = $this->db->get('nana_post');

                $postRow = $postquery->row();

                  if($postquery->num_rows() == 1){

                        $insertnotif_data_comments_owner = array
                        (
                          'notifi_link'    => 'notification/postcomments/?postId='.$postId.'postedBy='.$postedById, 
                          'notifi_users'   =>  $postRow->post_profile_id,
                          'notifi_mess'    =>  $postedBy.' commented on your post',
                          'notifi_status'  => 1,
                        );                        
                        $insertnotifcommOwner =  $this->db->insert('nana_notification', $insertnotif_data_comments_owner);
                  }

               

                //comment notificaion
                $this->db->SELECT('commentBy');
                $this->db->WHERE('commentBy !=', $postedById);
                $this->db->WHERE('postId', $postId);
                $this->db->order_by('rand()');
                $this->db->group_by('commentBy');
                $postCommQuery = $this->db->get('nana_post_reply');

                if($postCommQuery->num_rows() > 0)
                {
                    foreach ($postCommQuery->result() as $notifrow )
                    {
                          $insertnotif_data_all_commenters = array
                          (
                            'notifi_link'    => 'notification/postcomments/?postId='.$postId.'postedBy='.$postedById, 
                            'notifi_users'   =>  $notifrow->commentBy,
                            'notifi_mess'    =>  $postedBy.'commented on your commented post',
                            'notifi_status'  => 1,
                          );
                            
                          $insertnotif =  $this->db->insert('nana_notification', $insertnotif_data_all_commenters);                  
                    }

                 }      



                $data = array('status' => 1, ); 
            }

            else
            {
               $data = array('status' => 0, );
            }

            echo  json_encode($data);

        }

      
    }

     public function deletePostDB()
    {
        $post_id = $this->input->post("post_id");

        $this->db->where('postId ', $post_id);
        $this->db->delete('nana_post_reply');

        $this->db->where('post_id', $post_id);
        $this->db->delete('nana_post_hide');

        $this->db->where('post_id', $post_id);
        $this->db->delete('nana_post');

        $this->db->where('wall_post_id', $post_id);
        $this->db->where('wall_post_type', 'userpost');
        $this->db->delete('nana_wall');

        

        $data = array
                (       
                  'status' => 1,
                  'msg'    => 'Post has been deleted successfully!'
                );

            echo json_encode($data); 

    }


    public function editPostViewDB()
    {
        $post_id = $this->input->post("post_id");
        $this->db->select('*');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('nana_post');

        $row = $query->row();
        if($query->num_rows() == 1){



        $this->db->select('grade_title');       
        $queryG = $this->db->get('nana_grades');
        $rowG = $queryG->row();
           
            $data = array
            (
              'post_id' => $row->post_id, 
              'post_user_id' => $row->post_user_id,
              'post_text' => $row->post_text,
              'post_image' => $row->post_image,              
              'post_grade_title' => $rowG->grade_title
            );
           

        }

        else{

          $data = "";
        }
        

      echo   json_encode($data);

    }




      public function updatePostDB(){

       $uploadfile = $this->input->post('uploadfile');
       $edirpost_id = $this->input->post('editpost_id');
       $postText  = $this->input->post('editPostText');

       
       if($postText =="" ){
           $data = array
                (       
        'status'    => 0,
        'msg'  => 'Please write your question'
         );

          echo json_encode($data); 
          
       }

       else 
       {              
               $update_data = array
                (
                'post_text'    => $postText,
                'post_image'   => $uploadfile,              
                
                );

              $this->db->where('post_id', $edirpost_id);
              $inqu =  $this->db->update('nana_post', $update_data);
               $data = array
                (       
                  'status'    => 1,
                  'msg'  => 'Post has been updated successfully!'
                );

         echo json_encode($data); 

         
       }
        
   
      

  }

  public function gettotalPostDB($user_id){

    $this->db->where("post_user_id", $user_id);
    $query = $this->db->get("nana_post");

    $num_rows = $query->num_rows();

    $data = array('num_rows' => $num_rows, 'status' => 1 );

     echo json_encode($data);
  }


   public function deleteCommentsDB()
    {
      $comment_id = $this->input->post("comment_id");

      $this->db->where('postReplyId', $comment_id);
      $this->db->delete('nana_post_reply');      

      $data = array
              (       
                'status'    => 1,
                'msg'       => 'Post has been deleted successfully!'
               );
      echo json_encode($data); 

    }


    public function editGetCommentDB()
    {
        $comment_id = $this->input->post("comment_id");
        $this->db->where('postReplyId', $comment_id);
        $query = $this->db->get('nana_post_reply');

        $row = $query->row();
        if($query->num_rows() == 1){

            $data = array
            (
              'postReplyId' => $row->postReplyId, 
              'postId' => $row->postId,
              'comment' => $row->comment,
              'commentBy' => $row->commentBy,
              'commentDate' => $row->commentDate
            
            );
           

        }

        else{

          $data = "";
        }
        

      echo   json_encode($data);

    }


   public function addEditCommentsDB(){

       $newComments = rtrim($this->input->post('newComments'));
       $commentId   = $this->input->post('commentId');
       
       if($newComments ==" " || $newComments =="" ||  $commentId =="" ){
           $data = array
                (       
        'status'    => 0,
        'msg'  => 'Please write your question'
         );

          echo json_encode($data); 
          
       }

       else 
       {              
               $update_data = array
                (
                'comment'    => $newComments,
                              
                );

              $this->db->where('postReplyId', $commentId);
              $inqu =  $this->db->update('nana_post_reply', $update_data);
               $data = array
                (       
                  'status'    => 1,
                  'msg'  => 'Comments has been updated successfully!'
                );

         echo json_encode($data); 

         
       }
   }


}