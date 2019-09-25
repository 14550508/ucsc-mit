<?php 
class QuizzesModel extends CI_Model {

	public function quizDataDB($quizId,  $user_id)
	{
    $this->db->join('nana_quiz_category', 'nana_quiz.qu_cat_id = nana_quiz_category.qz_cat_id');
    $this->db->join('nana_users', 'nana_quiz.createBy = nana_users.u_id');
    $this->db->where('nana_quiz.qz_id', $quizId);
    $query = $this->db->get('nana_quiz');
         
    if( $query->num_rows() > 0 ){
      $rew['quizData'] = $query->result();
    }
    else{
      redirect(base_url());
    }  

    $this->db->where('qz_id', $quizId);
    $this->db->where('u_id', $user_id);
    $queryCeck = $this->db->get('nana_quiz_enroll');                        
        
    if( $queryCeck->num_rows() > 0 ){
          $rew['enrollCecked'] = 1;
    }
    else{
      $rew['enrollCecked'] = 0;
    }

    return  $rew;   
	}	

	public function quizcatDB()
	{
    $this->db->select('CONCAT(qz_cat_name ) as text, qz_cat_id as id', FALSE);
		$this->db->like('qz_cat_name ', $this->input->get('q'));
    $this->db->limit(10);			
		$query = $this->db->get('nana_quiz_category');                        
        $query->result();
         
        foreach ($query->result() as $quiz) 
        {
            $rows[] = $quiz;
        }
        
        echo  json_encode($rows); 
	}

	public function getUserEnrollQuiz()
	{ 
		$keyword = $this->input->post('key');
		$user_id = $this->input->post('user_id');
        
        $this->db->join('nana_quiz', 'nana_quiz_enroll.qz_id = nana_quiz.qz_id');
		if($keyword)$this->db->like('nana_quiz.qz_name', $keyword);
		$this->db->where('nana_quiz_enroll.u_id', $user_id);
        $this->db->limit(20);			
		$query = $this->db->get('nana_quiz_enroll');                        
        $query->result();

        if($query->num_rows() > 0 ){
           foreach ($query->result() as $quiz) 
	        {
	            $rows[] = $quiz;
	        }

        }
        else
        {
               $rows['status'] = 0;

        }
         
       
        
        echo  json_encode($rows);         
	}

	public function getUserPendingQuiz()
	{   
		$keyword = $this->input->post('key');
		$user_id = $this->input->post('user_id');
        $this->db->select('nana_quiz.*, nana_user_temp_answers.qz_id');
        $this->db->join('nana_quiz', 'nana_user_temp_answers.qz_id = nana_quiz.qz_id');
		if($keyword)$this->db->like('nana_quiz.qz_name', $keyword);
		$this->db->where('nana_user_temp_answers.u_id', $user_id);
		$this->db->group_by('nana_user_temp_answers.qz_id');
        $this->db->limit(20);
        $query = $this->db->get('nana_user_temp_answers');                        
        $query->result();
      
        if($query->num_rows() > 0 )
        {
           foreach ($query->result() as $quiz) 
	        {
	            $rows[] = $quiz;
	        }
        }
        else
        {
               $rows['status'] = 0;

        }        
       
        
        echo  json_encode($rows);         
	}


	public function getUserCompletedQuiz()
	{   

		$keyword = $this->input->post('key');
		$user_id = $this->input->post('user_id');        
        $this->db->join('nana_quiz', 'nana_point_history.qz_id = nana_quiz.qz_id');
		if($keyword)$this->db->like('nana_quiz.qz_name', $keyword);
		$this->db->where('nana_point_history.up_id', $user_id);
        $this->db->limit(20);			
		$query = $this->db->get('nana_point_history');                        
        $query->result();

        if($query->num_rows() > 0 ){
           foreach ($query->result() as $quiz) 
	        {
	            $rows[] = $quiz;
	        }

        }
        else        {
               $rows['status'] = 0;
        } 
        
        echo  json_encode($rows);         
	}


	public function getUserFindQuiz()
	{   

		$keyword = $this->input->post('key');
    $cat = $this->input->post('cat');
		$user_id = $this->input->post('user_id');        
		if($keyword)$this->db->like('qz_name', $keyword);
    if($cat)$this->db->where('qu_cat_id', $cat);
		$this->db->where('`qz_id` NOT IN (SELECT `qz_id` FROM `nana_quiz_enroll` WHERE  u_id = "'.$user_id.'")', NULL, FALSE);
        $this->db->limit(25);
        $this->db->order_by('qz_id', 'desc');

		$query = $this->db->get('nana_quiz');                        
        $query->result();

        if($query->num_rows() > 0 ){
           foreach ($query->result() as $quiz) 
	        {
	            $rows[] = $quiz;
	        }

        }
        else        {
               $rows['status'] = 0;
        } 
        
        echo  json_encode($rows);         
	}


	public function quizLogoUpdateDB()
	{   
       $logoImage = $this->input->post('proedituploadfileId');
        $quiz_id = $this->input->post('quiz_id');

	   $update_data = array('qz_into_image' => $logoImage);

       if($logoImage !=""){

       	   $this->db->where("qz_id", $quiz_id);
           $this->db->update("nana_quiz", $update_data);

          $data = array(				
						'status'           => 1,
						'newProfilePic'    =>  $logoImage
						 );

		   echo json_encode($data); 

       }

       else{

       	  $data = array(				
						'status'           => 0,
						'message'    =>  'Please select image'
						 );

		   echo json_encode($data); 


       }        
	}

