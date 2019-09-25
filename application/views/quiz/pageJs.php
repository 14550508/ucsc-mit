<script type="text/javascript">

function commentView(comment, comPostId, comFname, comLname, comProfilePic, commentDateAge, commentId, commentBy, user_id, comUname)
{
  
	var logedUser = <?= $this->session->userdata('user_id'); ?>;	
        
        htmlStr ='<div class="fb-status-container fb-border fb-gray-bg" >';
        htmlStr +='<li id="rowC_'+commentId+'">';

    if(comProfilePic !== "") {
        htmlStr +='<a href="#" class="cmt-thumb"><img src="<?= base_url(); ?>uploads/profile_pic/'+comProfilePic+'" alt=""></a>';
    }
    else
    {
        htmlStr +='<a href="#" class="cmt-thumb"><img src="<?= base_url(); ?>uploads/profile_pic/empty.png" alt=""></a>';        
    }
        

        htmlStr +='<div id="rowCE_'+commentId+'"><div class="cmt-details"><a href="<?= base_url(); ?>students/'+comUname+'">'+comFname+' '+comLname+'</a>';
        htmlStr +='<span id="commentText_'+commentId+'"> '+comment+'</span><p>'+commentDateAge+' ago - <a id='+comPostId+' href="#" class="like-link">Like</a></p>';

       htmlStr +='<div id="editCommentText_'+commentId+'" style="display:none;"><div class="cmt-form"><textarea class="form-control editcommentInput_'+commentId+'" id="'+commentId+'" name="" required></textarea></div></div><span class="pull-right" id="tools">';

        htmlStr +='<div class="dropdown"><button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span style="color:#ccc;" class="fa fa-chevron-down"></span></button>';
        htmlStr +='<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';

    if(logedUser == commentBy || user_id == logedUser) {    	

    	htmlStr +='<li><a style="display: show;"  class="deleteComment" id="'+commentId+'" ><i class="fa fa-times"> </i> Delete</a></li>';
             
    }
    if(logedUser == commentBy) {
        htmlStr +='<li><a style="display: show;"  class="editComment" id="'+commentId+'" ><i class="fa fa-pencil"> </i> Edit</a></li>';
    }

    htmlStr +='</ul></span></div><br/>';
	

	htmlStr +=''; 
    htmlStr +='</div></li>';          
                                          
                                     
	return htmlStr;
}

function timeLineView(stp_profile_pic, stp_fname, stp_lname, post_text, post_image, datetime, user_id, post_id, username) {
	   
	   var user_sess_id = "<?= $this->session->userdata('user_id') ?>";
       var titmeShow = timeSince(datetime);
        htmlStr ="";
		htmlStr += '<section class="panel" id="row_'+post_id+'">';
		htmlStr += '<div class="panel-heading"><div class="pull-right">';
        htmlStr +='<div class="dropdown"><button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-chevron-down"></span></button>';
        htmlStr +='<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';
        

        if(user_sess_id == user_id) {

        htmlStr +='<li><a class="'+post_id+'" id="edit_post" ><i class="fa fa-pencil"> </i> Edit</a></li>';
        htmlStr +='<li><a class="'+post_id+'" id="delete_post"  ><i class="fa fa-times"> </i> Delete</a></li>';

    	}
    	
        htmlStr +='</ul>';
		htmlStr +='</div></div><div class="clearfix"></div></div>';

         if(stp_profile_pic !== "") 
         {
        htmlStr +='<div class="panel-body"><div class="fb-user-thumb"><img src="<?= base_url(); ?>uploads/profile_pic/'+ stp_profile_pic+'" alt=""></div>';
	    }
	    else
	    {
	    htmlStr +='<div class="panel-body"><div class="fb-user-thumb"><img src="<?= base_url(); ?>uploads/profile_pic/empty.png" alt=""></div>';        
	    }

		htmlStr += '<div class="fb-user-details"><h3><a href="<?= base_url(); ?>students/'+username+'" class="#">'+stp_fname+'  '+stp_lname+'</a></h3><p>';                               
        htmlStr += titmeShow;
		htmlStr += '  age</p></div><div class="clearfix"></div>';
		htmlStr +='<p class="fb-user-status">' +post_text+'<br/>';
		if(post_image !=""){                                          
        	htmlStr +='<hr/><img src="<?= base_url(); ?>uploads/post/'+ post_image+'" width="100%"><br/>'; 
		}
		htmlStr +='</p>';
		htmlStr +=' <div class="fb-status-container fb-border"><div class="fb-time-action"></div></div>';
		

		return htmlStr;    
}

