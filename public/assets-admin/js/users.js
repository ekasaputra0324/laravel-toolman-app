const deletedUser = (id) => {
    swal({
        title: "Apakah anda yakin?",
        text: "Data akan di hapus secara permanen!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         location.href = '/delete-user/'.concat(id)
        }
      });
}

const updateUsers = (id) => {
    var user_id = id;
    $('#exampleModalLabel').html('Update Data User');
    $('#tambahedit').attr('action', '/update-user');
    $.ajax({
        type: "GET",
        url: "/getDataUsers/".concat(id),
        dataType: "json",
        success: function (res) {
            let data = res[0];
            $('#id').val(data.id);
            $('#name').val(data.name)
            $('#card_number').val(data.card_number)
            $('#email').val(data.email)
        }
    });
}

const tambahUser = (params) => {
    // document.getElementById("card_number").autofocus;
    $('#exampleModalLabel').html('Tambah Data User');
    $('#tambahedit').attr('action', '/add-user');
    $('#id').val(null);
    $('#name').val(null)
    $('#card_number').val(null)
    $('#email').val(null)
    $('#role').val(null);
}




