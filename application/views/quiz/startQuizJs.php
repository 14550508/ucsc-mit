<script type="text/javascript">

$(document).ready(function(){

	var user_id = Number('<?= $userId; ?>');
	var quiz_id = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>');     

	$.ajax({
		url:'<?= base_url() ?>quizzes/questinNumbers/',
		type: "post",		   
		data:{user_id : user_id, quiz_id : quiz_id},
		async: false,
			success: function (data)
			{ 
	           totalRow = data;
			}, 


	});
     
     
	loadQuestionNumbers(totalRow);
	

});


function loadQuestionNumbers(totalRow){

	var user_id = Number('<?= $userId; ?>');
	var quiz_id = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>');   
    
      if(totalRow !== 0){
     		var Obj = JSON.parse(totalRow);
     		var htmlNumbers = '';
            var startQueId = Obj[0].q_id;
				for (var i in Obj) 
				{   var questionId = Obj[i].q_id; 
				    
					$.ajax({
						url:'<?= base_url() ?>quizzes/checkQesAns/',
						type: "post",		   
						data:{user_id : user_id, questionId : questionId, attempts: attempts, quiz_id: quiz_id},
						async: false,
						 beforeSend: function(){
				            $('#loader-icon').show();
				            },
				            complete: function(){
				            $('#loader-icon').fadeOut('slow');
				            },
						success: function (data)
						{ 
				            answer 	= data;				                  
						}, 
					});
                    
                    var Answer = JSON.parse(answer);
					var number = Number(i) +1;
					if( number < 10)
					{                        
                        number = "0" + number;
					}


                    if(Answer.status == 0){

                        htmlNumbers += '<a class="btn btn-default questionId" id="'+Obj[i].q_id+'" style="margin:5px"> '+ number+ '</a>';
                     }
                     else{
                          if(Answer.user_answer == 0){

                              htmlNumbers += '<a class="btn btn-warning questionId" id="'+Obj[i].q_id+'" style="margin:5px"> '+ number+ '</a>';
                          }
                          else{

                          	  htmlNumbers += '<a class="btn btn-success questionId" id="'+Obj[i].q_id+'" style="margin:5px"> '+ number+ '</a>';
                          }
                     	
                     }
					
					
				}

				$('#questionNumber').html(htmlNumbers);

				
				initialQuestion(startQueId);
     		}      
}

function initialQuestion(startQueId){

	var user_id = Number('<?= $userId; ?>');
	var quiz_id = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>');

	$.ajax({
		url:'<?= base_url() ?>quizzes/initialQuestion/',
		type: "post",		   
		data:{user_id : user_id, quiz_id : quiz_id, attempts: attempts, startQueId: startQueId},
		async: false,
			success: function (data)
			{ 
	           question = data;
			}, 
		});
 

	var QObj = JSON.parse(question);
      
      
   
	   $('#questionBody').html(QObj.q_text);
	   $('#QuestionName').html(QObj.q_name);
	  
	  

        var htmlAns = ''; 
        $("#quesOder").val(QObj.q_order);	   
    	if(QObj.status == 0){
	    	for (i=0; i < QObj.q_answers.length; i++)
		    {     	
		        var answerAR = QObj.q_answers[i];
		        
		        htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-default" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	   
		    } 
    	}
    	else
    	{ 

    		for (i=0; i < QObj.q_answers.length; i++)
		    {     	
		        var answerAR = QObj.q_answers[i];
		        if(answerAR.answer_order == QObj.user_answer ){
                  
                  $("#selectAnser").val(QObj.user_answer);
                  
                  htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-success" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button>'; 	

		        }
		        else{
                   htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-default" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	

		        }  
		           
		    } 



    	}
            
        

        $('#questionans').html(htmlAns);
       
        $('#thisQues').val(QObj.q_id);

}

$(document.body).on('click', '.selectAns', function(){ 
    var id = $(this).attr('id');
    var quesId = Number($('#thisQues').val());

    $('#questionans .selectAns').removeClass('btn-success');
    $('#questionans .selectAns').addClass('btn-default');
    $(this).removeClass('btn-default');
    $(this).addClass('btn-success');
    $("#selectAnser").val(id);

    $('#questionNumber #'+quesId).css({'border-bottom': 'none'});	 
	$('#questionNumber #'+quesId).removeClass('btn-warning');
	$('#questionNumber #'+quesId).removeClass('btn-default'); 
	$('#questionNumber #'+quesId).addClass('btn-default');   
  
  
});


