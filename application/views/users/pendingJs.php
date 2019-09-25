<script type="text/javascript">
	$(document).ready(function() {

		$('#quizsearch').select2({

				    placeholder: 'Search Quiz',
				    allowClear: true,
			    ajax: {
			        url: "<?php echo base_url();?>quizzes/searchList",
			        dataType: 'json',
			        tyle:'GET',
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

	});	
</script>

<script type="text/javascript">	

	  function pendingQuizzData(key)
	  {	
        var user_id = Number('<?= $userData[0]->u_id; ?>');

	        $.ajax({
			    url:'<?= base_url() ?>quizzes/userPendingQuiz',
			    type: "POST",
			    async: false, 
			    data:{key: key, user_id: user_id},
			    success: function (data)
			        {
	                    totle = data;		             	
			        }, 
               

			});
			  
            return totle;
	  }
	
	
</script>

<script type="text/javascript">
    function pendingQuizzView(Keyword)
	  {	
         
        var viewData = pendingQuizzData(Keyword);
        var Obj = JSON.parse(viewData);
        var HtmlView ="";
	        if(Obj.status !==  0)
	        { 
	           HtmlView +='<div class="row product-list">';
	          for(var i in Obj) 
	          {
	            HtmlView +='<div class="col-md-4"><a href="<?= base_url() ?>quizzes/start/'+Obj[i].qz_id+'"  data-toggle="tooltip" data-placement="top" title="'+Obj[i].qz_name+'"><section class="panel"><div class="pro-img-box">';
	               
	               if(Obj[i].qz_into_image !=""){
	               		HtmlView +='<img src="<?= base_url() ?>uploads/profile_pic/'+Obj[i].qz_into_image+'" alt="" width="100%" max-heght="100px"></div>';  
	               }
	               else
	               {
	               	   HtmlView +='<img src="<?= base_url() ?>public/img/default.png" alt="" width="100%" max-heght="100px"></div>';
	               }	               

	               HtmlView +='<div class="text-center quiz-box" style="height: 70px;"><h6>'+Obj[i].qz_name.substring(0,50)+'</h6>';               

	            HtmlView +='</div></a></section></div>'; 	

	          }     

	          	HtmlView +='</div>';  

	         $('#pqdLoad').html(HtmlView);
	        }

	        else{

	           $('#pqdLoad').html('No Results!');

	        }
         
        
	 
    }
</script>

<script type="text/javascript">
	$(document).ready(function() {
     
     	 $('#pendingQuiz').keyup( function() 
     	 {
            var keyword =  $(this).val();
                 pendingQuizzView(keyword);
     	 });

	});

</script>


<script type="text/javascript">
	$(document).ready(function() {

		pendingQuizzView();

		
        
		$('#pendingearch').select2({

				    placeholder: 'Search Quiz',
				    allowClear: true,
			    ajax: {
			        url: "<?php echo base_url();?>quizzes/searchList",
			        dataType: 'json',
			        tyle:'GET',
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

	});
	
</script>


<?php //profile and cavor ?>

    <script type="text/javascript">

        $("#prodeletePostImage").click(function() {
		    
		            	 $("#propicImage").html('');
                         $('#proedituploadfileId').val('');
                         $('#prodeleteButton').hide();
                         $('#prouploadNewImage').fadeIn('slow'); 		     
		                });       
	</script>

	<script type="text/javascript">

		$(document).ready(function() {

			$(document.body).on('click', '#profileUpdate', function(){ 	
			    
			    $('#changeProfilePictureModal').modal({show:true});

			 });       

		});
	</script>


	<script type="text/javascript">

	        $("#profilePic").change(function() {
			    
			    var fileupload = $('input[name=profilePic]');
	             var fileToUpload = fileupload[0].files[0];
			      if(fileToUpload !="undefined"){

			      	var formData = new FormData();
			      	formData.append("file", fileToUpload);
			      }
			   
			         
			       $.ajax({
			            url:'<?= base_url() ?>post/uploadProfilePic',
			            secureuri:false,
			            type: "POST",
			            fileElementId:'file',
			            data:formData,
			            processData: false,
			            contentType: false,
			            success: function (data){

			                var JSONObject = JSON.parse(data);

			               

			              if(JSONObject['status'] == 1){ 
	                       
	                         $("#proedituploadfileId").val(JSONObject['fimeName']);
	                         $('#prouploadNewImage').hide();
	                         $('#prodeleteButton').fadeIn('slow'); 
	                         $("#propicImage").html('<img src="<?=base_url() ?>uploads/profile_pic/'+JSONObject['fimeName']+'" >');
	                        

			              }
			              else{
			                 
			              }                        
			               
			            
			              
			            },
			        });
			      });       
	</script>


	<script type="text/javascript">

	        $("#updateProfilePic").click(function() {

	        	var proedituploadfileId =  $("#proedituploadfileId").val();
	        	
	        	$.ajax({
	                url: '<?= base_url() ?>post/updateProfilePic',
	        		type:"post",
	        		data:{proedituploadfileId : proedituploadfileId},

	        		 success: function (data){
	        		   var JSONObject = JSON.parse(data);
	     		     
	                    if(JSONObject['status'] == 1){                      

	                      $('#profilePic').val('');
	                      $("#profielPicError").hide();
	                      $("#profielPicimage").html('<img src="<?=base_url() ?>uploads/profile_pic/'+proedituploadfileId+'" >');                     
	                      $('#changeProfilePictureModal').modal('hide');
	                       loadpostlis(); 

	                   }

	                   else {
	                      $("#profielPicError").fadeIn('slow');
	                   	  $("#profielPicError").html(JSONObject['message']);
	                   }

	        		 }

	        	});
			    
			        	     
			});       
	</script>

	
<?php // cover picture // ?>

	<script type="text/javascript">

	        $("#caverdeletePostImage").click(function() {
			    
			            	 $("#caverpicImage").html('');
	                         $('#caveredituploadfileId').val('');
	                         $('#caverdeleteButton').hide();
	                         $('#caveruploadNewImage').fadeIn('slow'); 		     
			                });       
	</script>

	<script type="text/javascript">

		$(document).ready(function() {

			$(document.body).on('click', '#caverUpdate', function(){ 	
			    
			    $('#changeCaverPictureModal').modal({show:true});

			 });       

		});
	</script>

	<script type="text/javascript">

	        $("#caverPic").change(function() {
			    
			    var fileupload = $('input[name=caverPic]');
	            var fileToUpload = fileupload[0].files[0];
			      if(fileToUpload !="undefined"){

			      	var formData = new FormData();
			      	formData.append("file", fileToUpload);
			      }		   
			         
			       $.ajax({
			            url:'<?= base_url() ?>post/uploadCaverPic',
			            secureuri:false,
			            type: "POST",
			            fileElementId:'file',
			            data:formData,
			            processData: false,
			            contentType: false,
			            success: function (data){

			                var JSONObject = JSON.parse(data);

			               

			              if(JSONObject['status'] == 1){ 
	                       
	                         $("#caveredituploadfileId").val(JSONObject['fimeName']);
	                         $('#caveruploadNewImage').hide();
	                         $('#caverdeleteButton').fadeIn('slow'); 
	                         $("#caverpicImage").html('<img src="<?=base_url() ?>uploads/caver_pic/'+JSONObject['fimeName']+'" >');
	                        
			              }
			              else
			              {
			                 
			              }                        
			               
			            
			              
			            },
			        });
			      });       
	</script>

	<script type="text/javascript">

	        $("#updateCaverPic").click(function() {

	        	var caveredituploadfileId =  $("#caveredituploadfileId").val();
	        	
	        	$.ajax({
	                url: '<?= base_url() ?>post/updateCaverPic',
	        		type:"post",
	        		data:{caveredituploadfileId : caveredituploadfileId},

	        		 success: function (data){
	        		   var JSONObject = JSON.parse(data);
	     		     
	                    if(JSONObject['status'] == 1){                      

	                      $('#caverPic').val('');
	                      $("#caverPicError").hide();
	                      $(".fb-timeline-img").html('<img src="<?=base_url() ?>uploads/caver_pic/'+caveredituploadfileId+'" heght="320px" />');                     
	                      $('#changeCaverPictureModal').modal('hide');
	                      
	                   }

	                   else {
	                      $("#caverPicError").fadeIn('slow');
	                   	  $("#caverPicError").html(JSONObject['message']);
	                   }

	        		 }

	        	});
			    
			        	     
			}); 	

			$(function () {
       $('[data-toggle="tooltip"]').tooltip()
        }); 
	      
	</script>