	public function insertPostData(){

       $uploadfile = $this->input->post('uploadfile');
       $postText   = $this->input->post('postText');
       $quizId   = $this->input->post('quizId');

       if($postText =="" ||  $quizId =="" ){
        
       }

       else if($uploadfile !="" )
       {

       	    $insert_data = array
                (
              	'qz_post_user_id' => $this->session->userdata('user_id'), 
              	'qz_post_text'    => $postText,
              	'qz_post_image'   => $uploadfile,
              	'qz_post_quizid'  => $quizId,
              	'qz_post_status'  => 1
              	);

              $inqu =  $this->db->insert('nana_quiz_post', $insert_data);
              $postId = $this->db->insert_id();
       }
       else 
       {              
              $insert_data = array
                (
              	'qz_post_user_id' => $this->session->userdata('user_id'), 
              	'qz_post_text'    => $postText,
                'qz_post_quizid'   => $quizId,
              	'qz_post_status'  => 1
              	);

               $this->db->insert('nana_quiz_post', $insert_data);   
               $postId = $this->db->insert_id();          

			   
       }

            $postedById = $this->session->userdata('user_id');

             $this->db->distinct();
             $this->db->SELECT('u_id');
             $this->db->WHERE('qz_id', $quizId);
             $this->db->WHERE('u_id !=', $postedById);
             $this->db->order_by('rand()');
             $this->db->LIMIT('100');             
             $enrollQuery = $this->db->get('nana_quiz_enroll');
            
             $this->db->WHERE('qz_id', $quizId);             
             $QuizQuery = $this->db->get('nana_quiz');
             $quizRow = $QuizQuery->row();
             $QuizName = $quizRow->qz_name;

            
             $postedBy = $this->session->userdata('fname').' '.$this->session->userdata('lname');

             if($enrollQuery->num_rows() > 0){
                 foreach ($enrollQuery->result() as $notifrow ) {

                    $insertnotif_data = array
                    (
                      'notifi_link'    => 'notification/quizpost/?quizId='.$quizId.'postedBy='.$postedById, 
                      'notifi_users'   => $notifrow->u_id,
                      'notifi_mess'    =>  $postedBy.' posted in '. $QuizName,
                      'notifi_status'  => 1,
                    );
                    
                    $insertnotif =  $this->db->insert('nana_notification', $insertnotif_data);


                    $insert_wall_data = array
                    (
                      'wall_post_id'        => $postId, 
                      'wall_post_view_uid'  => $notifrow->u_id,
                      'wall_post_type'      => 'quiz',
                    );
                      
                    $insertWall =  $this->db->insert('nana_wall', $insert_wall_data);
                  
                 }
             } 
              
        
        $this->db->select('*');
        $this->db->join('nana_users' , 'nana_quiz_post.qz_post_user_id = nana_users.u_id');
        $this->db->join('nana_userdata' , 'nana_quiz_post.qz_post_user_id =  nana_userdata.ud_id');
        $this->db->where('nana_quiz_post.qz_post_user_id', $this->session->userdata('user_id'));
        $this->db->where('nana_quiz_post.qz_post_status', 1);
        $this->db->order_by('nana_quiz_post.qz_post_date', 'DESC');
        $query = $this->db->get('nana_quiz_post');

        foreach ($query->result() as $row) {
                $data[] = $row;
            }

      echo   json_encode($data);
	}


	public function totlaPostDataBD()
    {  
        $quizId = $this->input->post('quizId');
        $this->db->select('*');
        $this->db->where('qz_post_quizid', $quizId);
        $this->db->where('nana_quiz_post.qz_post_status', 1); 
        $queryRows = $this->db->get('nana_quiz_post');
        $num_rows = $queryRows->num_rows();
        $data['totlaRow'] =  $num_rows;

        echo  json_encode($num_rows);
    }

