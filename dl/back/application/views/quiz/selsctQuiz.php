<?php  $this->load->view('tpl/head'); ?>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text/html", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text/html");
    ev.target.appendChild(document.getElementById(data));
}
</script>
</head>
<body class="">   
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
         <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
         

              <div class="row">
                  <div class="col-md-6">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              <h3> Select Organic Quiz </h3>
                          </header>
                          
                          <div class="panel-body">
                       
                        <div class="row product-list">
                            
                            <form method="post" action="organicquiz" >
                               
                         <div class="form-group">
                                          
                                          <div class="col-lg-12">
                                              <select class="form-control" required name="organicquizid">      
                                                   <option value=""> Select Quiz </option>
                                                   <?php foreach ($oqlist as $oqlists){ ?>
                                                    <option value="<?php echo $oqlists->id ?>"> <?php echo $oqlists->year ?> </option>
                                                   <?php } ?>
                                                    
                                              </select>
                                             
                                          </div>
                                      </div>
                                <div class="col-lg-12">&nbsp; </div>
                                 <div class="btn-group btn-group-justified">
                                    
                                    <div class="col-lg-12">
                                        <input type="submit" style="width: 100%" class="btn btn-success" value="Next"/>
                                
                                   
                                    </div>
                                  
                              </div>
                            </form>
                        </div> 
                              
                          </div>
                            </section>   
                              
                          </div>
                          
                             <div class="col-md-6">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              <h3>Introduction </h3>
                          </header>
                          
                          <div class="panel-body">
                       
                        <div class="row product-list">
                            
                          
                        </div>  
                          </div>
                            </section>   
                              
                          </div>
                     
                  </div>

              
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      </section>

<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
        
     <script src="<?php echo base_url();?>template/nanatharana/js/tasks.js" type="text/javascript"></script>




   
</body>
</html>