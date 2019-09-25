<script type="text/javascript">

$(document).ready(function() {    
    
    $("#addNewQuizModalOpen").click(function() {      
        $('#newQuizModal').modal('show');
    });
    
    $('#quizcat').select2({

            placeholder: 'Search by Category',
            allowClear: true,
            ajax: {
                url: "<?php echo base_url();?>quizzes/quizcat",
                dataType: 'json',
                type:'GET',
                data: function (term, page) {
                    return {
                        q: term,			                     
                    };
                },
                results: function (data, page) {
                    return { results: data };
                },
            }
    });
   
    $('#medium').select2({
        placeholder: 'Medium',
        allowClear: true,
    });

    $("body #closeBtn").click(function() {     
        $('#newQuizModal').modal('hide');
        location.reload();
    });


    $("#createQuizBtn").click(function() {             
        var data = $('#quizForm').serialize();
        $('#createQuizBtn').attr('disabled','disabled');
        $.ajax({
		            url:'<?= base_url() ?>quizzes/createNewQuiz',		            
		            type: "POST",		            
		            data:  data,
		            dataType: 'json',
		            success: function (data){
		            var JSONObject = data;      
		              if(JSONObject['status'] == 1 && JSONObject['quizId'] !=''){   
                         $('#newQuizError').hide();   
                         $("#newQuizSuccess").fadeIn('slow');
                         $("#newQuizSuccess").html( JSONObject['successMsg'] );  
                         var url = '<?= base_url() ?>quizzes/page/'+JSONObject['quizId'];
                         window.location.href = url;   
		              }
		              else{
                        $('#createQuizBtn').removeAttr('disabled');
                        $("#newQuizSuccess").hide();
		                $("#newQuizError").fadeIn('slow');
                        $("#newQuizError").html( JSONObject['errorMsg'] );     

                       
		              }             
		              
		            },    

		        });



    });  
     
    

});	


	
</script>