function timeSince(datetime) {

    var seconds = Math.floor((new Date() - datetime) / 1000);
    var interval = Math.floor(seconds / 31536000);

    if (interval > 1) {
        return interval + " years";
    }
    interval = Math.floor(seconds / 2592000);
    if (interval > 1) {
        return interval + " months";
    }
    interval = Math.floor(seconds / 86400);
    if (interval > 1) {
        return interval + " days";
    }
    interval = Math.floor(seconds / 3600);
    if (interval > 1) {
        return interval + " hours";
    }
    interval = Math.floor(seconds / 60);
    if (interval > 1) {
        return interval + " minutes";
    }
    return Math.floor(seconds) + " seconds";
}


$(document).ready(function() {

	$.ajax({
		    url:'<?= base_url() ?>quizzes/totlaPostData',
		    type: "POST",
		    async: false, 
		    success: function (data)
		        {
                    totle = data;		             	
		        }, 
		});

		    var currentPage = 1;
	        loadpostlis(currentPage);     
     		var currentPage = 2;

      	$(window).scroll(function (){      	
      	
		  if($(window).scrollTop() >= $(document).height() - $(window).height() -1)
		  {         
		        var perpage = 8;
		        var numofPages = Math.ceil(totle/perpage);	  
				var start = ((currentPage * perpage) - perpage);
			
				if(currentPage <= numofPages)
				{   
				       
				   loadpostlisNew(currentPage);	
				   currentPage ++;	

				}		
			
		  }

    	});
});

function loadpostlisNew(currentPage){

	 var quizId = Number('<?= $quizData[0]->qz_id; ?>');
                   
	      
		       $.ajax({
		            url:'<?= base_url() ?>quizzes/getPostData',
		            type: "POST",
		            data:{pageNumr: currentPage, quizId: quizId},
		            beforeSend: function(){
		            $('#loader-icon').show();
		            },
		            complete: function(){
		            $('#loader-icon').hide();
		            },
		             success: function (data){
                 
					if(data !== 0){
                      var htmlStr = '';
                     
                       
                          var Obj = JSON.parse(data);

                                var htmlStr = '';
								   for( var i in Obj) {
								   	var stp_profile_pic = Obj[i].stp_profile_pic;
                                    var stp_fname 		= Obj[i].stp_fname;
                                    var stp_lname 		= Obj[i].stp_lname;
                                    var username 		= Obj[i].username;
                                    var post_text 		= Obj[i].qz_post_text;
                                    var post_image 		= Obj[i].qz_post_image;
                                    var user_id 		= Obj[i].qz_post_user_id;
                                    var post_id 		= Obj[i].qz_pid;
                                    var datetime 		= new Date(Obj[i].qz_post_date);                             
                                
							                
                                    var htmlStrData     =  timeLineView(stp_profile_pic, stp_fname, stp_lname, post_text, post_image, datetime, user_id, post_id, username);
                                    var limit=5;
                                         $.ajax({
												url:'<?= base_url() ?>quizzes/getCommentsData',
												type: "GET",
												contentType: "application/json",
												data:{post_id:post_id, limit: limit},
												async: false, 
												success: function (data)
												{
													result = data;
									               
												},
												error: function () {
									             console.log('error');
									            },           
											}); 
                                             

                                             
                                             var Com = JSON.parse(result);
                                             var htmlComments ="";
                                         
                                             // console.log(totlaComments);
                                            for(var j in Com)
                                            {
	                                     		var comment   		=  Com[j].comment;
	                                     		var comPostId 		=  Com[j].postId;
	                                     		var comFname  		=  Com[j].stp_fname;
	                                     		var comLname 		=  Com[j].stp_lname;
	                                     		var comUname 		=  Com[j].username;
	                                     		var comProfilePic  	=  Com[j].stp_profile_pic;
	                                     		var commentDate  	=  Com[j].qz_commentDate; 
	                                     		var commentId 		=  Com[j].qz_postReplyId;
	                                     		var commentBy  	    =  Com[j].qz_commentBy;
                                                var datetime1 		= new Date(commentDate);
      											var commentDateAge 	= timeSince(datetime1);      						
                                                  
	                                     		if(comment){                                                    
                                                htmlComments += commentView(comment, comPostId, comFname, comLname, comProfilePic, commentDateAge, commentId, commentBy, user_id, comUname); 
	                                     		}	

                                            }  
                                           
                                               
                                                 
		                                     	 if(htmlStrData)
		                                        {
                                                    var totlaComments =    Com.totlaComments;
		                                        	htmlStr += htmlStrData;

	                                               
	                                                htmlStr += '<div class="fb-status-container fb-border fb-gray-bg"><div class="fb-time-action like-info"><ul class="fb-comments">';                                        

			                                        htmlStr += htmlComments+'<li><a href="#" class="cmt-thumb"> <img src="<?= base_url();?>uploads/profile_pic/<?= $userData[0]->stp_profile_pic; ?>" alt="" /></a><div class="cmt-form">';
	        										htmlStr +='<textarea class="form-control commentInput" id="'+post_id+'" placeholder="Write a comment..." name="" ></textarea></div></li>';
	         											htmlStr +='</ul> <div class="clearfix"></div></div>';

                                                     if(totlaComments <= 4)
	                                                {

	                                                    htmlStr += '<div class="fb-status-container fb-border fb-gray-bg"><div class="fb-time-action like-info"><ul class="fb-comments">';
	                                                }
	                                                else {
	                                                
	                                                 htmlStr += '<div class="fb-status-container fb-border fb-gray-bg"><div class="fb-time-action like-info"><a id="'+post_id+'" class="viewAllComments btn btn-default"> View All</a></div><ul class="fb-comments">';
	                                                }

                                                    
	                                                     htmlStr +='</div></section>';

		                                     	}
		                                      	else
		                                      	{
		                                      	 htmlStr += 'empty';
		                                      	}                                

                                          
								    }
                                    
                               
								    $("#postsload").html(htmlStr);

		                    		setTimeout(function() {
								    $('#alert-success').fadeOut('slow');
								}, 1000); 
                         }

		            },	           
                 
                  
		        }); 
} 

