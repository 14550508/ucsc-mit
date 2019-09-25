 <div class="modal fade" id="changeCaverPictureModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Change Caver Picture</h4>
      </div>
      <div class="modal-body">

      <div id="caverPicError"  class="alert alert-danger" style="display: none;"> </div>
        
            <div id="caverimageUploadView" >
              <div class="fileupload fileupload-new" data-provides="fileupload" style="padding: 15px">
                  <div class="fileupload-new thumbnail"  id="caverpicImage" >
                      <img src="<?= base_url(); ?>public/img/default.png" alt="" />
                  </div>
              </div>
             
              <div id="caverdeleteButton" style="display: none;">
                 <button id="caverdeletePostImage" class="btn btn-danger" > <i class="fa  fa-times-circle-o"> </i></button>
              </div>

               <div id="caveruploadNewImage" >
                  <input type="file" id="caverPic" name="caverPic">

              </div>
             
            </div>
          
      </div>
         <input type="hidden" name="caveredituploadfileId" id="caveredituploadfileId">
        <input type="hidden" name="userId" id="userId" value="<?= $this->session->userdata('user_id'); ?>">
      <div class="modal-footer">

                            <div class="form-inline pull-right">
                                
                                 <div class="form-group">   
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="button" id="updateCaverPic" class="btn btn-primary">Save changes</button>
                                 </div> 
                              </div>
                              </div>
       
   
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->