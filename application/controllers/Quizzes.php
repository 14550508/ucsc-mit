<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizzes extends CI_Controller {

	function __construct() {

        parent::__construct();
        $this->load->model('userProfileModel');
        $this->load->model('quizzesModel');
        $this->load->model('userModel');
    }

	public function enrolled($username){

		if($this->session->userdata('is_logged_in') == TRUE   ) 
		{

		$user_id = $this->session->userdata('user_id');
        $result =  $this->userModel->profile($user_id, $username); 
        $data['userData'] = $result['userData']; 
        $data['profilePic'] = $result['profilePic'];
        $data['followers'] = $result['followers'];     
        $this->load->view('users/head', $data);
        $this->load->view('users/header', $data);
        $this->load->view('users/sideBar');  
        $this->load->view('users/enrolled', $data);
        $this->load->view('users/footer', $data);
        $this->load->view('users/changeProfilePictureModal');
        $this->load->view('users/changeCaverPictureModal');
        $this->load->view('users/enrolledJs');
        $this->load->view('users/notificationJs');
        $this->load->view('users/requestNotifiJs');
        }
        else 
	    {
           redirect(base_url().'userAuth/logout');
	    }       
	}

	public function pending($username){

		if($this->session->userdata('is_logged_in') == TRUE   ) 
		{

		$user_id = $this->session->userdata('user_id');
        $result =  $this->userModel->profile($user_id, $username); 
        $data['userData'] = $result['userData']; 
        $data['profilePic'] = $result['profilePic']; 
        $data['followers'] = $result['followers'];    
        $this->load->view('users/head', $data);
        $this->load->view('users/header', $data);
        $this->load->view('users/sideBar');  
        $this->load->view('users/pending', $data);
        $this->load->view('users/footer', $data);
        $this->load->view('users/changeProfilePictureModal');
        $this->load->view('users/changeCaverPictureModal');
        $this->load->view('users/pendingJs');
        $this->load->view('users/notificationJs');
        $this->load->view('users/requestNotifiJs');

        }
        else 
	    {
           redirect(base_url().'userAuth/logout');
	    }       
	}

	public function completed($username){

		if($this->session->userdata('is_logged_in') == TRUE   ) 
		{

		$user_id = $this->session->userdata('user_id');
        $result =  $this->userModel->profile($user_id, $username); 
        $data['userData'] = $result['userData']; 
        $data['profilePic'] = $result['profilePic']; 
        $data['followers'] = $result['followers'];    
        $this->load->view('users/head', $data);
        $this->load->view('users/header', $data);
        $this->load->view('users/sideBar');  
        $this->load->view('users/completed', $data);
        $this->load->view('users/footer', $data);
        $this->load->view('users/changeProfilePictureModal');
        $this->load->view('users/changeCaverPictureModal');
        $this->load->view('users/completedJs');
        $this->load->view('users/notificationJs');
        $this->load->view('users/requestNotifiJs');
        }
        else 
	    {
           redirect(base_url().'userAuth/logout');
	    }       
	}

	public function find($username){

		if($this->session->userdata('is_logged_in') == TRUE   ) 
		{

		$user_id = $this->session->userdata('user_id');
        $result =  $this->userModel->profile($user_id, $username); 
        $data['userData'] = $result['userData']; 
        $data['profilePic'] = $result['profilePic']; 
        $data['followers'] = $result['followers'];    
        $this->load->view('users/head', $data);
        $this->load->view('users/header', $data);
        $this->load->view('users/sideBar');  
        $this->load->view('users/find', $data);
        $this->load->view('users/footer', $data);
        $this->load->view('users/changeProfilePictureModal');
        $this->load->view('users/changeCaverPictureModal');
        $this->load->view('users/findJs');
        $this->load->view('users/notificationJs');
        $this->load->view('users/requestNotifiJs');
        }
        else 
	    {
           redirect(base_url().'userAuth/logout');
	    }       
	}

	public function page($quizId){	
		
        $user_id = $this->session->userdata('user_id');
        $result =  $this->quizzesModel->quizDataDB($quizId, $user_id); 
        $data['quizData'] = $result['quizData']; 
        $data['enrollCecked'] = $result['enrollCecked'];     
        
       
        $this->load->view('users/head', $data);
        if($this->session->userdata('is_logged_in') == TRUE){
          $result1 =  $this->userModel->loginUserProfile($user_id); 
          $data['userData'] = $result1['userData']; 
          $data['profilePic'] = $result1['profilePic']; 
          $this->load->view('users/header', $data);   
        }
       
        $this->load->view('quiz/page', $data);
        $this->load->view('users/footer', $data);
        $this->load->view('users/changeProfilePictureModal');
        $this->load->view('users/changeCaverPictureModal');
        $this->load->view('users/viewAllCommentModal');
        $this->load->view('quiz/postEditModal');
        
        $this->load->view('quiz/pageJs'); 


	}


    public function about($quizId){  
        
        $user_id = $this->session->userdata('user_id');
        $result =  $this->quizzesModel->quizDataDB($quizId, $user_id); 
        $data['quizData'] = $result['quizData']; 
        $data['enrollCecked'] = $result['enrollCecked']; 

        $result1 =  $this->quizzesModel->totlaEnrolledUsersBD($quizId); 
        $data['totlaEnrolled'] = $result1['totlaEnrolled'];     
        
       
        $this->load->view('users/head', $data);
        if($this->session->userdata('is_logged_in') == TRUE){
          $result2 =  $this->userModel->loginUserProfile($user_id); 
          $data['userData'] = $result2['userData']; 
          $data['profilePic'] = $result2['profilePic']; 
          $this->load->view('users/header', $data);   
        }
       
           
        $this->load->view('quiz/about', $data); 
        $this->load->view('users/footer', $data);
        $this->load->view('users/changeProfilePictureModal');
        $this->load->view('users/changeCaverPictureModal');             
        $this->load->view('quiz/pageJs'); 

    }

	public function quizcat(){

		$this->quizzesModel->quizcatDB(); 
	}

	public function userEnrollQuiz(){

		$this->quizzesModel->getUserEnrollQuiz(); 
	}

	public function userPendingQuiz(){

		$this->quizzesModel->getUserPendingQuiz(); 
	}

	public function userCompletedQuiz(){

		$this->quizzesModel->getUserCompletedQuiz(); 
	}

	public function userFindQuiz(){

		$this->quizzesModel->getUserFindQuiz(); 
	}


    public function quizLogoUpdate(){

        if($this->session->userdata('is_logged_in') == TRUE   ) 
        {
        $this->quizzesModel->quizLogoUpdateDB(); 
        }

        else
        {
        redirect(base_url().'userAuth/logout');
        }
    }

    public function insertPost(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->insertPostData();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Please Login!'
                 );

            echo json_encode($data); 
        }         
    }   


    public function getPostData(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           
          
           $this->load->model('quizzesModel');
           $this->quizzesModel->getPostDataBD();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Please Login!'
                 );

            echo json_encode($data); 
        }         
    }

    public function addComments(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {  
           $this->load->model('quizzesModel');
           $this->quizzesModel->addCommentsDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Please Login!'
                 );

            echo json_encode($data); 
        }         
    }

    public function totlaPostData(){
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {               
            $this->load->model('quizzesModel');

        }            
    }

    public function getCommentsData(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {               
            $post_id = $this->input->get('post_id');
            $limit = $this->input->get('limit');
            $this->load->model('quizzesModel');
            $this->quizzesModel->getCommentsDataBD($post_id, $limit);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Please Login!'
                 );

            echo json_encode($data); 
        }         
    }

    public function deletePost(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->deletePostDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }

    public function editPostView(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->editPostViewDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }

    public function updatePost(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->updatePostDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function deleteComments(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->deleteCommentsDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }

    public function editGetComment(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->editGetCommentDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function addEditComments(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
           $this->load->model('quizzesModel');
           $this->quizzesModel->addEditCommentsDB();
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function updateCaverPic()
    {
      if($this->session->userdata('is_logged_in') == TRUE   ) 
           {
                 $quizId =  $this->input->post('quizId');
                 $new_name = $this->input->post('caveredituploadfileId');

                    $this->load->model('quizzesModel');
                    $this->quizzesModel->uploadCoverPicDB($new_name, $quizId); 
    

            } 
        else 
        {
           redirect(base_url().'userAuth/logout');
        }         
    } 


    public function start($quizId)
    {
      if($this->session->userdata('is_logged_in') == TRUE  ) 
        {                 
            $user_id = $this->session->userdata('user_id');
            $this->load->model('quizzesModel');
            $result = $this->quizzesModel->startQuizCheck($quizId, $user_id);
            $data['pendingStatus'] = $result['pendingStatus'];
            $data['quizId'] = $quizId;

            $this->load->view('users/head', $data);
            if($this->session->userdata('is_logged_in') == TRUE)
            {
                $result2 =  $this->userModel->loginUserProfile($user_id); 
                $data['userData'] = $result2['userData']; 
                $data['profilePic'] = $result2['profilePic']; 
                $this->load->view('users/header', $data);   
            }       
           
            $this->load->view('quiz/confirmation', $data); 
            $this->load->view('users/footer', $data);               
              
        }

        else 
        {
           redirect(base_url().'userAuth/logout');
        }
         
    } 

    public function pendingQuiz($quizId)
    {
        if($this->session->userdata('is_logged_in') == TRUE ) 
           {              
                $user_id = $this->session->userdata('user_id');
                
                 redirect(base_url().'quizzes/startQuiz/'.$quizId);      


            } 
        else 
        {
           redirect(base_url().'userAuth/logout');
        }         
    } 


    public function setQuiz($quizId)
    {
        if($this->session->userdata('is_logged_in') == TRUE ) 
            {                 
                $user_id = $this->session->userdata('user_id');
                $this->load->model('quizzesModel');
                $result = $this->quizzesModel->setQuizDB($quizId, $user_id);   
            } 
        else 
        {
           redirect(base_url().'userAuth/logout');
        }         
    } 


    public function startQuiz($quizId)
    {
        if($this->session->userdata('is_logged_in') == TRUE ) 
            {                 
                $user_id = $this->session->userdata('user_id');
                $this->load->model('quizzesModel');
                $result = $this->quizzesModel->startQuizDB($quizId, $user_id);
                $data['quizQuestionData'] = $result['quizQuestionData'];
                $data['quizData'] = $result['quizData'];
                $data['numQuestion'] = $result['numQuestion'];
                $data['attempts'] = $result['attempts'];
                $data['quizId'] = $quizId;
                $data['userId'] = $user_id;
                $this->load->view('users/head', $data);

                if($this->session->userdata('is_logged_in') == TRUE)
                {
                    $result2 =  $this->userModel->loginUserProfile($user_id); 
                    $data['userData'] = $result2['userData']; 
                    $data['profilePic'] = $result2['profilePic']; 
                    $this->load->view('users/header', $data);   
                }       
           
                $this->load->view('quiz/startNewQuiz', $data); 
                $this->load->view('users/footer', $data); 
                $this->load->view('quiz/startQuizJs');

            } 
        else 
        {
           redirect(base_url().'userAuth/logout');
        }
         
    }         

    public function questinNumbers(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $quizId = $this->input->post('quiz_id');           
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->questinNumbersDB($quizId);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }

    public function checkQesAns(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id = $this->input->post('user_id');
            $questionId = $this->input->post('questionId');
            $attempts = $this->input->post('attempts');           
            $quiz_id = $this->input->post('quiz_id'); 
            $this->load->model('quizzesModel');
            $this->quizzesModel->checkQesAnsDB($user_id, $questionId, $attempts, $quiz_id);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function initialQuestion(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id = $this->input->post('user_id');
            $quiz_id = $this->input->post('quiz_id');
            $attempts = $this->input->post('attempts');  
            $startQueId = $this->input->post('startQueId');           
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->initialQuestionDB($user_id, $quiz_id, $attempts, $startQueId);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function nextQuestion(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id  = $this->input->post('user_id');
            $quiz_id  = $this->input->post('quiz_id');
            $attempts = $this->input->post('attempts');  
            $q_id     = $this->input->post('q_id');  
            $answer   = $this->input->post('answer');
            $q_order  = $this->input->post('q_order');                      
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->nextQuestionDB($user_id, $quiz_id, $attempts, $q_id, $answer, $q_order);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function nextQuestionLoad($user_id, $quiz_id, $attempts, $startQueId){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {   
            $this->load->model('quizzesModel');
            $this->quizzesModel->initialQuestionDB($user_id, $quiz_id, $attempts, $startQueId);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }   


    public function goBackQuestion(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id  = $this->input->post('user_id');
            $quiz_id  = $this->input->post('quiz_id');
            $attempts = $this->input->post('attempts');  
            $q_id     = $this->input->post('q_id');  
                      
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->goBackQuestionDB($user_id, $quiz_id, $attempts, $q_id);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


    public function resetQuiz(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id  = $this->input->post('user_id');
            $quiz_id  = $this->input->post('quiz_id');
            $attempts = $this->input->post('attempts'); 
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->resetQuizDB($user_id, $quiz_id, $attempts);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }


     public function endQuiz(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id  = $this->input->post('user_id');
            $quiz_id  = $this->input->post('quiz_id');
            $attempts = $this->input->post('attempts'); 
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->endQuizDB($user_id, $quiz_id, $attempts);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }
   


   public function result(){
    
    $quiz_id = $this->input->get('quizID');
    $attempts = $this->input->get('attempts');
    $user_id = $this->input->get('user_id');
        
         $this->load->model('quizzesModel');
         $result1 = $this->quizzesModel->resultCreate($user_id, $quiz_id, $attempts);
         $data['quizResult'] = $result1['quizResult']; 
         $this->load->view('users/head', $data);

        if($this->session->userdata('is_logged_in') == TRUE){
          $result1 =  $this->userModel->loginUserProfile($user_id); 
          $data['userData'] = $result1['userData']; 
          $data['profilePic'] = $result1['profilePic']; 
          $this->load->view('users/header', $data);   
        }

        $this->load->view('quiz/quizResult', $data);
        $this->load->view('users/footer', $data);  
          $this->load->view('quiz/quizResultJs', $data);

   }


   public function enrollQuiz($quiz_id){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id  = $this->session->userdata('user_id');                       
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->enrollQuizDB($user_id, $quiz_id);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }

    

    public function resultChart(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
        {                     
            $user_id  = $this->session->userdata('user_id'); 
            $quiz_id = $this->input->post('quiz_id');                      
           
            $this->load->model('quizzesModel');
            $this->quizzesModel->resultChartDB($user_id, $quiz_id);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Error!'
                 );

            echo json_encode($data); 
        }         
    }

    public function fullresult(){ 
        
       if($this->session->userdata('is_logged_in') == TRUE ) 
        {

        $data['user_id']  = $this->session->userdata('user_id');
        $data['quiz_id']  = $this->input->get('qz_id');
        $data['attempts'] = $this->input->get('attempts');
         $data['qz_name'] = $this->input->get('qz_name');


        $this->load->view('users/head', $data);
        $this->load->view('quiz/fullResult', $data);
        $this->load->view('users/footer', $data);  
        $this->load->view('quiz/fullResultJs', $data); 

        }  
    }


    public function fullresultCreate(){ 

        $quiz_id  = $this->input->post('quiz_id');
        $user_id  = $this->input->post('user_id');
        $attempts = $this->input->post('attempts');
        
         $this->load->model('quizzesModel');
         $this->quizzesModel->fullresultCreateDB($user_id, $quiz_id, $attempts);
         
    }


    public function questionAnswers(){ 

        $q_id  = $this->input->post('q_id');
        
         $this->load->model('quizzesModel');
         $this->quizzesModel->questionAnswersDB($q_id);
         
    }


     public function userAnswers(){ 

        $q_id  = $this->input->post('q_id');
        $quiz_id  = $this->input->post('quiz_id');
        $user_id  = $this->input->post('user_id');
        $attempts = $this->input->post('attempts');
        
         $this->load->model('quizzesModel');
         $this->quizzesModel->userAnswersDB($q_id, $user_id, $quiz_id, $attempts);
         
    }

    public function myresult($quiz_id){ 
        
        if($this->session->userdata('is_logged_in') == TRUE)
        {  
        
        
        $this->load->view('users/head');        
        $user_id = $this->session->userdata('user_id');
        $result1 =  $this->userModel->loginUserProfile($user_id); 
        $data['userData'] = $result1['userData']; 
        $data['profilePic'] = $result1['profilePic']; 
        $this->load->view('users/header', $data);   
       

        $user_id = $this->session->userdata('user_id');
        $result =  $this->quizzesModel->quizDataDB($quiz_id, $user_id); 
        $data['quizData'] = $result['quizData']; 
        $data['enrollCecked'] = $result['enrollCecked'];     

        $this->load->view('quiz/myresult', $data);
        $this->load->view('users/footer', $data);  
        $this->load->view('quiz/myresultJs', $data);

         }
         
    }


    public function myresultData(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE)
        {         
            $quiz_id = $this->input->post('quiz_id');
            $this->load->model('quizzesModel');
            $result2 = $this->quizzesModel->myresultDB($quiz_id);        
        }
         
    }
    
     public function enrollKey($quiz_id)
    {  
       if($this->session->userdata('is_logged_in') == TRUE)
        {        
            $this->load->view('users/head');        
            $user_id = $this->session->userdata('user_id');
            $result1 =  $this->userModel->loginUserProfile($user_id); 
            $data['userData'] = $result1['userData']; 
            $data['profilePic'] = $result1['profilePic']; 
            $this->load->view('users/header', $data);           
            $data['quizID'] = $quiz_id;
            $user_id = $this->session->userdata('user_id');
            $result =  $this->quizzesModel->quizDataDB($quiz_id, $user_id); 
            $data['quizData'] = $result['quizData']; 
            $data['enrollCecked'] = $result['enrollCecked'];     

            $this->load->view('quiz/enrollKey', $data);
            $this->load->view('users/footer', $data);  
            

        }  

        
    }
    
    public function keyCheck($quiz_id)
    {
        $ekey = $this->input->post('eKey');
        $user_id = $this->session->userdata('user_id');  
         $result =  $this->quizzesModel->keyCheckDB($quiz_id, $ekey, $user_id); 
    } 

    
    public function createNewQuiz(){

        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('quiz_name', 'Quiz name', 'required');
            $this->form_validation->set_rules('quizcat', 'Quiz Category', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $errors = validation_errors();
                echo json_encode(['errorMsg'=>$errors]);   
            }
            else
            {
                $result =  $this->quizzesModel->createQuizDB(); 
               
                echo json_encode(['status' => 1, 'quizId' => $result, 'successMsg'=>'Quiz has been created successfully']);  
            }
        }
    }

	

}

?>