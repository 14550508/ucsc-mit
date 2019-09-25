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
              <a href="<?= base_url(); ?><?= $userData[0]->username; ?>" >Timeline</a>
         </li>
          <li>
            <a href="<?= base_url(); ?>about/<?= $userData[0]->username; ?>" >About</a>
        </li>
       <?php if($userData[0]->u_id == $this->session->userdata('user_id') && $userData[0]->type == 2) { ?>
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quizzes <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li>
                <a href="<?= base_url(); ?>quizzes/teacher/new/<?= $userData[0]->username; ?>">Add New Quizzes</a>
             </li>
             <li>
                <a href="<?= base_url(); ?>quizzes/teacher/myQuezzes/<?= $userData[0]->username; ?>"> My Quizzes</a>
             </li>
          </ul>       
        </li>
        <?php } ?>

      </ul>
     
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>

<?php if($userData[0]->u_id != $this->session->userdata('user_id')) { ?>

       <?php if($followers ==  30){   ?>

               <div class="pull-right" id="follow">
                 <div id="followId">  
                    <a class="btn btn-success follow" id="<?= $userData[0]->u_id ?>"> Follow </a>
                 </div>
               </div>


      <?php } else if($followers ==  10){   ?>

               <div class="pull-right" id="follow">
                 <div id="followId"> 
                    <a class="btn btn-info disabled" id="<?= $userData[0]->u_id ?>"> Pending </a> 
                    <a class="btn btn-default unfollow" id="<?= $userData[0]->u_id ?>"> Delete Request </a>
                 </div>
               </div>

      

       <?php } else if($followers ==  20){   ?>

               <div class="pull-right" id="follow">
                 <div id="followId"> 
                    <a class="btn btn-info followConfirm" id="<?= $userData[0]->u_id ?>"> Confirm </a> 
                    <a class="btn btn-default unfollow" id="<?= $userData[0]->u_id ?>"> Delete Request </a>
                 </div>
               </div>

       <?php } else { ?>

               <div class="pull-right" id="following"> <div id="followingId">   <a class="btn btn-default unfollow" id="<?= $userData[0]->u_id ?>" title="Unfollow"><i class="fa fa-check"></i> Following</a></div></div>

       <?php } ?>
  
<?php } else {  ?>

<?php } ?>