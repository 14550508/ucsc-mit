<div id="profileMenu">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li>
              <a href="<?= base_url(); ?>quizzes/page/<?= $quizData[0]->qz_id; ?>" >Timeline</a>
         </li>
          <li>
            <a href="<?= base_url(); ?>quizzes/about/<?= $quizData[0]->qz_id; ?>">About</a>
        </li>
        <?php if($enrollCecked == 1){ ?>

         <li>
            <a href="<?= base_url(); ?>quizzes/myresult/<?= $quizData[0]->qz_id; ?>">My Result Summery</a>
        </li>
        
        <?php  } ?>

         <li>
            <a href="<?= base_url(); ?><?= $this->session->userdata('username'); ?>">My Profile </a>
        </li>
      </ul>


     
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>

<?php if($enrollCecked == 0){ ?>
  <div class="pull-right">  <a class="btn btn-success" href="<?= base_url(); ?>quizzes/enrollQuiz/<?= $quizData[0]->qz_id; ?>" ="">Enroll Quiz</a></div>
<?php } 

else { ?>

   <div class="pull-right"> <a class="btn btn-success" href="<?= base_url(); ?>quizzes/start/<?= $quizData[0]->qz_id; ?>" =""><i class="fa fa-chevron-left"></i> Start </a> <a class="btn btn-default disabled" id=""><i class="fa fa-check"></i> Enrolled</a></div>

<?php } ?>