function loadpostlis(currentPage){

	        var quizId = Number('<?= $quizData[0]->qz_id; ?>');
            
		       $.ajax({
		            url:'<?= base_url() ?>quizzes/getPostData',
		            type: "POST",
		            data:{pageNumr: currentPage, quizId: quizId},
		            beforeSend: function(){
		            $('#loader-icon').show();
		            },
		            complete: function(){
		            $('#loader-icon').hide();
		            },
		             success: function (data){
                     
					if(data !== 0){
                      var htmlStr = '';
                     
                  
            
                          var Obj = JSON.parse(data);

                                var htmlStr = '';
								   for( var i in Obj) {
								   	var stp_profile_pic = Obj[i].stp_profile_pic;
                                    var stp_fname 		= Obj[i].stp_fname;
                                    var stp_lname 		= Obj[i].stp_lname;
                                    var username 		= Obj[i].username;
                                    var post_text 		= Obj[i].qz_post_text;
                                    var post_image 		= Obj[i].qz_post_image;
                                    var user_id 		= Obj[i].qz_post_user_id;
                                    var post_id 		= Obj[i].qz_pid;
                                    var datetime 		= new Date(Obj[i].qz_post_date); 
                                 
                                      
							                
                                         var htmlStrData     =  timeLineView(stp_profile_pic, stp_fname, stp_lname, post_text, post_image, datetime, user_id, post_id, username);
                                         var limit=5;
                                         $.ajax({
												url:'<?= base_url() ?>quizzes/getCommentsData',
												type: "GET",
												contentType: "application/json",
												data:{post_id:post_id, limit: limit},
												async: false, 
												success: function (data)
												{
													result = data;
									               
												},
												error: function () {
									             console.log('error');
									            },           
											}); 
                                             
                                             
                                             
                                                var Com = JSON.parse(result);
                                                
                                             var htmlComments ="";
                                         
                                              // console.log(totlaComments);
                                            for(var j in Com)
                                            {
	                                     		var comment   		=  Com[j].qz_comment;
	                                     		var comPostId 		=  Com[j].postId;
	                                     		var comFname  		=  Com[j].stp_fname;
	                                     		var comLname 		=  Com[j].stp_lname;
	                                     		var comProfilePic  	=  Com[j].stp_profile_pic;
	                                     		var commentDate  	=  Com[j].qz_commentDate;
	                                     		var comUname 		=  Com[j].username;
	                                     		var commentId 		=  Com[j].qz_postReplyId;
	                                     		var commentBy  	    =  Com[j].qz_commentBy;

                                                var datetime1 		= new Date(commentDate);

      											var commentDateAge 	= timeSince(datetime1);
                                                  
	                                     		if(comment){
                                                    
                                                htmlComments += commentView(comment, comPostId, comFname, comLname, comProfilePic, commentDateAge, commentId, commentBy, user_id, comUname); 
	                                     		}	

                                            }  
                                           
                                               
                                                 
		                                     	 if(htmlStrData)
		                                        {
                                                    var totlaComments =    Com.totlaComments; 
                                                    var propic = '<?= $profilePic; ?>'; 
		                                        	
		                                        	htmlStr += htmlStrData;

	                                               
	                                                htmlStr += '<div class="fb-status-container fb-border fb-gray-bg"><div class="fb-time-action like-info"><ul class="fb-comments">';                                        
                                                    if(propic !==""){

                                                    	 htmlStr += htmlComments+'<li><a href="#" class="cmt-thumb"> <img src="<?= base_url();?>uploads/profile_pic/<?= $profilePic; ?>" alt="" /></a><div class="cmt-form">';
                                                    }
                                                    else{

                                                        htmlStr += htmlComments+'<li><a href="#" class="cmt-thumb"> <img src="<?= base_url();?>uploads/profile_pic/empty.png" alt="" /></a><div class="cmt-form">';

                                                    }
			                                       



	        										htmlStr +='<span id="insertCom"><textarea class="form-control commentInput" id="'+post_id+'" placeholder="Write a comment..." name="" ></textarea></span></div></li>';
	         											htmlStr +='</ul> <div class="clearfix"></div></div>';

                                                     if(totlaComments <= 4)
	                                                {

	                                                    htmlStr += '<div class="fb-status-container fb-border fb-gray-bg"><div class="fb-time-action like-info"><ul class="fb-comments">';
	                                                }
	                                                else {
	                                                
	                                                 htmlStr += '<div class="fb-status-container fb-border fb-gray-bg"><div class="fb-time-action like-info"><a id="'+post_id+'" class="viewAllComments btn btn-default"> View All</a></div><ul class="fb-comments">';
	                                                }

                                                    
	                                                     htmlStr +='</div></section>';

		                                     	}
		                                      	else
		                                      	{
		                                      	 htmlStr += 'empty';
		                                      	}                                

                                          
								    }
                                    
                                 }
								    $("#posts").html(htmlStr);

		                    		setTimeout(function() {
								    $('#alert-success').fadeOut('slow');
								}, 1000); 
		            },	           

                  
		        }); 
}    

