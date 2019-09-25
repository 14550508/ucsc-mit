

<script type="text/javascript">
	$(document).ready(function() {
		$('.loadRequestNotifi').on('click', function(){
        
            $.ajax({ 
	          		url:'<?= base_url() ?>notification/request',
			        type: "POST",		          
			        success: function(data){ 
			        	 var htmlV = "";
			       
                        if(data !=0)
                        {
                           var Obj = JSON.parse(data);
                          
                           for(var i in Obj)
                           {
                            var datetime 	= new Date(Obj[i].renot_date);      
                            var age = timeSince(datetime); 

                            htmlV +=  '<li><a ><div class="requserId" id="'+ Obj[i].username+'"><div class="col-md-3"><span style="margin-left:-15px">';
     
                            if(Obj[i].stp_profile_pic !== "") 
						        {
						        	htmlV +='<img src="<?= base_url(); ?>uploads/profile_pic/'+ Obj[i].stp_profile_pic+'" alt=""  width="35px">';
							    }
							    else
							    {
							    	htmlV +='<img src="<?= base_url(); ?>uploads/profile_pic/empty.png" alt=""  width="35px"> ';        
							    }
                          
                             htmlV += '</span></div><div class="col-md-9"><strong>'+Obj[i].stp_fname+' '+Obj[i].stp_lname+'</strong><br/><small>'+age+' ago</small></div></div>';

                            htmlV += ' <span class="icon-request"><botton class="btn btn-info conformrequest" id="'+Obj[i].u_id+'">Confirm </botton> <botton class="btn btn-default deleteRec" id="'+Obj[i].u_id+'">Delete</botton></span>';


                            htmlV += '</a></li>';
                           }

                        }

                        else
                        {
                             htmlV += '<li><a> Not found notification ! </a></li>';
                        } 

                        $('#requestList').html(htmlV);
			        },
			});


		});
    function timeSince(datetime) {

	    var seconds = Math.floor((new Date() - datetime) / 1000);
	    var interval = Math.floor(seconds / 31536000);

		    if (interval > 1) {
		        return interval + " yrs";
		    }
		    interval = Math.floor(seconds / 2592000);
		    if (interval > 1) {
		        return interval + " mon";
		    }
		    interval = Math.floor(seconds / 86400);
		    if (interval > 1) {
		        return interval + " day";
		    }
		    interval = Math.floor(seconds / 3600);
		    if (interval > 1) {
		        return interval + " hr";
		    }
		    interval = Math.floor(seconds / 60);
		    if (interval > 1) {
		        return interval + " min";
		    }
		    return Math.floor(seconds) + " sec";
	}


	});
</script>


<script type="text/javascript">
	
    $(document).on('click', '.requserId', function(){ 	
		var profile = $(this).attr('id');
		window.location.href = "<?= base_url(); ?>students/"+profile;


	});

	
    $(document).on('click', '.deleteRec', function(){ 		     
	          var profileId = $(this).attr('id');
	          var logedUser = Number('<?= $this->session->userdata('user_id'); ?>');  
              NotideleteRequest(profileId, logedUser);
		});

	$(document).on('click', '.conformrequest', function(){ 	

	          var profileId = $(this).attr('id');
	          var logedUser = Number('<?= $this->session->userdata('user_id'); ?>');  
              NoticonfirmRequest(profileId, logedUser);
		});

function NotideleteRequest(profileId, logedUser){

	$.ajax({ 
	        url:'<?= base_url() ?>follow/unfollow',
			type: "POST",
			data:{profileId:profileId, logedUser: logedUser},		          
			success: function (data){ 
            var Obj = JSON.parse(data);
			       
                if(Obj.status == 1)
                {
                    location.reload();
                     	
                }

		        setTimeout(function(){
				$('#alert-success').fadeOut('slow');
				}, 1000); 
			},
	 });

}

function NoticonfirmRequest(profileId, logedUser){

	$.ajax({ 
	        url:'<?= base_url() ?>follow/confirmRequest',
			type: "POST",
			data:{profileId:profileId, logedUser: logedUser},		          
			success: function (data){ 
            var Obj = JSON.parse(data);
			        	
                if(Obj.status == 1)
                {
                    location.reload();
                }

		        setTimeout(function(){
				$('#alert-success').fadeOut('slow');
				}, 1000); 
			},
	 });

}

</script>