    public function getPostDataBD()
    {  
        $pageNumr = $this->input->post('pageNumr');
        $quizId = $this->input->post('quizId');
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
        $this->db->where('qz_post_quizid', $quizId);
        $this->db->where('nana_quiz_post.qz_post_status', 1); 
        $queryRows = $this->db->get('nana_quiz_post');
        $num_rows = $queryRows->num_rows();
        $numPagers = $num_rows/ $pageSize;
        $start =  ($pageNumrfinale * $pageSize) - $pageSize;
 

   
        $this->db->select('*');
        $this->db->join('nana_users' , 'nana_quiz_post.qz_post_user_id = nana_users.u_id');
        $this->db->join('nana_userdata' , 'nana_quiz_post.qz_post_user_id =  nana_userdata.ud_id');
        $this->db->where('qz_post_quizid', $quizId);
        $this->db->where('nana_quiz_post.qz_post_status', 1);
        $this->db->limit($pageSize, $start);
        $this->db->order_by('nana_quiz_post.qz_post_date', 'DESC');       
        $query = $this->db->get('nana_quiz_post');       
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
        $this->db->join('nana_users', 'nana_quiz_post_reply.qz_commentBy = nana_users.u_id');
        $this->db->join('nana_userdata', 'nana_quiz_post_reply.qz_commentBy =  nana_userdata.ud_id');
        $this->db->where('nana_quiz_post_reply.qz_postId', $post_id);
        $this->db->limit($limit);
        $this->db->order_by('nana_quiz_post_reply.qz_commentDate', 'ASE');       
        $query = $this->db->get('nana_quiz_post_reply');
        $this->db->where('nana_quiz_post_reply.qz_postId', $post_id);
        $queryTotal = $this->db->get('nana_quiz_post_reply');

        $data['totlaComments'] = $queryTotal->num_rows();
	       if($query->num_rows() > 0 ){

	          foreach ($query->result() as $row) {	               
	                $data[] = $row;	                 
	            }
	        
	          echo   json_encode($data);
	       }
	       else{

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
              'qz_postId' => $postId, 
              'qz_comment' => $postComments, 
              'qz_commentBy' =>  $this->session->userdata('user_id'), 
              'qz_postReplyStatus' =>  1 );

               $query = $this->db->insert('nana_quiz_post_reply',  $insertComment);

            if($query){

                $postedById = $this->session->userdata('user_id');
                $postedBy   = $this->session->userdata('fname').' '.$this->session->userdata('lname');

                $this->db->SELECT('qz_post_user_id');
                $this->db->WHERE('qz_pid', $postId);
                $postquery = $this->db->get('nana_quiz_post');

                $postRow = $postquery->row();

                  if($postquery->num_rows() == 1){

                        $insertnotif_data_comments_owner = array
                        (
                          'notifi_link'    => 'notification/quizpostcomments/?quizId='.$postId.'postedBy='.$postedById, 
                          'notifi_users'   =>  $postRow->qz_post_user_id,
                          'notifi_mess'    =>  $postedBy.' commented on your quiz post',
                          'notifi_status'  => 1,
                        );                        
                        $insertnotifcommOwner =  $this->db->insert('nana_notification', $insertnotif_data_comments_owner);
                  }


                //comment notificaion
                $this->db->SELECT('qz_commentBy');
                $this->db->WHERE('qz_commentBy !=', $postedById);
                $this->db->WHERE('qz_postId', $postId);
                $this->db->order_by('rand()');
                $this->db->group_by('qz_commentBy');
                $postCommQuery = $this->db->get('nana_quiz_post_reply');

                    if($postCommQuery->num_rows() > 0)
                    {
                        foreach ($postCommQuery->result() as $notifrow )
                        {
                              $insertnotif_data_all_commenters = array
                              (
                                'notifi_link'    => 'notification/quizpostcomments/?quizId='.$postId.'postedBy='.$postedById, 
                                'notifi_users'   =>  $notifrow->commentBy,
                                'notifi_mess'    =>  $postedBy.'commented on your commented quiz post',
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

        $this->db->where('qz_postId ', $post_id);
        $this->db->delete('nana_quiz_post_reply');


        $this->db->where('qz_pid', $post_id);
        $this->db->delete('nana_quiz_post');

        $this->db->where('wall_post_id', $post_id);
        $this->db->delete('nana_wall');      

        $data = array
                  (       
          'status'    => 1,
          'msg'       => 'Post has been deleted successfully!'
           );

            echo json_encode($data); 
    }


    public function editPostViewDB()
    {
        $post_id = $this->input->post("post_id");
        $this->db->select('*');
        $this->db->where('qz_pid', $post_id);
        $query = $this->db->get('nana_quiz_post');

        $row = $query->row();
        if($query->num_rows() == 1){      
           
            $data = array
            (
              'post_id' => $row->qz_pid, 
              'post_user_id' => $row->qz_post_user_id,
              'post_text' => $row->qz_post_text,
              'post_image' => $row->qz_post_image,
              
            );
        }

        else{

          $data = "";
        }
        

      echo   json_encode($data);
    }

    public function updatePostDB()
    {

       $uploadfile = $this->input->post('uploadfile');
       $edirpost_id = $this->input->post('editpost_id');
       $postText   = $this->input->post('editPostText');
      

       if($postText ==""  ){
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
                'qz_post_text'    => $postText,
                'qz_post_image'   => $uploadfile,               
                
                );

              $this->db->where('qz_pid', $edirpost_id);
              $inqu =  $this->db->update('nana_quiz_post', $update_data);
               $data = array
                (       
                  'status'    => 1,
                  'msg'  => 'Post has been updated successfully!'
                );

         echo json_encode($data); 

         
       } 
    }

    public function gettotalPostDB($quiz_id){

	    $this->db->where("qz_post_quizid", $quiz_id);
	    $query = $this->db->get("nana_quiz_post");
	    $num_rows = $query->num_rows();
	    $data = array('num_rows' => $num_rows, 'status' => 1 );
	     echo json_encode($data);
    }


    public function deleteCommentsDB()
    {
        $comment_id = $this->input->post("comment_id");

        $this->db->where('qz_postReplyId', $comment_id);
        $query = $this->db->delete('nana_quiz_post_reply');
           
        if( $query){
        	$data = array
                  (       
          'status'    => 1,
          'msg'       => 'Post has been deleted successfully!'
           );

            echo json_encode($data); 
        }        
    }


    public function editGetCommentDB()
    {   
        $comment_id = $this->input->post("comment_id");
        $this->db->where('qz_postReplyId', $comment_id);
        $query = $this->db->get('nana_quiz_post_reply');

        $row = $query->row();
        if($query->num_rows() == 1){

            $data = array
            (
              'postReplyId' => $row->qz_postReplyId, 
              'postId' => $row->qz_postId,
              'comment' => $row->qz_comment,
              'commentBy' => $row->qz_commentBy,
              'commentDate' => $row->qz_commentDate
            
            );
           

        }

        else{

          $data = "";
        }
        

      echo   json_encode($data);
    }


    public function addEditCommentsDB()
    {

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
                'qz_comment'    => $newComments,
                              
                );

              $this->db->where('qz_postReplyId', $commentId);
              $inqu =  $this->db->update('nana_quiz_post_reply', $update_data);
               $data = array
                (       
                  'status'    => 1,
                  'msg'  => 'Comments has been updated successfully!'
                );

         echo json_encode($data); 

         
       }
    }

    public function uploadCoverPicDB($new_name, $quizId)
	{   
        
       if($new_name !=""){
              $update_data = array('qz_cover_pic' => $new_name );
       	   $this->db->where("qz_id", $quizId);
           $query = $this->db->update("nana_quiz", $update_data);
          
          if($query){
              
          	$data = array(				
						'status'           => 1,
						'newProfilePic'    =>  $new_name
						 );

		   echo json_encode($data); 
          }
          

       }

       else{

       	  $data = array(				
						'status'           => 0,
						'message'    =>  'Please select image'
						 );

		   echo json_encode($data); 


       }         
	}

    public function totlaEnrolledUsersBD($quizId)
    {  
       
        $this->db->where('qz_id', $quizId);
        $query = $this->db->get('nana_quiz_enroll');
       
        $data['totlaEnrolled'] =  $query->num_rows();

       return $data;
    }


    public function startQuizCheck($quizId, $user_id)
    {        
        $this->db->where('qz_id', $quizId);
        $this->db->where('u_id', $user_id);
        $query = $this->db->get('nana_quiz_enroll');       
        $query->num_rows();
        if($query->num_rows() > 0){

        	$this->db->where('qz_id', $quizId);
	        $this->db->where('u_id', $user_id);
	        $query1 = $this->db->get('nana_user_temp_answers');       
	        $query1->num_rows();

	        if($query1->num_rows() > 0)
	        {                 
                 $rew['pendingStatus'] = 1;
	        }

	        else
	        {

	        	 $rew['pendingStatus'] = 0;
	        } 

         return $rew;
           
        }
        else
        {
           redirect(base_url().'quizzes/page/'.$quizId);

        }      
    }


    public function setQuizDB($quizId, $user_id)
    {   
        $this->db->where('qz_id', $quizId);
		$queryQuiz = $this->db->get('nana_quiz'); 
		$setting = $queryQuiz->row();  
        
        $this->db->where('qz_id', $quizId); 
        $queryQuizQuestion = $this->db->get('nana_quiz_question');

        if($queryQuizQuestion->num_rows() > 0)
        {
        	$this->db->where('qz_id', $quizId);
	        $this->db->where('u_id', $user_id);
			$this->db->set('attempts', '`attempts`+ 1', FALSE);
			$updateQuery = $this->db->update('nana_quiz_enroll'); 

            if($updateQuery)
            {
                redirect(base_url().'quizzes/startQuiz/'.$quizId); 
            }

            else
            {
               //attemps not updated database error
               redirect(base_url().'quizzes/page/'.$quizId);
            }
           
        }
        //emapty quiz questions
        else
        {
           redirect(base_url().'quizzes/page/'.$quizId);

        }      
    }

    public function startQuizDB($quizId, $user_id)
    {   
        $this->db->where('qz_id', $quizId);
		$queryQuiz = $this->db->get('nana_quiz'); 
		$setting = $queryQuiz->row(); 

		$this->db->where('qz_id', $quizId);
	    $this->db->where('u_id', $user_id);
	   	$queryEnroll = $this->db->get('nana_quiz_enroll'); 
	   	$enrollrow =  $queryEnroll->row();
        
        $this->db->where('qz_id', $quizId);
	        if(	$setting->shuffle_questions == 1)
	        {
	        	 $this->db->order_by('order', 'RANDOM');
	        }
	        else
	        {
	              $this->db->order_by('order', 'ASC');
	        } 

        $queryQuizQuestion = $this->db->get('nana_quiz_question');

        if($queryQuizQuestion->num_rows() > 0)
        {
        	
            $rew['quizQuestionData'] =  $queryQuizQuestion->result();
            $rew['quizData'] 		 =  $queryQuiz->result(); 
            $rew['numQuestion'] 	 =  $queryQuizQuestion->num_rows();
            $rew['attempts'] 	 =  $enrollrow->attempts;               
            return $rew; 
           
        }
        //emapty quiz questions
        else
        {
           redirect(base_url().'quizzes/page/'.$quizId);

        }      
    }


    public function questinNumbersDB($quizId)
    {   
        $this->db->where('qz_id', $quizId);
		$queryQuiz = $this->db->get('nana_quiz'); 
		$setting = $queryQuiz->row();

	    if($setting->shuffle_questions == 1)
	    {
	        $this->db->order_by('order', 'RANDOM');
	    }
	    else
	    {
	        $this->db->order_by('order', 'ASC');
	    } 

        $this->db->where('qz_id', $quizId);
        $queryQuizQuestion = $this->db->get('nana_quiz_question');
        
        if($queryQuizQuestion->num_rows() > 0)
        {        	
            $data = $queryQuizQuestion->result();
            echo json_encode($data);
        }
        
        else
        {
           $data = 0;
           echo json_encode($data);
        }      
    }


    public function checkQesAnsDB($user_id, $questionId, $attempts, $quiz_id)
    {   
       
        $this->db->where('q_id', $questionId);
        $this->db->where('attempts', $attempts);
        $this->db->where('u_id', $user_id);
        $this->db->where('qz_id', $quiz_id);
		$queryTempAnsw = $this->db->get('nana_user_temp_answers'); 
		$row = $queryTempAnsw->row(); 
		
           
	    
        
        if($queryTempAnsw->num_rows() > 0)
        {        	
            $data['user_answer']    = $row->user_answer;
            $data['q_id']           = $row->q_id;
            $data['status'] = 1;

            echo json_encode($data);
        }
        
        else
        {
           $data['status'] = 0;
           echo json_encode($data);
        }      
    }


    public function initialQuestionDB($user_id, $quiz_id, $attempts, $startQueId)
    {   
        
        $this->db->where('attempts', $attempts);
        $this->db->where('qz_id', $quiz_id);
        $this->db->where('u_id', $user_id);       
       	$queryTemp = $this->db->get('nana_user_temp_answers');
		
     
     
        if($queryTemp->num_rows() > 0)
        {   
        	$this->db->where('attempts', $attempts);
	        $this->db->where('qz_id', $quiz_id);
	        $this->db->where('u_id', $user_id); 
	        $this->db->order_by('answer_date', 'DESC');
	        $this->db->limit(1);

			$queryTempAnsw = $this->db->get('nana_user_temp_answers');
			$row = $queryTempAnsw->row();

            $data['user_answer']    = $row->user_answer;
            $data['q_id']           = $row->q_id;
            $data['status'] = 1;
            $lastquestion = $row->q_id;
            
        }
        else{

            $data['status'] = 0;
            $lastquestion = $startQueId;
            $data['q_id'] = $startQueId;
        }


        $this->db->where('q_id', $lastquestion);
        $this->db->order_by('answer_order', 'ASC');
       	$queryQuestionAns= $this->db->get('nana_question_answers');
       	$data['q_answers']  = $queryQuestionAns->result();

       	$this->db->where('q_id', $lastquestion);
       	$queryQuestion= $this->db->get('nana_questions_bank'); 
       	$rowQus = $queryQuestion->row();

       	$this->db->where('qz_id', $quiz_id);
       	$this->db->where('q_id', $lastquestion);
		$quizQuesQuiz = $this->db->get('nana_quiz_question'); 
		$quizQues = $quizQuesQuiz->row();
        if( $quizQuesQuiz->num_rows() > 0){
        $data['q_order'] = $quizQues->order;

        }else{

        	$data['q_order'] = '';
        }
        
       	$data['q_name']  = $rowQus->name;
       	$data['q_text']  = $rowQus->questiontext;
        
        echo json_encode($data); 
    }


    public function nextQuestionDB($user_id, $quiz_id, $attempts, $q_id, $answer, $q_order)
    {   
       
        $this->db->where('q_id', $q_id);
        $this->db->where('attempts', $attempts);
        $this->db->where('u_id', $user_id);
        $this->db->where('qz_id', $quiz_id);
		$queryTempAnsw = $this->db->get('nana_user_temp_answers'); 
	    
        
        if($queryTempAnsw->num_rows() > 0)
        {        	
            $updateData = array(
            	'user_answer' => $answer, 
            	);

            $this->db->where('q_id', $q_id);
	        $this->db->where('attempts', $attempts);
	        $this->db->where('u_id', $user_id);
	        $this->db->where('qz_id', $quiz_id);

            $str = $this->db->update('nana_user_temp_answers', $updateData);
           
        }
        
        else
        {
           $insertData = array(
            	'u_id' => $user_id, 
            	'qz_id' => $quiz_id, 
            	'q_id' => $q_id, 
            	'attempts' => $attempts, 
            	'user_answer' => $answer, 
            	);

           $str = $this->db->insert('nana_user_temp_answers', $insertData);

          

        }  

         
        $this->db->where('qz_id', $quiz_id);
       	$this->db->where('order', $q_order + 1);
		$quizQuesQuiz = $this->db->get('nana_quiz_question'); 
		$quizQues = $quizQuesQuiz->row();

		if($quizQuesQuiz->num_rows() == 1)
		{
	        $data['q_status'] = 1;   
	        $this->db->where('attempts', $attempts);
	        $this->db->where('q_id', $quizQues->q_id);
	        $this->db->where('qz_id', $quiz_id);
	        $this->db->where('u_id', $user_id);
			$queryTemp = $this->db->get('nana_user_temp_answers');
			$rowlast = $queryTemp->row();
	   
       
		        if($queryTemp->num_rows() == 1)
		        {    $lastid = $rowlast->ua_id;
			        $this->db->where('ua_id', $lastid);
					$queryTempAnsw = $this->db->get('nana_user_temp_answers');
					$row = $queryTempAnsw->row();

		            $data['user_answer']    = $row->user_answer;
		            $data['q_id']           = $row->q_id;
		            $data['status'] = 1;
		            $lastquestion = $row->q_id;
		            
		        }
		        else{

		            $data['status'] = 0;
		            $lastquestion = $quizQues->q_id;
		            $data['q_id'] = $quizQues->q_id;
		        }


		    $this->db->where('q_id', $lastquestion);
		    $this->db->order_by('answer_order', 'ASC');
		    $queryQuestionAns= $this->db->get('nana_question_answers');
		    $data['q_answers']  = $queryQuestionAns->result();

		    $this->db->where('q_id', $lastquestion);
		    $queryQuestion= $this->db->get('nana_questions_bank'); 
		    $rowQus = $queryQuestion->row();

		    $this->db->where('qz_id', $quiz_id);
		    $this->db->where('q_id', $lastquestion);
			$quizQuesQuizNew = $this->db->get('nana_quiz_question'); 
			$quizQuesNew = $quizQuesQuizNew->row();
		    $data['q_order']  = $quizQuesNew->order;
		    $data['q_name']  = $rowQus->name;
		    $data['q_text']  = $rowQus->questiontext;
		        
		        echo json_encode($data); 
		            
				}

		else
		{
             $data['q_status'] = 0;
             echo json_encode($data); 

		}
    }


    public function goBackQuestionDB($user_id, $quiz_id, $attempts, $q_id)
    {  
        $this->db->where('qz_id', $quiz_id);
       	$this->db->where('q_id', $q_id);
		$quizQuesQuiz = $this->db->get('nana_quiz_question'); 
		$quizQues = $quizQuesQuiz->row();

		if($quizQuesQuiz->num_rows() == 1)
		{
	        $data['q_status'] = 1;   
	        $this->db->where('attempts', $attempts);
	        $this->db->where('q_id', $q_id);
	        $this->db->where('qz_id', $quiz_id);
	        $this->db->where('u_id', $user_id);
			$queryTemp = $this->db->get('nana_user_temp_answers');
			$rowlast = $queryTemp->row();
	   
       
		        if($queryTemp->num_rows() == 1)
		        {   $lastid = $rowlast->ua_id;

			        $this->db->where('ua_id', $lastid);
					$queryTempAnsw = $this->db->get('nana_user_temp_answers');
					$row = $queryTempAnsw->row();

		            $data['user_answer']    = $row->user_answer;
		            $data['q_id']           = $q_id;
		            $data['status'] = 1;
		            $lastquestion = $q_id;
		            
		        }
		        else{

		            $data['status'] = 0;
		            $lastquestion = $q_id;
		            $data['q_id'] = $q_id;
		        }


		    $this->db->where('q_id', $q_id);
		    $this->db->order_by('answer_order', 'ASC');
		    $queryQuestionAns= $this->db->get('nana_question_answers');
		    $data['q_answers']  = $queryQuestionAns->result();

		    $this->db->where('q_id', $q_id);
		    $queryQuestion= $this->db->get('nana_questions_bank'); 
		    $rowQus = $queryQuestion->row();

		    $this->db->where('qz_id', $quiz_id);
		    $this->db->where('q_id', $q_id);
			$quizQuesQuizNew = $this->db->get('nana_quiz_question'); 
			$quizQuesNew = $quizQuesQuizNew->row();
		    $data['q_order'] = $quizQuesNew->order;
		    $data['q_name']  = $rowQus->name;
		    $data['q_text']  = $rowQus->questiontext;
		        
		        echo json_encode($data); 
		            
				}

		else
		{
             $data['q_status'] = 0;
             echo json_encode($data); 

		}
    }


    public function resetQuizDB($user_id, $quiz_id, $attempts)
    {        
        $this->db->where('qz_id', $quiz_id);
        $this->db->where('u_id', $user_id);
        $this->db->where('attempts', $attempts);
        $delete = $this->db->delete('nana_user_temp_answers');     
      
        if($delete)
        {        	
        	 $data = array(              
                'status'   => 1,                
                 );
            echo json_encode($data);            
        }
        else
        {
            $data = array(              
                'status'   => 0,                
                 );
            echo json_encode($data); 
        }      
    }


    public function endQuizDB($user_id, $quiz_id, $attempts)
    {  
        $this->db->where('qz_id', $quiz_id);
        $this->db->where('u_id', $user_id);
        $this->db->where('attempts', $attempts);
        $query = $this->db->get('nana_user_temp_answers');
        $marks = 0;
        if($query->num_rows() > 0){
            
        	foreach ($query->result() as $row) {

                $this->db->where('q_id', $row->q_id);
                $this->db->where('answer_order', $row->user_answer);
                $queryAns = $this->db->get('nana_question_answers');

                $rowAns = $queryAns->row();

                if($rowAns->fraction == 1){
                   
                   $fraction = 1;   
                   $marks += 1;
                }
                else
                {
                   
                   $fraction = 0;   

                }

        		$inserData = array(
        			'u_id'  => $user_id, 
        			'qz_id' => $quiz_id,
        			'q_id'  => $row->q_id,
        			'attempts' => $attempts,
        			'user_answer' => $row->user_answer,
        			'fraction' => $fraction,
        			);

        		$queryInsert = $this->db->insert('nana_user_answers', $inserData);
        		
        	}

        	$this->db->where('qz_id', $quiz_id);
	        $this->db->where('u_id', $user_id);
	        $this->db->where('attempts', $attempts);
	        $delete = $this->db->delete('nana_user_temp_answers');     
      
		        if($delete)
		        {        	
		        	 $data = array(              
		                'status'   => 1,                
		                 );
		            echo json_encode($data);            
		        }
		        else
		        {
		            $data = array(              
		                'status'   => 0,                
		                 );
		            echo json_encode($data); 
		        } 
        }

        else{
            $data = array(              
		                'status'   => 0,                
		                 );
		            echo json_encode($data); 

        }

        //add quiz post 

        $this->db->where('qz_id', $quiz_id);
        $queryQuiz = $this->db->get('nana_quiz');

        $this->db->where('qz_id', $quiz_id);
        $queryQuizQus = $this->db->get('nana_quiz_question');

        $this->db->where('u_id', $user_id);
        $queryUser = $this->db->get('nana_users');
        $userRow = $queryQuiz->row();

        if($queryQuiz->num_rows() == 1 &&  $queryUser->num_rows() == 1)
        {
           $totla = $queryQuizQus->num_rows();

           $preValue = round(($marks / $totla) * 100);

           if($preValue <= 20){
               $bg = '#ec6459';
           }
           else if($preValue > 20 || $preValue <= 35){
               $bg = '#e4ba00';
           }

           else if($preValue > 35 || $preValue <= 50){
               $bg = '#8075c4';
           }

           else if($preValue > 50 || $preValue <= 65){
               $bg = '#53bee6';
           }

           else{
           	  $bg = '#39b2a9';
           }


           $quizRow = $queryQuiz->row();
           $quizText = '<div id="topPost"><div id="quizPostresult"><h1><span class="marks" style="background:'.$bg.'">'.$preValue.'% </span> </h1><h3 class="red"><a href="'.base_url().'quizzes/page/'.$quiz_id.'">'.$quizRow->qz_name.'</a></h3><strong class="badge bg-primary">Attempt: '.$attempts.'</strong></div>';
           
                $inserQuizData = array(
        			'qz_post_user_id'  => $user_id, 
        			'qz_post_text'     => $quizText,
        			'qz_post_quizid'   => $quiz_id,
        			'qz_post_status'   => 1,
        			
        			);

        		$queryInsert = $this->db->insert('nana_quiz_post', $inserQuizData);


        		$inserPostData = array(
        			'post_user_id'  => $user_id, 
        			'post_text'     => $quizText,
        			'post_status'   => 1,
        			
        			);
        		$queryInsertPost = $this->db->insert('nana_post', $inserPostData);

        }
         

        $inserPoints = array(
        			'up_id'          => $user_id, 
        			'qz_id'          => $quiz_id,
        			'qz_attempt'     => $attempts,
        			'corrections'    => $marks,
        			'num_quetions'   => $totla,
        			'points'         => $preValue,
        			'reason'         => $quizRow->qz_name.' Attempt-'.$attempts,        			
        			);

        		$queryInsertPost = $this->db->insert('nana_point_history', $inserPoints);

             

               $this->db->where('u_id', $user_id);
               $queryPoints = $this->db->get('nana_points');
            
            if($queryPoints->num_rows() > 0){

             $this->db->where('u_id', $user_id);
             $this->db->set('points', '`points`+ '.$preValue, FALSE);
			 $updateQuery = $this->db->update('nana_points'); 

            }

            else
            {   
            	  $inserPointsData = array(
        			'u_id'   => $user_id, 
        			'points' => $preValue,
        			);

            	  $queryPointData = $this->db->insert('nana_points', $inserPointsData);



            }

             
        
    }


    public function resultCreate($user_id, $quiz_id, $attempts)
    {        
        $this->db->join('nana_quiz', 'nana_point_history.qz_id = nana_quiz.qz_id');
        $this->db->where('nana_point_history.qz_id', $quiz_id);
        $this->db->where('nana_point_history.up_id', $user_id);
        $this->db->where('nana_point_history.qz_attempt', $attempts);
        $quesry = $this->db->get('nana_point_history');     
      
        if($quesry->num_rows() > 0)
        {        	
        	   $rew['quizResult'] = $quesry->result();   

        	  
        }else
        {
              $rew['quizResult'] ="";
             
        }

         return  $rew;
          

    }

    public function fullresultCreateDB($user_id, $quiz_id, $attempts)
    {        
        $this->db->join('nana_questions_bank', 'nana_quiz_question.q_id = nana_questions_bank.q_id');
        $this->db->where('nana_quiz_question.qz_id', $quiz_id);
        $quesry = $this->db->get('nana_quiz_question');     
         
        if($quesry->num_rows() > 0)
        {        	
        	   $data = $quesry->result(); 

        	   
		            echo json_encode($data); 

        	  
        }else
        {
             $data = 0; 
        	   
		            echo json_encode($data); 
        }  

    }


    public function enrollQuizDB($user_id, $quiz_id)
    {  
      $this->db->where('qz_id', $quiz_id);          
      $quesryQuiz = $this->db->get('nana_quiz');
      $rowQuiz =  $quesryQuiz->row();
      
        $this->db->where('qz_id', $quiz_id);
        $this->db->where('u_id', $user_id);       
        $quesry = $this->db->get('nana_quiz_enroll'); 

        if($quesry->num_rows() > 0)
        {        	
          redirect(base_url().'quizzes/page/'.$quiz_id);        	  
        }

        else
        {
          if($rowQuiz->enroll_key =="")
          {
            $inserData =  array(
              'qz_id' => $quiz_id, 
              'u_id'  => $user_id, 
              'attempts'  => 0, 
              'status' => 1, 
            );
            $quesryInsert = $this->db->insert('nana_quiz_enroll', $inserData);
            redirect(base_url().'quizzes/page/'.$quiz_id);  
          }

          else
          {
            redirect(base_url().'quizzes/enrollKey/'.$quiz_id);
          }                             
        }
      
    }
    
    public function keyCheckDB($quiz_id, $ekey, $user_id)
    {  
      $this->db->where('qz_id', $quiz_id);
      $this->db->where('enroll_key', $ekey);          
      $quesryQuiz = $this->db->get('nana_quiz');
      $rowQuiz    =  $quesryQuiz->row();
      
        $this->db->where('qz_id', $quiz_id);
        $this->db->where('u_id', $user_id);       
        $quesry = $this->db->get('nana_quiz_enroll');        

       if($quesry->num_rows() == 0 && $quesryQuiz->num_rows() == 1)
        {          
            $inserData =  array(
              'qz_id' => $quiz_id, 
              'u_id'  => $user_id, 
              'attempts'  => 0, 
              'status' => 1, 
            );
            $quesryInsert = $this->db->insert('nana_quiz_enroll', $inserData);

            redirect(base_url().'quizzes/page/'.$quiz_id);                                     
        }
        else
        {         
          $this->session->set_flashdata('enrollError', 'Invalid key, please enter valid key!');
          redirect(base_url().'quizzes/enrollKey/'.$quiz_id);            
        }
      
    }
    
     
    public function resultChartDB($user_id, $quiz_id)
    {        
       $this->db->select('AVG(points) as ave_points');
        $this->db->select_max('points', 'max_points');
        $this->db->select_min('points', 'min_points');
        $this->db->where('qz_id', $quiz_id);            
        $query = $this->db->get('nana_point_history');

        $rowMax = $query->row();
      
        $max =  $rowMax->max_points; 
        $min =  $rowMax->min_points;  
        $ave =  round($rowMax->ave_points);    
      
         $data = array(              
		                'max'   => $max, 
		                'min'   => $min, 
		                'ave'   => $ave,               
		                 );

		echo json_encode($data);

    }   
    
    public function questionAnswersDB($q_id)
    {        
       
        $this->db->where('q_id', $q_id);            
        $query = $this->db->get('nana_question_answers');

       if($query->num_rows() > 0)
        {        	
        	   $data = $query->result();        	   
		        echo json_encode($data); 
        	  
        }else
        {
             $data = 0;         	   
		    echo json_encode($data); 
        } 
    }   


    public function userAnswersDB($q_id, $user_id, $quiz_id, $attempts)
    {
        $this->db->where('q_id', $q_id);
        $this->db->where('u_id', $user_id); 
        $this->db->where('qz_id', $quiz_id);
        $this->db->where('attempts', $attempts);           
        $query = $this->db->get('nana_user_answers');
        $row = $query->row();

       	if($query->num_rows() > 0)
        {   
        	$data['user_answer'] = $row->user_answer;
        	$data['fraction'] = $row->fraction;
		    echo json_encode($data);         	  
        }
        else
        {
            $data = 0;        	   
		    echo json_encode($data); 
        }

    }  


    public function myresultDB($quiz_id)
    {   
        $user_id = $this->session->userdata('user_id');

        $key = $this->input->post('key');     
         $this->db->select('nana_user_answers.attempts, nana_user_answers.u_id, nana_quiz.qz_name, nana_quiz.qz_into_image,  nana_user_answers.qz_id');
        $this->db->join('nana_quiz',  'nana_user_answers.qz_id = nana_quiz.qz_id');
        $this->db->where('nana_user_answers.qz_id', $quiz_id);
         $this->db->where('nana_user_answers.u_id', $user_id);
         if($key)$this->db->like('nana_quiz.qz_name', $key);
         $this->db->group_by('nana_user_answers.attempts');

            
        $query = $this->db->get('nana_user_answers');        

       	if($query->num_rows() > 0)
        {   
        	$data = $query->result();        	 	  
        }
        else
        {
           $data= '';
        }

         echo json_encode($data);  
    } 

    public function createQuizDB() {

        $inserData =  array(
            'qz_name' => $this->input->post('quiz_name'), 
            'qu_cat_id' => $this->input->post('quizcat'), 
            'qz_information' => $this->input->post('qz_information'), 
            'total_points' => $this->input->post('total_points'), 
            'qz_price' => 0, 
            'medium' => $this->input->post('medium'), 
            'attempts_allowed' => $this->input->post('attempts_allowed'), 
            'shuffle_questions' => 0, 
            'shuffle_questions_aswers' => 0, 
            'level' => 0, 
            'createBy' => $this->session->userdata('user_id'), 
            'status' => 1, 
          );
          $quesryInsert = $this->db->insert('nana_quiz', $inserData);

          return  $this->db->insert_id();

    }


}