</script>

<script type="text/javascript">
	$('document').ready(function(){
    //register Ajax
	     $("#imageUpload").click(function() {

		 $("#imageUploadView").fadeIn('slow');
		 $("#textInputView").hide('slow');

		});


	      $("#textInput").click(function() {

		  $("#imageUploadView").hide('slow');
		  $("#textInputView").fadeIn('slow');

		});


        
    });


    $('.selectpicker').selectpicker({ 
  		size: 10
	});
</script>


<script type="text/javascript">

        $( "#file" ).change(function(event) {
		    var fileupload = $('input[name=file]');
            var progressBar = $("#progressbar");
		    var fileToUpload = fileupload[0].files[0];
		      if(fileToUpload !="undefined"){

		      	var formData = new FormData();
		      	formData.append("file", fileToUpload);
		      }
		   
		      
		       $.ajax({
		            url:'<?= base_url() ?>post/uploadImage',
		            secureuri:false,
		            type: "POST",
		            fileElementId:'file',
		            data:formData,
		            processData: false,
		            contentType: false,
		            success: function (data){

		            var JSONObject = JSON.parse(data);

		              if(JSONObject['status'] == 1){

                         $("#uploadfile").val(JSONObject['fimeName']);
                         $("#alert-success").fadeIn('slow');
                         $("#msgImgUp").text( JSONObject['successMsg'] );

		              }
		              else{
		              	 
		              	 $("#alert-warning").fadeIn('slow');
                         $("#WmsgImgUp").text( JSONObject['successMsg'] );
		              }                        

		            
		              
		            },

		           

		            xhr:function(){

                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(event){
                             
                             if(event.lengthComputable){

                             	 var percentComplete = Math.round(100*(event.loaded / event.total));                             	 
                             	  $('.progress').show();
                             	   progressBar.css({width : percentComplete + '%'});
                             	  $('.progress-bar').text(percentComplete +'%');                            	
                             	  $(".btn-file").hide();
                             	  $("#delete").show();
                             };

                               setTimeout(function() {
								    $('.progress').fadeOut('fast');
								}, 1500);

                               setTimeout(function() {
								    $('#alert-success').fadeOut('slow');
								}, 1000); 

                                 setTimeout(function() {
								    $('#alert-warning').fadeOut('slow');
								}, 1000); 

                        }, false)

                        return xhr;
		            }


		        });
		      });       
