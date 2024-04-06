$(function() {
    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });
    $('.tampilModalEdit').on('click', function() {
        $('#formModalLabel').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/php-mvc-crud/public/mahasiswa/edit');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/php-mvc-crud/public/mahasiswa/getEdit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            }
        });
    });


});