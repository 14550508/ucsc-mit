
<script>
$('document').ready(function(){
    //register Ajax
     $("#singUpsubmit").click(function() {
        
	    var stp_fname = $("#stp_fname").val();
	    var stp_lname = $("#stp_lname").val();
	    var email     = $("#email").val();
	    var password  = $("#password").val();
	    var user_type = $("#user_type").val();
      var stp_username = $("#stp_username").val();
	
   
        $.ajax({
            url: "<?= base_url()?>register/checkUserDetails",
            type: "POST",
            datatype: 'json',
            data: { stp_fname: stp_fname, stp_lname:stp_lname, email:email, password:password, user_type:user_type, stp_username: stp_username},          
            beforeSend: function() {
                 $('#loader').show();
                 $('#singUpsubmit').addClass('disabled');
              },
              complete: function(){
                 $('#loader').hide();
                 $('#singUpsubmit').removeClass('disabled');

              },
            success: function(data) {

              var JSONObject = JSON.parse(data);
               
               if(JSONObject['status'] == 1){
                       
                    $('#regSuccessImg').fadeIn('slow');  
                    $("#regSuccessMsg").fadeIn('slow');
                    $('#inputPanel').hide();
               }
              else if(JSONObject['status'] == 500 ){
                    $('#SignUperrorImg').fadeIn('slow');  
                    $("#SignUperrorMsg").html(JSONObject['errorMsg']);                    
                    $('#SignUperrorMsg').fadeIn('slow');  
                }
                   
               else{
                    
                    if(JSONObject['stp_fname']  !== ""){
                        $("#fnameMsg").html(JSONObject['stp_fname']);
                        $("#stp_fname").css('border-color', '#F11A6B');
                    }
                    else {
                        $("#fnameMsg").hide();
                        $("#stp_fname").css('border-color', '#35D82E');
                    }


                    if(JSONObject['stp_lname']  !== ""){
                        $("#lnameMsg").html(JSONObject['stp_lname']);
                        $("#stp_lname").css('border-color', '#F11A6B');
                    }
                    else {
                        $("#lnameMsg").hide();
                        $("#stp_lname").css('border-color', '#35D82E');
                    }


                      if(JSONObject['stp_username']  !== ""){
                        $("#usernameMsg").html(JSONObject['stp_username']);
                        $("#stp_username").css('border-color', '#F11A6B');
                    }
                    else {
                        $("#usernameMsg").hide();
                        $("#stp_username").css('border-color', '#35D82E');
                    }


                    if(JSONObject['email']  !== ""){
                        $("#emailMsg").html(JSONObject['email']);
                        $("#email").css('border-color', '#F11A6B');
                    }
                    else {
                        $("#emailMsg").hide();
                        $("#email").css('border-color', '#35D82E');
                    }


                    if(JSONObject['password']  !== ""){
                        $("#passwordMsg").html(JSONObject['password']);
                        $("#password").css('border-color', '#F11A6B');
                    }

                    else {
                        $("#passwordMsg").hide();
                         $("#password").css('border-color', '#35D82E');
                    }

               }
                
               
            },  
        });

   
});

$("#regClose").click(function() {   
    resetReg();
});

$("#loginClose").click(function() {   
    resetLogin();
});


function resetReg(){
    $('#regSuccessImg').hide();  
    $("#regSuccessMsg").hide();
    $('#SignUperrorImg').hide();  
    $('#SignUperrorMsg').hide();  
    $("#stp_fname").val('');
	$("#stp_lname").val('');
	$("#email").val('');
	$("#password").val('');
	$("#user_type").val('');
    $("#stp_username").val('');
    $('#inputPanel').show();
}


function resetLogin() {   
    $('#loginSuccessImg').hide();  
    $("#loginSuccessMsg").hide();
    $('#loginErrorImg').hide();  
    $('#errorMsg').hide();      
    $("#l_email").val('');
    $("#l_password").val('');
    $('#inputPanel').show();
}
//login Ajax

    $("#loginSubmit").click(function() {

            var l_email     = $("#l_email").val();
            var l_password  = $("#l_password").val();

            $('#loginSuccessImg').hide();  
            $("#loginSuccessMsg").hide();
            $('#loginErrorImg').hide();  
            $('#errorMsg').hide();      

            $.ajax({
                    url: "<?= base_url()?>login/checkLoginInfo",
                    type: "POST",
                    datatype: 'json',
                    data: {email:l_email, password:l_password },          
                    beforeSend: function() {
                         $('#loader').show();
                         $('#loginSubmit').addClass('disabled');
                      },
                      complete: function(){
                         $('#loader').hide();
                         $('#loginSubmit').removeClass('disabled');

                      },
                    success: function(data) {                        

                        var JSONObject = JSON.parse(data);
                        if(JSONObject['status'] == 1){
                            $('#loginSuccessImg').fadeIn('slow');  
                            $("#loginSuccessMsg").fadeIn('slow');
                            $('#inputPanel').hide();
                            $('#errorMsg').hide();

                            //user type check
                             window.location.href = '<?= base_url()?>'+JSONObject['username'];
                                               
                        }
                        else if(JSONObject['status'] == 500){
                            $('#loginErrorImg').fadeIn('slow');
                            $("#errorMsg").html(JSONObject['errorMsg']);
                            $('#errorMsg').fadeIn('slow');
                        }
                        else{ 
                           $('#loginErrorImg').fadeIn('slow');
                           $("#errorMsg").html(JSONObject['errorMsg']);
                           $('#errorMsg').fadeIn('slow');

                         


                        }
                    }
                });
    });

//reset password Ajax

     $("#resetPasswordSubmit").click(function() {

            var resetEmail = $("#resetEmail").val();           

            $.ajax({
                    url: "<?= base_url()?>login/forgotPassward",
                    type: "POST",
                    datatype: 'json',
                    data: { email:resetEmail},          
                    beforeSend: function() {                         
                         $('#resetPasswordSubmit').addClass('disabled');
                      },
                    complete: function(){                        
                         $('#resetPasswordSubmit').removeClass('disabled');
                      },
                    success: function(data) {
                        var JSONObject = JSON.parse(data);
                        if(JSONObject['status'] == 1){
                            $("#reserSuccessImg").fadeIn('slow');
                            $("#reserSuccessMsg").html(JSONObject['successMsg']);
                            $("#reserSuccessMsg").fadeIn('slow');
                            $('#inputPanel').hide();
                            $('#reserErrorMsg').hide();                                                 
                        }
                        else if(JSONObject['status'] == 0){
                            $("#reserErrorImg").fadeIn('slow');
                            $("#reserErrorMsg").html(JSONObject['errorMsg']);
                            $('#reserErrorMsg').fadeIn('slow');
                        }
                        else{ 
                            $("#reserErrorImg").fadeIn('slow');
                            $("#reserErrorMsg").html(JSONObject['errorMsg']);
                            $('#reserErrorMsg').fadeIn('slow');           


                        }
                    }
                });
    });


});

</script>