</script>


<script type="text/javascript">

        $("#delete").click(function() {
		    var uploadfile = $('input[name=uploadfile]').val();
            
		        $.ajax({
		            url:'<?= base_url() ?>post/uploadImageDelete',
		            secureuri:false,
		            type: "POST",
		            data:{uploadfile: uploadfile},
		            success: function (data){
                         var JSONObject = JSON.parse(data);

		            	 $("#uploadfile").val('');
		                 $(".btn-file").show();
		                 $("#previewImg  img").hide();
		                 $("#delete").hide();  
		            },	
                   


                  
		        });
		      });       
</script>


<script type="text/javascript">

        $("#postSubmit").click(function() {
		    var uploadfile = $('#uploadfile').val();
		     var postText = $('#postText').val();
		    var quizId = Number('<?= $quizData[0]->qz_id; ?>');
            
		
		      
		       $.ajax({
		            url:'<?= base_url() ?>quizzes/insertPost',
		            type: "POST",
		            data:{uploadfile:uploadfile, postText:postText, quizId: quizId},
		             beforeSend: function(){
		            $('#loader-icon').show();
		            },
		            complete: function(){
		            $('#loader-icon').hide();
		            },
		            success: function (data){
                            var Obj = JSON.parse(data);
		                

		                  	   $("#alert-success").fadeIn('slow');
                               $("#msgImgUp").text( Obj['msg'] );
                               $("#postText").val("");
                               $("#delete").hide(); 
                               $("#previewImg  img").hide();
                               $(".btn-file").show(); 
                               $("#imageUploadView").hide('slow');
		   					   $("#textInputView").fadeIn('slow');

                               loadpostlis();

		                     	setTimeout(function() {
								    $('#alert-success').fadeOut('slow');
								}, 1000); 

                                

		            },	           

                  
		        });
		      }); 
</script>

<script type="text/javascript">

	$(document).ready(function() {
		 
			$(document.body).on('click', '#delete_post', function(){ 		    

			    var post_id = $(this).attr('class');
			    if(confirm("Sure you want to delete this post?"))
				{
					$.ajax({
			            url:'<?= base_url() ?>quizzes/deletePost',
			            secureuri:false,
			            type: "POST",
			            data:{post_id: post_id},
			            success: function (data){
	                       
			            	 $("#row_"+post_id).fadeOut('slow');
			                 
			            }	
	                   


	                  
			        });

				}
			      
			 });       



	});
</script>

