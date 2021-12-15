$(document).ready(function() {
    $('#tombol-simpan').click(function(e) {
        e.preventDefault();
        var dataform = $('#formmasuk')[0];
        var data = new FormData(dataform);

        //var input_foto = $('#input_foto').val();
        var login = $('#login').val();
        var email = $('#email').val();
        var password = $('#password').val();

        if (email == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email belum diisi !'
            })
        } else if (password == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password belum diisi !'
            })
        } else {
            $.ajax({
                url: 'models/login.php',
                type: 'post',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                success: function(hasil) {

                    //sukses
                    if (hasil == 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Email Belum terdaftar'
                        });

                    } else if (hasil == 2) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Password Salah'
                        });
                    } else if (hasil == 3) {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Login Berhasil",
                            showConfirmButton: !1,
                            timer: 1500
                        }).then(function() {
                            //location.reload();
                            document.location.href = 'menu';
                        });

                    }
                }
            });
        }
    })
});