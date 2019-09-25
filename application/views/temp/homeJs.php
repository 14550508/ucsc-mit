<script>
	$(document).ready(function(){

  $("#forgotPasswordBtn").click(function(){

    $('#loginForm').hide();
    $('#forgotPassword').fadeIn('slow');   

  });

  $("#loginBtn").click(function(){
     $('#loginForm').fadeIn('slow');    
    $('#forgotPassword').hide();


  });


  $("#studentsSignup").click(function(){

    $('#user_type').val(1);
    $('#userTitle').html("I'm a Student");

  });

  $("#teachersSignup").click(function(){

    $('#user_type').val(2);
    $('#userTitle').html("I'm a Teacher");

  });

   $("#parentsSignup").click(function(){

    $('#user_type').val(3);
    $('#userTitle').html("I'am a Parent");

  });


   $('#l_password').keyup(function(e){ 

      if(e.keyCode == 13 && !e.shiftKey)
        {
          $('#loginSubmit').click();
           e.preventDefault();
                  
        }

          
  }); 

});


</script>