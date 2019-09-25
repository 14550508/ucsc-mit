 <div class="modal fade" id="changeProfilePictureModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Change Profile Picture</h4>
      </div>
      <div class="modal-body">

      <div id="profielPicError"  class="alert alert-danger" style="display: none;"> </div>
        
            <div id="proimageUploadView" >
              <div class="fileupload fileupload-new" data-provides="fileupload" style="padding: 15px">
                  <div class="fileupload-new thumbnail"  id="propicImage" >
                      <img src="<?= base_url(); ?>public/img/default.png" alt="" />
                  </div>
              </div>
             
              <div id="prodeleteButton" style="display: none;">
                 <button id="prodeletePostImage" class="btn btn-danger" > <i class="fa  fa-times-circle-o"> </i></button>
              </div>

               <div id="prouploadNewImage" >
                  <input type="file" id="profilePic" name="profilePic">

              </div>
             
            </div>
          
      </div>
         <input type="hidden" name="proedituploadfileId" id="proedituploadfileId">
        <input type="hidden" name="userId" id="userId" value="<?= $this->session->userdata('user_id'); ?>">
      <div class="modal-footer">

                            <div class="form-inline pull-right">
                                
                                 <div class="form-group">   
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="button" id="updateProfilePic" class="btn btn-primary">Save changes</button>
                                 </div> 
                              </div>
                              </div>
       
   
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->