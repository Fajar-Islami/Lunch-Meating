var base_url = '<?php echo base_url();?>'
$("#formReservasi").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        var msg1 = "Apakah Anda yakin data sudah diisi semua? "
        submitMSG(false, msg1);
    } else {

        // everything looks good!

        var totalb = document.getElementById('total_biaya').value;
        var totalby = parseFloat(totalb.replace('.', ''));
        // console.log(totalby);
        event.preventDefault();
        if (totalby < 1) {
            formError();
            submitMSG(false, "Apakah Anda sudah memilih jumlah meja? Jika meja kosong silahkan pilih waktu yang lain");
        } else {


            Swal.fire({
                title: 'Apakah yakin data yang diisikan sudah benar?',
                text: 'Cek lagi deh, siapa tau masih ada yang salah',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya yakin',
                cancelButtonText: 'Tidak, cek lagi deh'

            }).then((result) => {
                if (result.value) {
                    // data reservasi
                    var id_waktu_meja = document.getElementById('id_waktu_meja').value;
                    var waktu_meja = document.getElementById('id_waktu_meja').options[document.getElementById('id_waktu_meja').selectedIndex].text
                    var jumlah_meja2 = parseFloat(document.getElementById('jumlah_meja').value.replace('.', ''));
                    var bayar_meja2 = parseFloat(document.getElementById('biaya_meja_2').value.replace('.', ''));
                    var jumlah_meja4 = parseFloat(document.getElementById('jumlah_meja_4').value.replace('.', ''));
                    var bayar_meja4 = parseFloat(document.getElementById('biaya_meja_4').value.replace('.', ''));
                    var total_biaya = parseFloat(document.getElementById('total_biaya').value.replace('.', ''));

                    // data diri
                    var nama = document.getElementById('nama').value;
                    var email = document.getElementById('email').value;
                    var notelp = document.getElementById('notelp').value;
                    var alamat = document.getElementById('alamat').value;

                    // console.log(base_url);
                    // console.log(id_waktu_meja);
                    // console.log(bayar_meja2);
                    // console.log(bayar_meja4);
                    Swal.fire({

                        // icon: 'success',
                        // title: 'YEAY!! Reservasi Meja Berhasil!',
                        // showConfirmButton: false,
                        // timer: 2000

                        title: 'Reservasi Kamu Hampir Selesai !!',
                        text: 'Silahkan cek E-mail dan WA kalian untuk meyelesaikan pemesanan reservasi!!',
                        icon: 'success'
                    },
                        $.ajax({
                            type: 'POST',
                            url: base_url + 'reservasi/pesan',
                            data: {
                                // data reservasi
                                'id_waktu_meja': id_waktu_meja,
                                'waktu_meja': waktu_meja,
                                'jumlah_meja2': jumlah_meja2,
                                'bayar_meja2': bayar_meja2,
                                'jumlah_meja4': jumlah_meja4,
                                'bayar_meja4': bayar_meja4,
                                'total_biaya': total_biaya,

                                // data diri
                                'nama': nama,
                                'email': email,
                                'notelp': notelp,
                                'alamat': alamat
                            },
                            success: function (data) {

                            }
                        })
                    ).then((result) => {
                        document.location.href = "home";
                    })
                }

            })
        }
    }
});

$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Apakah Anda yakin data sudah diisi semua ?");
    } else {
        // everything looks good!
        event.preventDefault();
        Swal.fire({
            title: 'Apakah yakin data yang diisikan sudah benar?',
            text: 'Cek lagi deh, siapa tau masih ada yang salah',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Saya yakin',
            cancelButtonText: 'Tidak, cek lagi deh'
        }).then((result) => {
            if (result.value) {
                var nama = document.getElementById('nama').value;
                var email = document.getElementById('email').value;
                var jenis_kel = document.getElementById('jenis_kel').value;
                var no_telp = document.getElementById('notelp').value;
                var alamat = document.getElementById('alamat').value;
                var pesan = document.getElementById('pesan').value;
                console.log(jenis_kel);
            } Swal.fire({

                title: 'Saran dan kritik kamu berhasil terkirim !!',
                text: 'Terimakasih atas saran dan kritik kamu',
                icon: 'success'
            },
                $.ajax({
                    type: 'POST',
                    url: base_url + 'kontak/pesan',
                    data: {
                        // data diri
                        'nama': nama,
                        'email': email,
                        'jenis_kel': jenis_kel,
                        'no_telp': no_telp,
                        'alamat': alamat,
                        'pesan': pesan
                    },
                    success: function (data) {

                    }
                })
            ).then((result) => {
                document.location.href = "home";
            })
        })
    }
});

$("#subsEmail").validator().on("submit", function (event) {
    event.preventDefault();
    var subsE = document.getElementById('subsE').value;
    console.log(subsE);

    if (validateEmail(subsE)) (
        Swal.fire({
            title: 'Berhasil berlangganan',
            text: 'Terimakasih telah berlangganan pada kami',
            icon: 'success'
        },
            $.ajax({
                type: 'POST',
                url: base_url + 'email/subs',
                data: {
                    // data diri
                    'subsE': subsE
                },
                success: function (data) {

                }
            })
            // document.getElementById('subsE').value = ''
        ))
    // location.reload();
});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
function submitForm() {
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var msg_subject = $("#msg_subject").val();
    var message = $("#message").val();


    $.ajax({
        type: "POST",
        url: "<?= base_url() ?>/assets/php/form-process.php",
        data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
        success: function (text) {
            if (text == "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError() {
    $("#contactForm, #formReservasi").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });

}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}