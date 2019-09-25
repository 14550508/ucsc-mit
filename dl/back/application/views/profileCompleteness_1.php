<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
     <?php $this->load->view('tpl/blank_menu'); ?>
          <section class="wrapper site-min-height">
              
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3>Student Profile Information </h3>
                          </header>
                          <div class="panel-body">
                              <div class="stepy-tab">
                                  <ul id="default-titles" class="stepy-titles clearfix">
                                      <li id="default-title-0" class="current-step">
                                          <div>Step 1</div>
                                      </li>
                                      <li id="default-title-1" class="">
                                          <div>Step 2</div>
                                      </li>
                                      <li id="default-title-2" class="">
                                          <div>Step 3</div>
                                      </li>
                                  </ul>
                              </div>
                              <form class="form-horizontal" id="default" method="post" action="<?php echo base_url();?>users/profileUpdate">
                                  <fieldset title="Step1" class="step" id="default-step-0">
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-4 control-label"><h4>What is your next exam?</h4></label>
                                          <div class="radios col-lg-8">
                                              <label class="label_radio" for="radio-01">
                                                  <input name="s_next_exam" id="radio-01" class="gceal" value="1" type="radio"   /> G.C.E Advanced Level 
                                              </label>
                                              
                                              <label class="label_radio" for="radio-02">
                                                  <input name="s_next_exam" id="radio-02" class="gceol" value="2" type="radio" /> G.C.E Ordinary Level
                                              </label>
                                              <label class="label_radio" for="radio-03">
                                                  <input name="s_next_exam" id="radio-03" class="g5s" value="3" type="radio" /> Grade 5 Scholarship
                                              </label>
                                              
                                              <label class="label_radio" for="radio-04">
                                                  <input name="s_next_exam" id="radio-04" value="4" class="other" type="radio" /> Other
                                              </label>
                                          </div>
                                      </div>
                                      

                                  </fieldset>
                                  <fieldset title="Step 2" class="step" id="default-step-1" >
                                      <legend> </legend>
                                      <!--  Start AL subjects  -->
                                                                    <div class="form-group" id="alsubj" style="display: none;">
                                                                       <label class="col-lg-3 control-label"><h4>Which Section ?</h4></label>
                                                                       <div class="radios col-lg-8">
                                                                           <label class="label_radio" for="radio-05">
                                                                               <input name="s_al_section" id="radio-05" value="maths" type="radio"   /> Maths
                                                                           </label>
                                                                           <label class="label_radio" for="radio-06">
                                                                               <input name="s_al_section" id="radio-06"  value="science" type="radio" /> Science
                                                                           </label>
                                                                           <label class="label_radio" for="radio-07">
                                                                               <input name="s_al_section" id="radio-07" value="commerce" type="radio" /> Commerce
                                                                           </label>

                                                                           <label class="label_radio" for="radio-08">
                                                                               <input name="s_al_section" id="radio-08" value="arts" type="radio" /> Arts
                                                                           </label>
																		   
																		   
                                                                       </div>
                                                                   </div>
                                              
                                              <!-- end AL subjects  -->
                                              
                                               <div class="form-group">
                                          <label class="col-lg-3 control-label"><h4>What is your district ?</h4></label>
                                          <div class="col-lg-8">
                                              <select class="form-control" required name="stp_district">      
                                                   <option value=""> Select District </option>
                                                  <option value="Ampara">Ampara </option>
                                                  <option value="Anuradhapura">Anuradhapura </option>
                                                  <option value="Badulla">Badulla </option>
                                                  <option value="Batticaloa">Batticaloa </option>
                                                  <option value="Colombo">Colombo </option>
                                                  <option value="Galle">Galle </option>
                                                  <option value="Gampaha">Gampaha </option>
                                                  <option value="Hambantota">Hambantota </option>
                                                  <option value="Jaffna">Jaffna </option>
                                                  <option value="Kalutara">Kalutara </option>
                                                  <option value="Kandy">Kandy </option>
                                                  <option value="Kegalle">Kegalle </option>
                                                  <option value="Kilinochchi">Kilinochchi </option>
                                                  <option value="Kurunegala">Kurunegala </option>
                                                  <option value="Mannar">Mannar </option>
                                                  <option value="Matale">Matale </option>
                                                  <option value="Matara">Matara </option>
                                                  <option value="Moneragala">Moneragala </option>
                                                  <option value="Mullaitivu">Mullaitivu </option>
                                                  <option value="Nuwara Eliya">Nuwara Eliya </option>
                                                  <option value="Polonnaruwa">Polonnaruwa </option>
                                                  <option value="Puttalam">Puttalam </option>
                                                  <option value="Ratnapura">Ratnapura </option>                                                                        
                                                  <option value="Trincomalee">Trincomalee </option>                                                                       
                                                  <option value="Vavuniya">Vavuniya </option>
                                                  <option value="Other">I am not a Sri Lankan </option>                                                  
                                              </select>
                                             
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          
                                          <label class="col-lg-3 control-label"><h4>City/ Town</h4></label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="stp_town">
                                          </div>
                                      </div>
                                              
                                               <div class="form-group">
                                          
                                          <label class="col-lg-3 control-label"><h4>What is your school?</h4></label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="st_school_name">
                                          </div>
                                      </div>
                                        
                                     

                                  </fieldset>
                                  <fieldset title="Step 3" class="step" id="default-step-2" >
                                      <legend> </legend>
                                       <div class="form-group">
                                           <label class="control-label col-md-3"><h4>Birthday </h4></label>
                                  <div class="col-md-3 col-xs-9">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" readonly value="" name="stp_dob" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                      </div>
                                      
                                  </div>
                              </div>
                                      
                            
                                      
                              <div class="form-group">
                                          <label class="col-lg-3 control-label"><h4>I am a</h4></label>
                                          <div class="radios col-lg-8">
                                              <label class="label_radio" for="radio-09">
                                                  <input name="stp_gender" id="radio-09" class="boy" value="1" type="radio"  checked /> <h3><i class="fa fa-male"> </i> </h3>
                                              </label>
                                              
                                              
                                              
                                              
                                              <label class="label_radio" for="radio-10">
                                                  <input name="stp_gender" id="radio-10" class="girl" value="2" type="radio" /> <h3><i class="fa fa-female"> </i> </h3>
                                              </label>
                                              
                                          </div>
                                      </div>        
                                      
                                     
                                    
                                  </fieldset>
                                  <input type="submit" class="finish btn btn-danger" value="Finish"/>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>


<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
         <script>

      //step wizard

      $(function() {
          $('#default').stepy({
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
              titleTarget: '.stepy-tab'
          });
      });
      
      
      $('.gceal').click(
  function(){
    if ( $(this).is(':checked') )
      $('#alsubj').show();
      
  
    else
      $('#alsubj').hide();
  }
);

$('.gceol').click(
  function(){
    if ( $(this).is(':checked') )
      $('#alsubj').hide();
      
  
    else
      $('#alsubj').show();
  }
);

$('.gceol').click(
  function(){
    if ( $(this).is(':checked') )
      $('#alsubj').hide();
      
  
    else
      $('#alsubj').show();
  }
);

$('.g5s').click(
  function(){
    if ( $(this).is(':checked') )
      $('#alsubj').hide();
      
  
    else
      $('#alsubj').show();
  }
);

$('.other').click(
  function(){
    if ( $(this).is(':checked') )
      $('#alsubj').hide();
      
  
    else
      $('#alsubj').show();
  }
);
  </script>
         
  </body>
</html>
