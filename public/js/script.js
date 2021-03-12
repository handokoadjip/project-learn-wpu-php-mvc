$(function () {

    $('.tampilModalTambah').on('click', function () {
        $('#judulModal').html('Tambah Data');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        // data('id') diambil dari html data-id
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });

});