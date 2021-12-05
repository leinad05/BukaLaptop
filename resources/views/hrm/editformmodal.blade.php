<form action="#" method="POST">
    <div class="form-group row">
        <label for="eName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" name="ini_nama_supplier" class="form-control" id="eName"
                placeholder="insert employee's name" value="{{ $employee->name }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="eEmail" placeholder="insert employee's email" value="{{ $employee->email }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input name="password" class="form-control" id="ePassword" placeholder="insert employee's new password" value="{{ $employee->password }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 text-right">
            <button type="button" id="eBtnEdit" onclick="simpan_edit_hr({{ $employee->id }})"
                class="btn btn-primary">Update</button>
            <a href="" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>

<script>
    function simpan_edit_hr(id_user) {
        $('#eBtnEdit').html('Saving data...');
        var name = $('#eName').val();
        var email = $('#eEmail').val();
        var password = $('#ePassword').val();

        $.post('{{ route('hr.simpan_edit_hr') }}', {
                _token: "<?php echo csrf_token(); ?>",
                id_user: id_user,
                name: name,
                email: email,
                password: password
            },
            function(data) {
                $('#eBtnEdit').html('Save');
                if (data.status == 'sukses') {
                    $('.modal').modal('hide');
                    $('#data_name_' + id_user).html(name);
                    $('#data_email_' + id_user).html(email);
                }
                // alert(data.msg);
            });
    }
</script>