$('.nextQus').click(function(){

	var user_id  = Number('<?= $userId; ?>');
	var quiz_id  = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>');

    var q_id     = $("#thisQues").val();   
    var answer   = $("#selectAnser").val();
    var q_order  = $("#quesOder").val();

     $('#'+q_id).css({'border-bottom': 'none'});

    if(answer =="")
    {
       $('#questionNumber #'+q_id).removeClass('btn-success');
       $('#questionNumber #'+q_id).removeClass('btn-info');
       $('#questionNumber #'+q_id).css({'border-bottom': 'none'});
       $('#questionNumber #'+q_id).addClass('btn-warning');
      
    }
    else
    {

      $('#questionNumber #'+q_id).removeClass('btn-warning');
	  $('#questionNumber #'+q_id).removeClass('btn-default'); 
	   $('#questionNumber #'+q_id).removeClass('btn-info');
	  $('#questionNumber #'+q_id).addClass('btn-success'); 

    }  
	 
 
    $.ajax({
		url:'<?= base_url() ?>quizzes/nextQuestion/',
		type: "post",		   
		data:{user_id : user_id, quiz_id : quiz_id, attempts: attempts, q_id: q_id, answer: answer, q_order: q_order},
		async: false,
		    beforeSend: function(){
		        $('#loader-icon-quas').show();
		        },
		    complete: function(){
		        $('#loader-icon-quas').hide();
		        },
			success: function (data)
			{ 
	           question = data;
	          
			}, 
		});
          
         var QObj = JSON.parse(question);
    
    if(QObj.q_status == 1){

    	 $("#selectAnser").val('');
  
       $('#questionBody img').css('width', '99%');
	   $('#questionBody').html(QObj.q_text);
	   $('#QuestionName').html(QObj.q_name);
	   $('#questionNumber #'+QObj.q_id).css({'border-bottom': 'solid 3px #39b2a9'});
	   

        var htmlAns = ''; 
          $("#quesOder").val(QObj.q_order);	   
    	if(QObj.status == 0){
	    	for (i=0; i < QObj.q_answers.length; i++)
		    {     	
		        var answerAR = QObj.q_answers[i];
		        
		        htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-default" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	   
		    } 
    	}
    	else
    	{ 
             
    		for (i=0; i < QObj.q_answers.length; i++)
		    {     	
		        var answerAR = QObj.q_answers[i];
		        if(answerAR.answer_order == QObj.user_answer ){
                  
                  $("#selectAnser").val(QObj.user_answer);
                
                  htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-success" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	

		        }
		        else{
                   htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-default" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	

		        }  		           
		    }

    	}
            
       
        $('#questionans').html(htmlAns);
         $('#thisQues').val(QObj.q_id);


    }else{


    	$('#nextButton').addClass('disabled');
    }  
  
});


$(document.body).on('click', '#questionNumber .questionId', function(){ 

	$('#questionNumber a' ).css({'border-bottom': 'solid 1px #b0b5b9'});

    var q_id = $(this).attr('id');

    var user_id  = Number('<?= $userId; ?>');
	var quiz_id  = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>');

    
    $.ajax({
		url:'<?= base_url() ?>quizzes/goBackQuestion/',
		type: "post",		   
		data:{user_id : user_id, quiz_id : quiz_id, attempts: attempts, q_id: q_id},
		async: false,
			success: function (data)
			{ 
	           question = data;
	          
			}, 
		});
          
         var QObj = JSON.parse(question);
    
    if(QObj.q_status == 1){

    	 $("#selectAnser").val('');
  
       $('#questionBody img').css('width', '99%');
	   $('#questionBody').html(QObj.q_text);
	   $('#QuestionName').html(QObj.q_name);
	   $('#'+QObj.q_id).css({'border-bottom': 'solid 3px #39b2a9'});
	   

        var htmlAns = ''; 
          $("#quesOder").val(QObj.q_order);	   
    	if(QObj.status == 0){
	    	for (i=0; i < QObj.q_answers.length; i++)
		    {     	
		        var answerAR = QObj.q_answers[i];
		        
		        htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-default" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	   
		    } 
    	}
    	else
    	{ 
             
    		for (i=0; i < QObj.q_answers.length; i++)
		    {     	
		        var answerAR = QObj.q_answers[i];
		        if(answerAR.answer_order == QObj.user_answer ){
                  
                  $("#selectAnser").val(QObj.user_answer);
                
                  htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-success" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	

		        }
		        else{
                   htmlAns += '<button type="button" id="'+answerAR.answer_order+'" class="selectAns btn btn-default" style="margin:5px"><strong>'+answerAR.answer_order+' '+ answerAR.answer+'</strong></button> '; 	

		        }  
		           
		    } 



    	}
            
       
        $('#questionans').html(htmlAns);
         $('#thisQues').val(QObj.q_id);


    }else{


    	$('#nextButton').addClass('disabled');
    }

   

    $('#questionNumber #'+q_id).css({'border-bottom': 'solid 3px #39b2a9'});
	
  
  
});

$(document).ready(function(){

	$(document.body).on('click', '#resetQuiz', function(){ 

	var user_id = Number('<?= $userId; ?>');
	var quiz_id = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>'); 

	bootbox.confirm({
	    message: "Are you sure do you want to reset this quiz ?",
	    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn-success'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn-danger'
	        }
	    },
	    callback: function (result) {
	        
			    	if(result == true){

			     	 $.ajax({
						url:'<?= base_url() ?>quizzes/resetQuiz/',
						type: "post",		   
						data:{user_id : user_id, quiz_id : quiz_id, attempts : attempts},
						async: false,
							success: function (data)
							{ 
					           deleteDB = data;
							}, 
			          
					});   
			    	 location.reload();
			     }      
	   		}
		});  

   });

});


$(document).ready(function(){

	$(document.body).on('click', '#endQuiz', function(){ 

	
    $('#endQuiz').addClass('disabled');
	var user_id = Number('<?= $userId; ?>');
	var quiz_id = Number('<?= $quizId; ?>');
	var attempts = Number('<?= $attempts; ?>'); 
   
	bootbox.confirm({
	    message: "Are sure do you want to finish this quiz ?",
	    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn-success'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn-danger'
	        }
	    },
	    callback: function (result) {
	        
			    	if(result == true){

			     	 $.ajax({
						url:'<?= base_url() ?>quizzes/endQuiz/',
						type: "post",		   
						data:{user_id : user_id, quiz_id : quiz_id, attempts : attempts},
						async: false,
							success: function (data)
							{ 
					           deleteDB = data;
							}, 
			          
					});
                     
                     var Obj = JSON.parse(deleteDB);
                      console.log(Obj.status);
                     if(Obj.status == 1){

                          window.location = '<?= base_url() ?>quizzes/result/?quizID='+quiz_id+'&attempts='+attempts+'&user_id='+user_id;
                     }
			    	 
			     }  
			     else{
                     $('#endQuiz').removeClass('disabled');

			     }    
	   		}
		});  

   });

});

 
</script>