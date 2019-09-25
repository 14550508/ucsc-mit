 <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?= date('Y') ?> &copy; SELP.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>public/backend/js/jquery.js"></script>
    <script src="<?= base_url();?>public/backend/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?= base_url()?>public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?= base_url();?>public/backend/js/jquery.scrollTo.min.js"></script>
     <script src="<?= base_url();?>public/backend/assets/jquery-knob/js/jquery.knob.js"></script>
      <script src="<?= base_url();?>public/backend/js/jquery.nicescroll.js" type="text/javascript"></script>
      <script src="<?= base_url();?>public/backend/js/bootstrap-select.js"></script>
       <script src="<?= base_url();?>public/backend/js/slidebars.min.js"></script>
    
      <script type="text/javascript" src="<?= base_url();?>public/backend/assets/fuelux/js/spinner.min.js"></script>
 
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="<?= base_url();?>public/backend/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
    <script src="<?= base_url();?>public/backend/js/respond.min.js" ></script>
    <script src="<?= base_url();?>public/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  

    <!--right slidebar-->
   
      <!--common script for all pages-->
    
    <script src="<?= base_url();?>public/backend/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?= base_url();?>public/backend/js/advanced-form-components.js"></script>
    <script src="<?= base_url();?>public/backend/js/select2.js" ></script>
    <script src="<?= base_url();?>public/backend/js/bootbox.min.js" ></script>
    <script src="<?= base_url();?>public/backend/assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
    <script src="<?= base_url();?>public/backend/assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
   
      <!--common script for all pages-->
    <script src="<?= base_url();?>public/backend/js/common-scripts.js"></script>

    <script src="<?= base_url();?>public/backend/js/easy-pie-chart.js"></script>


    <?php $this->load->view('users/changePassword'); ?>

  </body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#findUsers').select2({        
         allowClear: true,
         minimumInputLength: 2,
            ajax: {
                url: "<?php echo base_url();?>follow/find",
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

   $('#findUsers').on('change', function() {


    var user_id = $(this).val();  

    if(user_id !=""){

          $.ajax({ 
            url:'<?= base_url() ?>follow/getUsername',
        type: "POST",
        data:{user_id:user_id},             
        success: function (data){ 
              var Obj = JSON.parse(data);

              if(Obj.username !==""){

                   if(Obj.userType == 1){

                    window.location.href = "<?= base_url(); ?>"+Obj.username;
                   } 

                  else if(Obj.userType == 2){

                    //window.location.href = "<?= base_url(); ?>teachers/"+Obj.username;
                   }
              } 

             
        },
      });

    }

            
   });    
  });
</script>

<script type="text/javascript">
   $(document).ready(function() {
    $('#updatePassword').on('click', function(){

      var oldPassword = $('#oPassword').val();
       var newPassword = $('#nPassword').val();
       var conPassword = $('#cPassword').val();

       if(oldPassword ==""){
          $('#alert').show();
           $('#alertS').hide();
          $('#ErrorM').html('Please enter your old password!');

       }

       else if(conPassword != newPassword){
          $('#alert').show();
           $('#alertS').hide();
          $('#ErrorM').html('Password does not match the confirm password!');
           
       }


       else {

          $.ajax({
            url:'<?= base_url() ?>usersAuth/changePassword',
            type: "POST",
            async: false, 
            data:{oldPassword: oldPassword, newPassword: newPassword},
            success: function (data)
            {
              console.log(data);
               var Obj = JSON.parse(data);
                 if(Obj.status == 1){
                 
                   $('#alertS').show();
                    $('#alert').hide();
                   $('#succM').html('Password has been updated successfully!');

                   $('#oPassword').val('');
                   $('#nPassword').val('');
                   $('#cPassword').val('');
                     
                 }
                else{

                  $('#alertS').hide();
                  $('#alert').show();
                  $('#ErrorM').html('The old password is incorrect!');

                  $('#oPassword').val('');
                  $('#nPassword').val('');
                  $('#cPassword').val('');

                }
                          
            }, 


          });


       }
           
           

    });
  });



  $(window).load(function() {
   
   
    $('.preloader').fadeOut('slow');   

 
  });

</script>



<script type="text/javascript">
  $(document).ready(function() {
    $('.loadNotifi').on('click', function(){
        
            $.ajax({ 
                url:'<?= base_url() ?>notification/notilist',
              type: "POST",             
              success: function(data){ 
                 var htmlV = "";
             
                        if(data !=0)
                        {
                           var Obj = JSON.parse(data);
                          
                           for(var i in Obj)
                           {
                            var datetime  = new Date(Obj[i].notifi_date);      
                            var age = timeSince(datetime); 

                            htmlV +=  '<li><a ><i class="fa fa-globe"> </i>'; 
                            htmlV +=  Obj[i].notifi_mess;

                            htmlV += '</a></li>';
                           }

                        }

                        else
                        {
                             htmlV += '<li><a> Not found notification ! </a></li>';
                        } 

                        $('#notification').html(htmlV);
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