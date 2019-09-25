  <header class=" header white-bg">
          
          <!--logo start-->
          <a href="<?= base_url()?>" class="logo" ><img src="<?= base_url()?>public/img/logo-active.png" width="40px"></a>
          <!--logo end-->
         
          <div class="top-nav ">
             
          </div>
      </header>
      <!--header end-->

  <?php if( $user_id !=="" && $quiz_id !==""  &&  $attempts !==""){ ?>
      

  <section id="main-content sidebar-closed">
    <section class="wrapper site-min-height">
         <div class="row">
            <div class="col-md-12"wrapper >
                <section class="panel">
            
                     <header class="panel-heading" id="quizTitle"><h3><?= $qz_name; ?>  - :: - (Attempt(s) : <?= $attempts;  ?>) </h3></header>
                     <div class="panel-body">
                       <p><small>www.selp.com</small> </p>
                        <div id="quizData"></div>
                       
                   <p><small>www.selp.com</small> </p>
                     </div>
                </section>
            </div>
          </div>
    </section>
  </section>
  
<?php } else{ echo 'Not Found'; } ?>