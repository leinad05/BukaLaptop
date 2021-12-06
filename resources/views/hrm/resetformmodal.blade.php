<form action="#" method="POST">
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input name="password" class="form-control" id="ePassword" placeholder="insert employee's new password">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 text-right">
            <button type="button" id="eBtnEdit" onclick="simpan_edit_hr({{ $employee->id }})"
                class="btn btn-primary">Reset</button>
            <a href="" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>

<script>
    function simpan_edit_hr(id_user) {
        $('#eBtnEdit').html('Saving data...');
        var password = $('#ePassword').val();

        $.post('{{ route('hr.simpan_reset_password_hr') }}', {
                _token: "<?php echo csrf_token(); ?>",
                id_user: id_user,
                password: password
            },
            function(data) {
                $('#eBtnEdit').html('Save');
                if (data.status == 'sukses') {
                    $('.modal').modal('hide');
                }
                // alert(data.msg);
            });
    }
</script>
