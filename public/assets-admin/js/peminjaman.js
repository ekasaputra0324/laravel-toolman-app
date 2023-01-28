const  ConfirmPeminjaman = (id) => {

swal("Peminjaman telah di verified", {
    icon: "success",
});
window.location.href = "/peminjaman/acc/".concat(id)
}
const Pengembalian = (id) =>{
    swal({
        text: "pastikan barang sudah di kembalikan!",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "/pinjaman/pengembalian/".concat(id)
        } 
      });
}
const deletedPinjaman = (id,) =>{
  swal({
    text: "pastikan barang telah di kembalikan",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location.href = '/pinjaman/deleted/'.concat(id)
    } 
  });
} 

$('.updatepinjaman').click(function () { 
  let id = $(this).attr('data-id');
  $.ajax({
    type: "get",
    url: "/pinjaman/getdata/".concat(id),
    dataType: "json",
    success: function (data) {
      $('#exampleModalLabel').html('Update Data Pinjaman');
      $('#tambahedit').attr('action', '/pinjaman/update/'.concat(id));
      $("#user_id").val(data.user_id);
      $("#barang_id").val(data.barang_id);
      $("#jumlah_barang").val(data.jumlah_pinjaman);
      $("#tempat_peminjaman").val(data.tempat);
    }
  });
  
});
$('.tambahpinjaman').click(function () { 
      $('#exampleModalLabel').html('Tambah Data Pinjaman');
      $('#tambahedit').attr('action', 'pinjaman/storeAdmin');
      $("#user_id").val(null);
      $("#barang_id").val(null);
      $("#jumlah_barang").val(null);
      $("#tempat_peminjaman").val(null);
    });