const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Data Berhasil ',
        text: 'Berhasil' + flashData,
        type: 'success'
    });
}