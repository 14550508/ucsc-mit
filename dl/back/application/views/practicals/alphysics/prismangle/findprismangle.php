<?php  $this->load->view('tpl/head'); ?>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/nanatharana/css/practicals/css/style1.css" />
	

	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/nanatharana/css/practicals/css/theme.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/nanatharana/css/practicals/css/jquery.parallax.css" />


<?php 

 $this->input->post('prism');
 $l = $this->input->post('l');
 $r = $this->input->post('r');
if($r =='' || $l ==''){
    
    redirect(base_url().'practicals/selectprismangle'); 
    
}
?>
  <style type="text/css" media="screen, projection">
    #port {
        margin: 1.5em 0px;
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 90px;
        border: 1px solid #eee;
        box-shadow: 
  0 1px 2px #fff, /*bottom external highlight*/
  0 -1px 1px #666, /*top external shadow*/ 
  inset 0 -1px 1px rgba(0,0,0,0.5), /*bottom internal shadow*/ 
  inset 0 1px 1px rgba(255,255,255,0.8); /*top internal highlight*/
        border-radius: 50px;
    
        padding: 24px 64px;
       background:#eee;
		
    }

    .parallax-layer {
        position: absolute;
    }
    
    /* Horizontal lists of inline-blocks, with image backgrounds as thumbnails */
    /* Tested in Safari 4 | FF 3.5 | Opera 9.6 | IE7 */ 
    .thumbs_index {
        padding: 0 12px;
        /* initial position */
        left: 0;
        /* Put all he thumbs on one line. */
        white-space: nowrap;
    }
    
    .thumbs_index  {
        display: inline;
        margin-right: 12px;
    }
    
    .img_thumb {
	  margin-top:-28px;
          width: 106px;
	  height:100px;
	  background-image:url(../img/phypracticals/t_cope.png);

    }
    
        #R1{ float:left; margin-left:<?php echo $l; ?>%;  margin-right:<?php echo $r; ?>%; height:90px; width:40px;  position:relative; z-index:1; margin-top:-25px;}
	#R1:hover{ background: url(../img/phypracticals/light.png) no-repeat top; }
	#R2{ float:left; height:90px;   width:40px; position:relative; z-index:1; margin-top:-25px; }
	#R2:hover{ background:url(../img/phypracticals/light.png) no-repeat top;}
  </style>
  
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
          <section class="wrapper site-min-height">
              
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3> Find the angle</h3>
                          </header>
                          <div class="panel-body">
                              
                  
                              
                               <aside class="profile-nav col-lg-12">
                                   <div class="col-lg-4"></div>
                     
                                   <div class="col-lg-8">
<section class="panel">

                        <img src="<?php echo base_url(); ?>img/phypracticals/prism1.png" width="60%"/>                
                              
 </section>
                                   </div>
<div class="wapper">




  <div class="site_wrap">
   







    <div id="port">
    
   <a data-toggle="modal" href="#myModal"> <div id="R1" title="Click Here"></div> </a>
     <a data-toggle="modal" href="#myModal1" > <div id="R2" title="Click Here"></div></a>
    
      <!-- List must be spaceless becuse <li>s are display: inline, and any spaces between them show in IE -->
      <div class="thumbs_index index parallax-layer">
      <div class="last"><a class="img_thumb thumb" href="#"></a></div>
      </div>
    </div>
  </div></div>
 
                  </aside>
                   <div class="col-lg-8">
                       
                     
                                
                                   
                                    </div>
                  
            
                          </div>   
                              </section>
              </div>
              <!-- page end-->
          </section>
      </section>

<!-- model  -->

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
               
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title"> Reading one </h4>
                      </div>
                      <div class="modal-body">
                          <p>Please read the reading and enter the value</p>
                          <img src="<?php echo base_url(); ?>img/phypracticals/scale60_R1.png" width="100%"  />
                          <input type="text" name="reading1" placeholder="" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                         
                                       </div>
                  </div>
              </div>
              
          </div>


<!-- end model -->

<!-- model 2  -->

 <div aria-hidden="true" aria-labelledby="myModalLabel1" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
               
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title"> Reading one </h4>
                      </div>
                      <div class="modal-body">
                          <p>Please read the reading and enter the value</p>
                          <img src="<?php echo base_url(); ?>img/phypracticals/scale60_R2.png" width="100%"  />
                          <input type="text" name="reading1" placeholder="" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                         
                                       </div>
                  </div>
              </div>
              
          </div>


<!-- end model -->

<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
     <script src="<?php echo base_url();?>template/nanatharana/js/jquery.parallax.js"></script>
     
     <script type="text/javascript">

$(document).ready(function(){
//open popup
$("#pop").click(function(){
  $("#overlay_form").fadeIn(1000);
  positionPopup();
});

//close popup
$("#close").click(function(){
	$("#overlay_form").fadeOut(500);
});
});

//position the popup at the center of the page
function positionPopup(){
  if(!$("#overlay_form").is(':visible')){
    return;
  } 
  $("#overlay_form").css({
      left: ($(window).width() - $('#overlay_form').width()) / 2,
      top: ($(window).width() - $('#overlay_form').width()) / 2,
      position:'absolute'
  });
}

//maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);

</script>


<script type="text/javascript">

$(document).ready(function(){
//open popup
$("#pop1").click(function(){
  $("#overlay_form1").fadeIn(1000);
  positionPopup();
});

//close popup
$("#close1").click(function(){
	$("#overlay_form1").fadeOut(500);
});
});

//position the popup at the center of the page
function positionPopup(){
  if(!$("#overlay_form1").is(':visible')){
    return;
  } 
  $("#overlay_form1").css({
      left: ($(window).width() - $('#overlay_form1').width()) / 2,
      top: ($(window).width() - $('#overlay_form1').width()) / 2,
      position:'absolute'
  });
}

//maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);

</script>
  <script type="text/javascript">
  jQuery(document).ready(function(){
    // Declare parallax on layers
    jQuery('.parallax-layer').parallax({
      mouseport: jQuery("#port"),
      yparallax: false
    });
  });
  </script>    
  </body>
</html>
