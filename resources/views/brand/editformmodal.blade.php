<form action="#" method="POST">
    <div class="form-group row">
        <label for="eName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" name="ini_nama_supplier" class="form-control" id="eName" placeholder="insert brand's name"
                value="{{ $brand->nama_brand }}" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 text-right">
            <button type="button" id="eBtnEdit" onclick="simpan_edit_brand({{ $brand->id }})" class="btn btn-primary">Update</button>
            <a href="" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>

<script>
    function simpan_edit_brand(id_brand) {
        $('#eBtnEdit').html('Saving data...');
        var name = $('#eName').val();

        $.post('{{ route('brands.simpan_edit_brand') }}',{
                _token: "<?php echo csrf_token() ?>"
                , id_brand: id_brand
                , name: name
            },
            function(data){
                $('#eBtnEdit').html('Save');
                if(data.status == 'sukses'){
                    $('.modal').modal('hide');
                    $('#data_name_'+id_brand).html(name);
                }
                // alert(data.msg);
            });
    }
</script>