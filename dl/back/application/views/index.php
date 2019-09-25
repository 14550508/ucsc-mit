<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php $this->load->view('tpl/site_head'); ?>
<?php $this->load->view('tpl/site_menu'); ?>

<div class="hidden-phone"><?php $this->load->view('tpl/slideshow'); ?></div>

<div class="container">
    <div class="row">
        <!--feature start-->
        <div class="text-center feature-head">
            <h1>welcome to Nanatharana</h1>
            <p>futuristic learning is here</p>
        </div>
      <a href="<?php echo base_url(); ?>quiz/phy">  
	  <div class="col-lg-3 col-sm-6">
            <section>
                <div class="f-box terques">
                   <i class="fa   fa-cogs"></i>
                    <h2>Physics Model Papers</h2>
                    
                </div>
            </section>
			</a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url(); ?>quiz/che">
			<section>
                <div class="f-box yellow">
                    <div class="user-heading round">
                    <i class="fa   fa-flask"></i>
                    </div>
                    <h2>Chemistry Model Papers</h2>
                     
                    
                </div>
            </section>
			</a>
        </div>
		 <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url(); ?>quiz/dlp">
			<section>
                <div class="f-box red">
                    <div class="user-heading round">
                    <i class="fa  fa-road"></i>
                    </div>
                    <h2>Driving Licence Model Papers</h2>
                   
                    
                </div>
            </section>
			</a>
        </div>
		 <div class="col-lg-3 col-sm-6">
		  <a href="<?php echo base_url(); ?>quiz/iq">
            <section>
                <div class="f-box blue">
                    <div class="user-heading round">
                    <i class="fa  fa-puzzle-piece"></i>
                    </div>
                    <h2>Intelligence Quotient </h2>
                    
                    
                </div>
            </section>
			</a>
        </div>
       
        <!--feature end-->
    </div>
    <div class="row">
        <!--quote start-->
        <div class="quote">
            <div class="col-lg-9 col-sm-9">
                <div class="quote-info">
                    <h1>It's Free </h1>
                    <p>G.C.E A/L, G.C.E O/L and Grade V Past Papers</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <a href="http://nanatharana.com/e_learning" class="btn btn-danger purchase-btn" target="_blank">take a Look</a>
            </div>
        </div>
        <!--quote end-->
    </div>
</div>

<!--property start-->
<div class="property gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-center">
                <img src="<?php echo base_url(); ?>img/quiz-img.png" alt="" width="300px" >
            </div>
            <div class="col-lg-6 col-sm-6">
                <h1>Online past papers</h1>
                <p>Do A/L, O/L and Grade 5 MCQs online and get the corrections at the same time. <br/>Upgrade your account and become a privileged user. Get explanations for the MCQs and many more facilities.</p>
               <a href="http://nanatharana.com/e_learning/" class="btn btn-purchase">Take a Look</a>
                
            </div>
        </div>
    </div>
</div>
<!--property end-->

<!--property start-->
<div class="property white-bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-sm-6">
                <h1>Organic Transformation</h1>
                <p>Do all your organic transformations online at nanatharana. Get the corrections at the same time.</p>
              <a href="<?php echo base_url(); ?>organic" class="btn btn-purchase">Take a Look</a>
            </div>
            <div class="col-lg-6 col-sm-6 text-center">
                <img src="<?php echo base_url(); ?>img/organic-img.png" width="300px" alt="">
            </div>
        </div>
    </div>
</div>
<!--property end-->

<!--property start-->
<div class="property gray-bg">
    <div class="container">
        <div class="row">


            <div class="col-lg-6 col-sm-6 text-center">
                <img src="img/pro-img.png" alt="" width="300px" >
            </div>
            <div class="col-lg-6 col-sm-6">
                <h1>Online MODEL Papers with Progress Tracker</h1>
                <p>Get a progress report. Evaluate yourself and identify the areas where you're lacking</p>
               <a href="<?php echo base_url(); ?>quiz" class="btn btn-purchase">Take a Look</a>
            </div>
        </div>
    </div>
</div>
<!--property end-->



<!--parallax start-->
<section class="parallax1 hidden-phone">
    <div class="container">
        <div class="row">
            <h1>“You are always a student, never a master. You have to keep moving forward”</h1>
        </div>
    </div>
</section>
<!--parallax end-->

<div class="container">
    <!--clients start-->
    <div class="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="list-unstyled">
                        <li>FOUNDED<br/><h3>2011</h3></li>
                        <li>MEMBERS<br/><h3>23000+</h3></li>
                        <li>QUESTIONS<br><h3>4500+</h3></li>
                        <li>COUNTRIES<br><h3>20+</h3></li>
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--clients end-->
</div>

<!--container end-->

<?php $this->load->view('tpl/site_footer'); ?>