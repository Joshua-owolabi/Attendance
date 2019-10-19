<!-- Modal -->
<div class="modal fade" id="delete_member_{{ $user->id }}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('member.delete') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <div class="row mt-3 mb-3">
            <div class="col-md-12">
              <h3 class="text-center">Your About To Remove A Member, <br> Are You Sure !!!</h3>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-danger text-center" style="margin: 1em auto;">Remove Member</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>