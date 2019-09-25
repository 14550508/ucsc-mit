<div class="modal fade" id="newQuizModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeBtn" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Create New Quiz</h4>
      </div>
      <div class="modal-body">
        <form id="quizForm">
        <div id="newQuizError" class="alert alert-danger" style="display: none;"> </div>
        <div id="newQuizSuccess" class="alert alert-success" style="display: none;"> </div>
          
          <div class="form-group">           
            <input type="text" class="form-control" name="quizcat" id="quizcat" placeholder="Quiz Category*">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="quiz_name" placeholder="Quiz Name*">
          </div>
          <div class="form-group">
            <textarea class="form-control" row="2" name="qz_information" placeholder="Information"></textarea>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="total_points" placeholder="Total Points">
          </div>
          <div class="form-group">
           <select class="form-control" name="medium" id="medium">
             <option value="Sinhala Medium">Sinhala Medium</option>
             <option value="Tamil Medium">Tamil Medium</option>
             <option value="English Medium">English Medium</option>
           </select>
          </div>
          <div class="form-group">
            <input type="number" class="form-control"  name="attempts_allowed" placeholder="Attempts allowed">
            <small>if zero (0) unlimited attempts </small>
          </div>
          
       
      </div>      
      <input type="hidden" name="userId" id="userId" value="<?= $this->session->userdata('user_id'); ?>">
     </form>
      <div class="modal-footer">
        <div class="form-inline pull-right">
          <div class="form-group">
            <button type="button" class="btn btn-secondary" id="closeBtn" >Close</button>
            <button type="button" id="createQuizBtn" class="btn btn-primary">Create</button>
          </div>
        </div>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->