<script type="text/javascript">

	$(document).ready(function() {

		$(document.body).on('click', '#edit_post', function(){ 	
		    var post_id = $(this).attr('class');		   
				$.ajax({
		            url:'<?= base_url() ?>quizzes/editPostView',
		            secureuri:false,
		            type: "POST",
		            data:{post_id: post_id},
		            success: function (data){
                         var JSONObject = JSON.parse(data);
              			$("#editPostId").val(JSONObject['post_id']); 
		            	$("#editPostText").val(JSONObject['post_text']); 
		            	
		            	if(JSONObject['post_image'] !=""){

		            	$("#editpostoldImage").html('<img src="<?=base_url() ?>uploads/post/'+JSONObject['post_image']+'" >');
		            	$('#uploadfileId').val(JSONObject['post_image']);

		            	}
		            	else 
		            	{
                            $("#editpostoldImage").html('<img src="<?= base_url(); ?>public/img/default.png" >');
                            $('#uploadfileId').val('');
		            	}

		            	$('#editPostModal').modal({show:true});
		               
		            }	
		        });
		 });       

	});
</script>

<script type="text/javascript">

        $("#deletePostImage").click(function() {
		    
		            	 $("#editpostoldImage").html('');
                         $('#edituploadfileId').val('');
                         $('#deleteButton').hide();
                         $('#uploadNewImage').fadeIn('slow'); 		     
		                });       
</script>

<script type="text/javascript">

        $("#newImage").change(function() {
		    
		    var fileupload = $('input[name=newImage]');
             var fileToUpload = fileupload[0].files[0];
		      if(fileToUpload !="undefined"){

		      	var formData = new FormData();
		      	formData.append("file", fileToUpload);
		      }
		   
		      
		       $.ajax({
		            url:'<?= base_url() ?>post/uploadImage',
		            secureuri:false,
		            type: "POST",
		            fileElementId:'file',
		            data:formData,
		            processData: false,
		            contentType: false,
		            success: function (data){

		            var JSONObject = JSON.parse(data);

		              if(JSONObject['status'] == 1){
                        
                         $("#edituploadfileId").val(JSONObject['fimeName']);
                         $('#uploadNewImage').hide();
                         $('#deleteButton').fadeIn('slow'); 
                         $("#editpostoldImage").html('<img src="<?=base_url() ?>uploads/post/'+JSONObject['fimeName']+'" >');	
                        

		              }
		              else{
		                   alert('Upload Error!');
		              }                        

		            
		              
		            },

		           

		         


		        });
		      });       
</script>

<script type="text/javascript">

        $("#updatePost").click(function() {

          	var editpost_id =  $("#editPostId").val();
        	var editPostText =  $("#editPostText").val();
        	var uploadfile    =    $("#edituploadfileId").val();
        	

        	$.ajax({
                url: '<?= base_url() ?>quizzes/updatePost',
        		type:"post",
        		data:{editPostText : editPostText, uploadfile : uploadfile, editpost_id : editpost_id},

        		 success: function (data){
        		           		 	
                     $('#newImage').val('');
                      loadpostlis(); 
                      $('#editPostModal').modal('hide');

        		 }

        	});
		    
		        	     
		});       
</script>

<script type="text/javascript">

	$(document).ready(function() {

		

			$(document).on('keyup','.commentInput', function(e){

           if(e.keyCode == 13 && !e.shiftKey)
			{
			 
            var postId = (e.target.id);
            var postComments = (e.target.value);
            
            	$.ajax({
                url: '<?= base_url() ?>quizzes/addComments',
        		type:"post",
        		data:{postId : postId, postComments: postComments},
        		success: function (data){
                     $(".commentInput").val(''); 
        		 },

        		});     


               loadpostlis();                
			}
		      
		 });          

    

	});
</script>

<script type="text/javascript">

	$(document).ready(function() {
		 
			$(document.body).on('click', '.deleteComment', function(){ 		    

			    var comment_id = $(this).attr('id');


			    
			    if(confirm("Sure you want to delete this comment?"))
				{
					$.ajax({
			            url:'<?= base_url() ?>quizzes/deleteComments',
			            secureuri:false,
			            type: "POST",
			            data:{comment_id: comment_id},
			            success: function (data){
	                       
			            	 $("#rowC_"+comment_id).fadeOut('hide');
			               console.log(data); 
			            }	
	                   


	                  
			        });

				}
			      
			 });       



	});
</script>

