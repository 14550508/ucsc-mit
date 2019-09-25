<script type="text/javascript">
	$(document).ready(function() {

		$('.select2').select2({ placeholder: "Select your health fund", allowClear: true, maximumSelectionSize: 6 });

		var sess_user_id = Number('<?= $this->session->userdata('user_id')?>');
		var user_id = Number('<?= $userData[0]->u_id; ?>');

		$(document.body).on('click', '#overviewEdit', function(){ 	

	    	if(sess_user_id == user_id){

                $('#overviewEdit').hide();
		        $('#overviewSaveBtn').fadeIn('slow');
		        $('#overview #overviewLable').hide();
		        $('#overview input').attr('type', 'text');
		        $('#gender').hide();
		        $('#stp_gender_span').show();	       

	    	} 
		});

		$(document.body).on('click', '#educationEdit', function(){ 	

	    	if(sess_user_id == user_id){

                $('#educationEdit').hide();
		        $('#educationSaveBtn').fadeIn('slow');
		        $('#education #educationLable').hide();
		        $('#education input').attr('type', 'text');
		              

	    	} 
		});


		$(document.body).on('click', '#locationEdit', function(){ 	

	    	if(sess_user_id == user_id){

                $('#locationEdit').hide();
		        $('#locationSaveBtn').fadeIn('slow');
		        $('#location #locationLable').hide();
		        $('#cunteryLoad').show();
		        $('#stateLoad').show();
		        $('#townLoad').show();
		       
		              

	    	} 
		});

        //overview

        $(document.body).on('click', '#overviewSaveBtn', function(){ 	
           
               var stp_fname       = $('#stp_fname').val(); var stp_lname         = $('#stp_lname').val();
               var stp_mname       = $('#stp_mname').val(); var stp_dob           = $('#stp_dob').val();
               var email           = $('#email').val(); var stp_gender            = $('#stp_gender').val();
               var stp_mobile      = $('#stp_mobile').val(); var stp_telephone    = $('#stp_telephone').val();
               var stp_school_name = $('#stp_school_name').val(); var stp_gender  = Number($('#stp_gender').select2().val());
               var stp_town        = $('#stp_town').val(); var stp_state          = $('#stp_state').val();
               var stp_country     = $('#stp_country').val(); var s_next_exam     = $('#s_next_exam').val();
               var stp_aboutus     = $('#stp_aboutus').val(); var stp_college     = $('#stp_college').val();

		        $('#overviewSaveBtn').hide();
		        $('#overview #overviewLable').show();
		        $('#overview input').attr('type', 'hidden');
		        $('#gender').show();
		        $('#stp_gender_span').hide();             
                
		        $.ajax({
		            url:'<?= base_url() ?>usersAuth/uploadProfile',
		            type: "POST",
		            data:{stp_fname: stp_fname, stp_lname: stp_lname, stp_mname:stp_mname, stp_dob: stp_dob, email: email, stp_gender: stp_gender, stp_mobile: stp_mobile, stp_telephone:stp_telephone, stp_school_name: stp_school_name, stp_gender: stp_gender, stp_town: stp_town, stp_state: stp_state, stp_country: stp_country, s_next_exam: s_next_exam, stp_aboutus:stp_aboutus, stp_college:stp_college },
		            success: function (data){

		              location.reload();

		            	 $('#overviewEdit').fadeIn('slow'); 
		            	 
		            },

		        });

	     });

        //education

        $(document.body).on('click', '#educationSaveBtn', function(){ 	
           
               var stp_fname       = $('#stp_fname').val(); var stp_lname         = $('#stp_lname').val();
               var stp_mname       = $('#stp_mname').val(); var stp_dob           = $('#stp_dob').val();
               var email           = $('#email').val(); var stp_gender            = $('#stp_gender').val();
               var stp_mobile      = $('#stp_mobile').val(); var stp_telephone    = $('#stp_telephone').val();
               var stp_school_name = $('#stp_school_name').val(); var stp_gender  = Number($('#stp_gender').select2().val());
               var stp_town        = $('#stp_town').val(); var stp_state          = $('#stp_state').val();
               var stp_country     = $('#stp_country').val(); var s_next_exam     = $('#s_next_exam').val();
               var stp_aboutus     = $('#stp_aboutus').val(); var stp_college     = $('#stp_college').val();

		        $('#educationSaveBtn').hide();
		        $('#education #educationLable').show();
		        $('#education input').attr('type', 'hidden');
		       

                $.ajax({
		            url:'<?= base_url() ?>usersAuth/uploadProfile',
		            type: "POST",
		            data:{stp_fname: stp_fname, stp_lname: stp_lname, stp_mname:stp_mname, stp_dob: stp_dob, email: email, stp_gender: stp_gender, stp_mobile: stp_mobile, stp_telephone:stp_telephone, stp_school_name: stp_school_name, stp_gender: stp_gender, stp_town: stp_town, stp_state: stp_state, stp_country: stp_country, s_next_exam: s_next_exam, stp_aboutus:stp_aboutus, stp_college: stp_college },
		            success: function (data){

		            	  location.reload();
                        
		            	 $('#educationEdit').fadeIn('slow'); 
		            	 
		            },

		        });

	     });


         //Location

        $(document.body).on('click', '#locationSaveBtn', function(){ 	
           
               var stp_fname       = $('#stp_fname').val(); var stp_lname         = $('#stp_lname').val();
               var stp_mname       = $('#stp_mname').val(); var stp_dob           = $('#stp_dob').val();
               var email           = $('#email').val(); var stp_gender            = $('#stp_gender').val();
               var stp_mobile      = $('#stp_mobile').val(); var stp_telephone    = $('#stp_telephone').val();
               var stp_school_name = $('#stp_school_name').val(); var stp_gender  = Number($('#stp_gender').select2().val());
               var stp_town        = $('#stp_town').val(); var stp_state          = $('#stp_state').val();
               var stp_country     = $('#stp_country').val(); var s_next_exam     = $('#s_next_exam').val();
               var stp_aboutus     = $('#stp_aboutus').val();  var stp_college     = $('#stp_college').val();

		        $('#locationSaveBtn').hide();
		        $('#location #educationLable').show();
		        $('#location input').attr('type', 'hidden');
		       



		        $.ajax({
		            url:'<?= base_url() ?>usersAuth/uploadProfile',
		            type: "POST",
		            data:{stp_fname: stp_fname, stp_lname: stp_lname, stp_mname:stp_mname, stp_dob: stp_dob, email: email, stp_gender: stp_gender, stp_mobile: stp_mobile, stp_telephone:stp_telephone, stp_school_name: stp_school_name, stp_gender: stp_gender, stp_town: stp_town, stp_state: stp_state, stp_country: stp_country, s_next_exam: s_next_exam, stp_aboutus:stp_aboutus, stp_college:stp_college },
		            success: function (data){

		            	  location.reload();

		            	 $('#locationEdit').fadeIn('slow'); 
		            	 
		            },

		        });

	     });
	

		$('.datepicker').datepicker({
	   		 format: 'yyyy-mm-dd',	    
		});      

       var country = '<?= $countryName; ?>';



		$('#stp_country').select2({
		   placeholder: country,
		   allowClear: true,
	        ajax: {
	            url: "<?php echo base_url();?>location/country",
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

        var state = '<?= $stateName; ?>';
       

        $('#stp_country').on('change', function() {

        	 var countryId = $(this).val();       	
        	
	  		$('#stp_state').select2({
			   placeholder: state,
			   allowClear: true,
		        ajax: {
		            url: "<?php echo base_url();?>location/state",
		            dataType: 'json',
		            tyle:'GET',
		            data: function (term, page) {
		                return {
		                    q: term, countryId:countryId,
		                     
		                };
		            },
		            results: function (data, page) {
		                return { results: data };
		            },
		        }
	  		});

  		}).trigger('change');

        var oldcountryId = Number('<?= $userData[0]->stp_country; ?>');
  		$('#stp_state').select2({

			   placeholder: state,
			   allowClear: true,
		        ajax: {
		            url: "<?php echo base_url();?>location/state",
		            dataType: 'json',
		            tyle:'GET',
		            data: function (term, page) {

		                return {
		                    q: term, countryId:oldcountryId,
		                     
		                };
		            },
		            results: function (data, page) {
		                return { results: data };
		            },
		        }
	  	});



	  	//town

	  	var town = '<?= $townName; ?>';
       

        $('#stp_state').on('change', function() {

        	 var stateId = $(this).val();       	
        	
	  		$('#stp_town').select2({
			   placeholder: town,
			   allowClear: true,
		        ajax: {
		            url: "<?php echo base_url();?>location/town",
		            dataType: 'json',
		            tyle:'GET',
		            data: function (term, page) {
		                return {
		                    q: term, stateId:stateId,
		                     
		                };
		            },
		            results: function (data, page) {
		                return { results: data };
		            },
		        }
	  		});

  		}).trigger('change');

        var oldstateId = Number('<?= $userData[0]->stp_state; ?>');
  		$('#stp_town').select2({

			   placeholder: town,
			   allowClear: true,
		        ajax: {
		            url: "<?php echo base_url();?>location/town",
		            dataType: 'json',
		            tyle:'GET',
		            data: function (term, page) {

		                return {
		                    q: term, stateId:oldstateId,
		                     
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
	</script>