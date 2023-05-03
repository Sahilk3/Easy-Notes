  <!-- modal start here -->
  <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="insertModalLabel">New note</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="mb-3">
                <textarea class="form-control form-control-sm" id="title" name="title" placeholder="Title" required  cols="30" rows="1" ></textarea>
              </div>
              <input type="hidden" name="id" id="id" >
              <div class="mb-3">
                <textarea class="form-control form-control-sm"  id="note" name="note" placeholder="Note" required cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Note</button>
            </div>
          </form> 
        </div>
      </div>
    </div>
   