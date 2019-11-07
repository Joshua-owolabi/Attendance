<!-- Modal -->
<div class="modal fade" id="reset_attendance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Attendance</h5>
                <button type="button" class="close" data-dismis="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('attendance.reset') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row mt-3 mb-3">
                        <div class="col-md-12">
                            <h3 class="text-center">Your About To Reset All Attendance, <br> Are You Sure !!!</h3>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger text-center" style="margin: 1em auto;">Reset
                            Attendance</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