<script type="text/javascript">

	$(document).ready(function() {
		 
			$(document.body).on('click', '.editComment', function(){ 		    

			    var comment_id = $(this).attr('id');
			    
			 
					$.ajax({
			            url:'<?= base_url() ?>quizzes/editGetComment',
			            secureuri:false,
			            type: "POST",
			            data:{comment_id: comment_id},
			            success: function (data){

			            	 $ObjCom = JSON.parse(data);


	                        $("#commentText_"+comment_id).fadeOut('hide');
	                        $('.editcommentInput_'+comment_id).val($ObjCom.comment);
	                        $('#editCommentText_'+comment_id).fadeIn('slow');

                            $(function() {
	                        $('.editcommentInput_'+comment_id).keyup( function(e){ 

	                        	  var commentId = (e.target.id);
						            var newComments = (e.target.value);	

						            var checkText = newComments.trim();

	                              
						           if(e.keyCode == 13 && !e.shiftKey)
									{
									    if(checkText  != '') {                                        
							            	$.ajax({
							                url: '<?= base_url() ?>quizzes/addEditComments',
							        		type:"post",
							        		data:{commentId : commentId, newComments: newComments},
							        		success: function (data){					                          

							                   
							        		 	 
							        		 },

							        		});
							               loadpostlis(); 
										}

									}

		      
		 						});

		 						}); 
			                 
			            }	
	                   


	                  
			        });

				
			      
			 });       



	});
</script>

<script type="text/javascript">

	$(document).ready(function() {

		$(document.body).on('click', '.viewAllComments', function(){

		   var limit = 500; 	
		    
		     var post_id = $(this).attr('id');
                  $.ajax({
												url:'<?= base_url() ?>quizzes/getCommentsData',
												type: "GET",
												contentType: "application/json",
												data:{post_id:post_id, limit: limit},
												async: false, 
												success: function (data)
												{
													result = data;
									               
												},
												error: function () {
									             console.log('error');
									            },           
											}); 
                                             

                                             
                                                var Com = JSON.parse(result);
                                             var htmlComments ="";
                                         
                                              // console.log(totlaComments);
                                            for(var j in Com)
                                            {
	                                     		var comment   		=  Com[j].qz_comment;
	                                     		var comPostId 		=  Com[j].postId;
	                                     		var comFname  		=  Com[j].stp_fname;
	                                     		var comLname 		=  Com[j].stp_lname;
	                                     		var comProfilePic  	=  Com[j].stp_profile_pic;
	                                     		var commentDate  	=  Com[j].qz_commentDate;
	                                     		var comUname 		=  Com[j].username;
	                                     		var commentId 		=  Com[j].qz_postReplyId;
	                                     		var commentBy  	    =  Com[j].qz_commentBy;

                                                var datetime1 		= new Date(commentDate);
      											var commentDateAge 	= timeSince(datetime1);
                                                  
	                                     		if(comment){

                                                htmlComments += commentView(comment, comPostId, comFname, comLname, comProfilePic, commentDateAge, commentId, commentBy); 
	                                     		}	

                                            }


                                     

                   htmlComments +=   '<li><a href="#" class="cmt-thumb"> <img src="<?= base_url();?>uploads/profile_pic/<?= $userData[0]->stp_profile_pic; ?>" alt="" /></a><div class="cmt-form"><textarea class="form-control commentInput" id="'+post_id+'" placeholder="Write a comment..." name="" ></textarea></div></li>';


		     $('#loadComments').html(htmlComments);
		     $('#viewAllCommentModal').modal({show:true});

		    

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
        var quiz_id =  Number('<?= $quizData[0]->qz_id; ?>');

	        $("#updateProfilePic").click(function() {

	        	var proedituploadfileId =  $("#proedituploadfileId").val();
	        	
	        	$.ajax({
	                url: '<?= base_url() ?>quizzes/quizLogoUpdate',
	        		type:"post",
	        		data:{proedituploadfileId : proedituploadfileId, quiz_id: quiz_id},

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

	        	 var quizId = Number('<?= $quizData[0]->qz_id; ?>');
          
	        	var caveredituploadfileId =  $("#caveredituploadfileId").val();
	        	
	        	$.ajax({
	                url: '<?= base_url() ?>quizzes/updateCaverPic',
	        		type:"post",
	        		data:{caveredituploadfileId : caveredituploadfileId, quizId: quizId},


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
	</script>


