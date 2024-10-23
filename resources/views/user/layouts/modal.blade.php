{{-- Modal Logout --}}
<form action="/logout" method="post">
  @csrf
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Logout</button>
        </div>
      </div>
    </div>
  </div>
</form>
{{-- End Modal Logout --}}

{{-- Modal Image Preview --}}
<div id="modal-preview-image" class="modal" tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.3)">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Image Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="close-modal">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 25em; overflow:scroll">
        <img alt="" id="image-preview">
      </div>
      <div class="modal-footer">
        <div class="button-group-area mt-40">
          <button type="button" class="btn btn-secondary radius" id="cancel-modal">Cancel</button>
          <button type="button" class="btn btn-primary radius" id="save-modal">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- End Modal Image Preview --}}
