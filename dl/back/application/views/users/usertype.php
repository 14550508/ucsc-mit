<?php
?>
<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
<!--main content start-->
      <section id="content" class="sidebar-closed">
           <?php $this->load->view('tpl/blank_menu'); ?>
          <div> &nbsp;</div>
          
          <section class="wrapper site-min-height">
              
              <!-- page start-->
              <div class="row">
                   <div class="col-md-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Please select your account type.
                          </header>
                         <div class="panel-body">  
                         
                  
                  
                  <aside class="profile-nav col-lg-2">
                      
                  </aside>
                  <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="profileCompleteness1">
                                  <img src="<?php echo base_url(); ?>img/gv_icon.png" alt="">
                              </a>
                              
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="profileCompleteness1"> <h4>I am student </h4></a></li>
                              
                          </ul>

                      </section>
                  </aside>
                  
                   <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="profileCompleteness2">
                                  <img src="<?php echo base_url(); ?>img/al_icon.png" alt="">
                              </a>
                             
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="profileCompleteness2"> <h4>I am teacher </h4></a></li>
                              
                          </ul>

                      </section>
                  </aside>
           
              </div>
</div>
                      </section>
                  </div>
                  
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      
      <?php  $this->load->view('tpl/footer'); ?>