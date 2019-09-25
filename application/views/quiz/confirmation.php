<section id="main-content">
    <section class="wrapper site-min-height">
         <div class="row">
            <div class="col-md-8">
	    		 <section class="panel">
	    		    <div class="panel-heading"> Quiz Star Confirmation </div>
	    		 	 <div class="panel-body">
                        <?php if($pendingStatus == 1) { ?>

                          	<p> Pending Quiz, Are you sure do you want start again ?</p>
                          	<a href="<?= base_url(); ?>quizzes/pendingQuiz/<?= $quizId; ?>" class="btn btn-success"> Yes </a> 
                          	<a href="<?= base_url(); ?>quizzes/page/<?= $quizId; ?>" class="btn btn-warning"> No </a>

                        <?php  } else { ?>

                            <p> Are you sure do you want start ?</p>
                          	<a href="<?= base_url(); ?>quizzes/setQuiz/<?= $quizId; ?>" class="btn btn-success"> Yes </a> 
                          	<a href="<?= base_url(); ?>quizzes/page/<?= $quizId; ?>" class="btn btn-warning"> No </a>

                        <?php  }  ?>

	    		 	 </div>
	    		 	
	    		 	    
	    		 	     
	    		 	    
	    		 	   
	    		 	 

	    		 </section>
	        </div>

	         <div class="col-md-3">
                <div class="panel">
                    <div class="panel-heading"> <strong>Sponsored </strong>   <span class="pull-right" style="font-size: 14px;"><a href="">Create Ad</a></span></div>
						<div class="panel-body">
							
						</div>
     			</div>
            </div>

	    </div>
    </section>
</section>