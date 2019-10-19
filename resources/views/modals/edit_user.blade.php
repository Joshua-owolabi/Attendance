<!-- Modal -->
<div class="modal fade" id="update_user_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('member.update') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <div class="row mt-3 mb-3">
            <div class="col-md-12">
              <div class="form-group input-group input-group-lg">
                <label for=""> Change User Rank</label>
                <select class="form-control form-control-lg" name="user_rank" value="{{ old('user_rank') }}" required>
                  <option value="{{ $user->user_rank }}">{{ ucfirst($user->user_rank) }}</option>
                  <option value="admin">Admin</option>
                  <option value="exco">Exco</option>
                  <option value="member">Member</option>
                  {{-- @if (Auth()->user()->user_rank == 'developer') --}}
                  <option value="developer">Developer</option>
                  {{-- @endif --}}
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group input-group input-group-lg">
                <label for="">Change User Sub Unit</label>
                <select class="form-control form-control-lg" name="sub_unit" value="{{ old('sub_unit') }}" required>
                  <option value="{{ $user->sub_unit }}">{{ ucfirst($user->sub_unit) }}</option>
                  <option value="utility">Utility</option>
                  <option value="mopping">Mopping</option>
                  <option value="sweeping">Sweeping</option>
                  <option value="rug">Rug</option>
                  <option value="white house">White House</option>
                  <option value="suveillance">Suveillance</option>
                  <option value="arrangement">Arrangement</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>