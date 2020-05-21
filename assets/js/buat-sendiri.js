//email
$("#email").keyup(function () {
    var email = $("#email").val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)) {
        //alert('Please provide a valid email address');
        $("#error_email").text("Harap Masukan Alamat Email yang Valid");
        // email.focus;
        //return false;
    } else {
        $("#error_email").text("");
    }
});
//email

$("#subsE").keyup(function () {
    var subsE = $("#subsE").val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(subsE)) {
        //alert('Please provide a valid email address');
        $("#error_email").text("Harap Masukan Alamat Email yang Valid");
        // email.focus;
        //return false;
    } else {
        $("#error_email").text("");
    }
});

// input angka
function hanyaAngka(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && charCode < 48) || charCode > 57) {
        return false;
    }
    return true;
}

// enable tombol jumlah
function enable() {
    document.getElementById("jumlah_meja").disabled = false;
    $("#biaya_meja_2").val("0,00");
    document.getElementById("jumlah_meja_4").disabled = false;
    $("#biaya_meja_4").val("0,00");
}

// pilih jumlah meja 
$(document).ready(function () {
    $('#id_waktu_meja').on('change', function () {
        var id = $('#id_waktu_meja').val();
        $.ajax({
            type: 'POST',
            url: base_url + "/reservasi/jumlahMejaReservasi2",
            data: {
                'id': id
            },
            success: function (data) {
                $("#jumlah_meja").html(data);
            },
        }),
            $.ajax({
                type: 'POST',
                url: base_url + '/reservasi/jumlahMejaReservasi4',
                data: {
                    'id': id
                },
                success: function (data) {
                    $("#jumlah_meja_4").html(data);
                }
            })

    })
})




// pilih jumlah meja 2
$(document).ready(function () {
    $('#jumlah_meja').on('change', function () {
        var id = $('#jumlah_meja').val();
        var harga = $('#id_waktu_meja').val();
        // var kali = id * 1000;
        $.ajax({
            type: 'POST',
            url: base_url + 'reservasi/totalbiayaMeja2',
            data: {
                'harga': harga,
                'id': id
            },
            success: function (data) {
                $("#biaya_meja_2").val(formatNumber(data));
                total();
            }
        })

    })
})

// pilih jumlah meja 4
$(document).ready(function () {
    $('#jumlah_meja_4').on('change', function () {
        var id = $('#jumlah_meja_4').val();
        var harga = $('#id_waktu_meja').val();
        // var kali = id * 1000;
        $.ajax({
            type: 'POST',
            url: base_url + 'reservasi/totalbiayaMeja4',
            data: {
                'harga': harga,
                'id': id
            },
            success: function (data) {
                $("#biaya_meja_4").val(formatNumber(data));
                total();
            }
        });

    })
})

// format biaya
function formatNumber(num) {
    return Number.parseFloat(num).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

// total biaya
function total() {
    var meja2 = document.getElementById('biaya_meja_2').value.replace('.', '');
    var meja4 = document.getElementById('biaya_meja_4').value.replace('.', '');
    var totalbiaya = parseFloat(meja2) + parseFloat(meja4);

    if (!isNaN(totalbiaya)) {
        document.getElementById('total_biaya').value = formatNumber(totalbiaya);
    }
}