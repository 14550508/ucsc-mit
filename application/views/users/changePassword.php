 <div class="modal fade" id="changePasswordModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">

          <div class="alert alert-danger" id="alert" style="display: none;" role="alert">
           
            <strong id="ErrorM"></strong> 
          </div>
          <div class="alert alert-success" id="alertS" style="display: none;" role="alert">
           
            <strong id="succM"></strong> 
          </div>

           <div class="input-group m-bot15">
              <span class="input-group-addon">Old Password</span>
                <input type="password" class="form-control" id="oPassword" >
           </div>

           <div class="input-group m-bot15">
              <span class="input-group-addon">New Password</span>
                <input type="password" class="form-control" id="nPassword" >
           </div>

           <div class="input-group m-bot15">
              <span class="input-group-addon">Confirm Password</span>
                <input type="password" class="form-control" id="cPassword" >
           </div>
        
            
          
      </div>
         
        <input type="hidden" name="userId" id="userId" value="<?= $this->session->userdata('user_id'); ?>">
      <div class="modal-footer">

                            <div class="form-inline pull-right">
                                
                                 <div class="form-group">   
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="button" id="updatePassword" class="btn btn-primary">Save changes</button>
                                 </div> 
                              </div>
                              </div>
       
   
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->