 <script type="text/javascript">
 	$(document).ready(function(){

 	var quiz_id = <?= $quiz_id; ?>;
 	  var user_id = <?= $user_id; ?>;
 	  var attempts = <?= $attempts; ?>;

     
      $.ajax({
		    url:'<?= base_url() ?>quizzes/fullresultCreate',
		    type: "POST",
		    async: false, 
		    data:{quiz_id: quiz_id, user_id: user_id, attempts: attempts},
		    success: function (data)
		        {
                    totle = data;	

		        }, 
		});
     if(totle !== 0){
       var Obj = JSON.parse(totle);
       
       var quizHtml = "";
       	for (var i in Obj) {
              
            var q_id = Obj[i].q_id;
            quizHtml +='<strong>['+Obj[i].name+']</strong>';
            quizHtml +=Obj[i].questiontext;

            	$.ajax({
		   			url:'<?= base_url() ?>quizzes/questionAnswers',
				    type: "POST",
				    async: false, 
				    data:{q_id: q_id},
				    success: function (data)
				        {
		                    answers  = data;	

				        }, 
				});

              		var AObj = JSON.parse(answers);
                  	for (var j in AObj) 
                  	{
	                  	 
                       

                       if(AObj[j].answer !==""){
	                        quizHtml += AObj[j].answer_order +'. '+AObj[j].answer+'<br/> ';
	                  	  }

                        if(AObj[j].fraction == 1){

                        quizHtml += '<div class="pull-right"><div  style="color:#fff; background:#a1a1a1; padding:8px; border-radius:8px; font-weight:600" >Correct Answer: '+AObj[j].answer_order+'</div></div>';    
                      }

                  	  	 

                  }

                  $.ajax({
		   			url:'<?= base_url() ?>quizzes/userAnswers',
				    type: "POST",
				    async: false, 
				    data:{q_id: q_id, quiz_id: quiz_id, user_id: user_id, attempts: attempts},
				    success: function (data)
				        {
		                    useranswer   = data;	

				        }, 
					});

                    var UAObj = JSON.parse(useranswer); 

                    console.log(UAObj.fraction);

                    if(useranswer !== 0){


                    if(UAObj.fraction == 1){

                           quizHtml += '<div class="pull-right"><div style="color:#fff; background:#6dbb4a; padding:8px; border-radius:8px; font-weight:600" >User Answer: '+UAObj.user_answer+'</div></div>';
                    } 
                    else
                    {

                          quizHtml += '<div class="pull-right"><div style="color:#fff; background:#ff6c60; padding:8px; border-radius:8px; font-weight:600" >User Answer: '+UAObj.user_answer+'</div></div>';
                    }

                    }

                    else {

                            quizHtml += '<div class="pull-right"><div style="color:#fff; background:#ff6c60; padding:8px; border-radius:8px; font-weight:600" >User Answer:  - </div></div>';

                    }


            
            quizHtml +='<hr/><p></p>';


       	}

       	$('#quizData').html(quizHtml);

     }
      
    });

 </script>
