<div class="modal fade" id="editPostModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger" style="display: none;" id="uploadError"></div>
         <textarea class="form-control input-lg p-text-area" rows="4" id="editPostText" > </textarea>

            <hr/>
           <div id="imageUploadView" >
              <div class="fileupload fileupload-new" data-provides="fileupload" style="padding: 15px">
                  <div class="fileupload-new thumbnail"  id="editpostoldImage" >
                      <img src="<?= base_url(); ?>public/img/default.png" alt="" />
                  </div>
              </div>
             
              <div id="deleteButton">
                 <button id="deletePostImage" class="btn btn-danger" > <i class="fa  fa-times-circle-o"> </i></button>
              </div>

               <div id="uploadNewImage" style="display: none;">
                  <input type="file" id="newImage" name="newImage">

              </div>
             
            </div>
      </div>
       
        <input type="hidden" name="editPostId" id="editPostId">
        <input type="hidden" name="edituploadfileId" id="edituploadfileName">
      <div class="modal-footer">

                            <div class="form-inline pull-right">                                

                                 <div class="form-group">   
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="button" id="updatePost" class="btn btn-primary">Save changes</button>
                                 </div> 
                              </div>
                              </div>
       
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->