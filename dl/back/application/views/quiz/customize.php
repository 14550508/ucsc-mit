<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
       <form class="form-horizontal" id="default" method="post" action="addquiz">
          <section class="wrapper site-min-height">
              
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3>Customize Quiz - A/L Chemistry </h3>
                          </header>
                          <div class="panel-body">
                   <div class="col-lg-12">            
                  <div class="form-group">
                                          <label class="col-lg-4 control-label"><h4>Number of questions</h4></label>
                                          <div class="col-lg-8">
                                              <select class="form-control" required name="qusppg"> 
                                                      <option value="10"> 10 </option>
                                                      <option value="20"> 20 </option>
                                                      <option value="30"> 30 </option>
                                                      <option value="40"> 40 </option>
                                                      <option value="50"> 50 </option>
                                                      <option value="60"> 60 </option>
                                                     
                                              </select>
                                             
                                          </div>
                                          <br/>
                                      </div>
                   </div>
                              
                    <div class="col-lg-12">            
                  <div class="form-group">
                                          <label class="col-lg-4 control-label"><h4>Number of questions per page </h4></label>
                                          <div class="col-lg-8">
                                              <select class="form-control" required name="qusppg"> 
                                                      <option value="1"> 1 </option>
                                                      <option value="3"> 3 </option>
                                                      <option value="5"> 5 </option>
                                                      <option value="10"> 10 </option>
                                                      <option value="15"> 15 </option>
                                                      <option value="20"> 20 </option>
                                                      <option value="0"> All </option>      
                                              </select>
                                             
                                          </div>
                                          <br/>
                                      </div>
                   </div> 
                              
                               <div class="col-lg-12">
                               <div class="form-group">
                                          
                                          <label class="col-lg-4 control-label"><h4> Yeas between   </h4></label>
                                          <div class="col-lg-4">
                                             <select class="form-control" required name="syear"> 
                                                    <option value="0"> All </option>     
                                                      <option value="2008"> 2008 </option>
                                                      <option value="2009"> 2009 </option>
                                                      <option value="2010"> 2010 </option>
                                                      <option value="2011"> 2011 </option>
                                                      <option value="2012"> 2012 </option>
                                                      <option value="2013"> 2013 </option>
                                                          
                                              </select>  
                                               
                                          </div>
                                          
                                          <div class="col-lg-4">
                                                <select class="form-control" required name="eyear"> 
                                                     <option value="0"> All </option>     
                                                      <option value="2008"> 2008 </option>
                                                      <option value="2009"> 2009 </option>
                                                      <option value="2010"> 2010 </option>
                                                      <option value="2011"> 2011 </option>
                                                      <option value="2012"> 2012 </option>
                                                      <option value="2013"> 2013 </option>
                                                      
                                              </select>  
                                               
                                          </div>
                                      </div>
                          </div>   
                              <div class="col-lg-12">
                                <div class="form-group">
                                          <label class="col-lg-4 control-label"><h4>Mode </h4></label>
                                          <div class="col-lg-8">
                                              <select class="form-control" required name="qmode">      
                                                   
                                                    <option value="0"> Normal </option>
                                                    <option value="1"> Easy </option>
                                                    <option value="2"> Medium </option>
                                                     <option value="3"> Hard </option>
                                                      
                                                                                              
                                              </select>
                                             
                                          </div>
                                      </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                          <label class="col-lg-4 control-label"><h4>Question Category </h4></label>
                                          <div class="col-lg-8">
                                              <select class="form-control" required name="qcategory">      
                                                   <option value="0"> All </option>
                                                    <option value="1"> Organic </option>
                                                    <option value="2"> Inorganic </option>
                                                     <option value="3"> Physical Chemistry </option>
                                                      
                                                      
                                                                                              
                                              </select>
                                             
                                          </div>
                                      </div>
                  
                              </div>
                              <div class="col-lg-12">
                               <div class="form-group">
                                          
                                          <label class="col-lg-4 control-label"><h4> Shuffle questions  </h4></label>
                                          <div class="col-lg-8">
                                              <input type="checkbox"  name="qshuffle" value="1"  data-toggle="switch" />  
                                               
                                          </div>
                                      </div>
                          </div>   
                        
                          
                           <div class="btn-group btn-group-justified">
                                    <div class="col-lg-4">&nbsp;</div>
                                    <div class="col-lg-8">
                                        <input type="submit" class="btn btn-success" value="Save"/>
                                  <a class="btn btn-info" href="<?php echo base_url();?>teachers/profile">Cancel</a>
                                   
                                    </div>
                                  
                              </div>
                                    
                        </div>  
                            
                              </section>
              </div>
              <!-- page end-->
          </section>
           </form>
      </section>


<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
         
  </body>
</html>
