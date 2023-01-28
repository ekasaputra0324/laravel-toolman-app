function deletedBarang(request) {
    let id_barang = request;
    console.log(id_barang);
    swal({
        title: "Apakah anda yakin?",
        text: "Data akan di hapus secara permanen!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         location.href = '/delete-barang/'.concat(id_barang)
        }
      });
}
// update barang ajax
$('.updatebarang').click(function () {
    var id = $(this).attr('data-id');
    console.log(id);
    $('#exampleModalLabel').html('Update Data Barang');
    $('#tambahedit').attr('action', '/update-barang');
    $.ajax({
        type: "GET",
        url: "/getDataBarang/".concat(id),
        dataType: "json",
        success: function (data) {
            let barang = data[0];
            $('#nama_barang').val(barang.nama_barang)
            $('#id').val(barang.id)
            $('#jumlah_barang').val(barang.jumlah_barang)
        }
    });


});
// add barang ajax
$('.tambahbarang').click(function () {
    $('#exampleModalLabel').html('Tambah Barang');
    $('#tambahedit').attr('action', '/add-barang');
    $('#nama_barang').val(null)
    $('#id').val(null)
    $('#jumlah_barang').val(null)

});
