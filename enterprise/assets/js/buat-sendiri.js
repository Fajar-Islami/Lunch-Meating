var base_url = '<?php echo base_url();?>'
// var value = '<?= json_encode($pTahun) ?>';   
const flashData = $('.flash-data').data('flashdata');
const icon = $('.flash-data').data('icon');
const title = $('.flash-data').data('title');
console.log(base_url);
if (flashData) {
    Swal.fire({
        title: title,
        text: flashData,
        icon: icon,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
    });
};

// tombol aktivasi pelanggan
$('.tombol-aktif').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const id = $(this).attr('data-id');

    Swal.fire({
        title: 'Aktifkan ID Pesanan ' + id + ' ?',
        text: 'ID Transaksi yang sudah diaktifkan tidak dapat dinonaktifkan !!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        } else {

        }
    })
});

// Update aktivasi
$(document).ready(function () {
    $(document).on('click', '#update', function () {
        var id = $(this).data('id');
        $('#id').text(id);
    })
})

// modal hapus
$(document).ready(function () {
    $(document).on('click', '#hapus', function () {
        var id = $(this).data('id');
        $('#id').text(id);
        var waktu = $(this).data('waktu');
        $('#waktu').text(waktu);

    })
})

function hapusdata(url) {
    $('#btn-hapus').attr('href', url);
    // mengubah attr href di footer modal hapus
}

// supaya muncul tulisan di upload gambar
$('.custom-file-input').on('change', function () {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
});

// // perubahan akses menu
// $('.form-check-input').on('click', function () {
//     const menuId = $(this).data('menu');
//     const roleId = $(this).data('role');
//     $.ajax({
//         url: "<?= base_url('admin/changeaccess'); ?>",
//         type: 'post',
//         data: {
//             menuId: menuId,
//             roleId: roleId
//         },
//         success: function () {
//             document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
//         }
//     });
// });

// input angka
function hanyaAngka(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && charCode < 48) || charCode > 57) {
        return false;
    }
    return true;
}

//script tabel
$(document).ready(function () {
    var table = $('#testabel').DataTable({
        "scrollX": true,
        language: {
            paginate: {
                previous: '&#8592',
                next: '&#8594'
            }
        },
        "oLanguage": {
            "sSearch": "Cari :"
        },

        buttons: ['copy', 'excel', {
            extend: 'colvis',
            text: 'Sembunyikan kolom'
        }],
        dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
        lengthMenu: [
            [5, 10, 25, 50, 100, -1], //jumlah yg tampil
            [5, 10, 25, 50, 100, "Semua"] //tampilan labelnya
        ],
        columnDefs: [{
            targets: -1,
            orderable: false,
            searchable: false
        }],
        order: [[0, 'asc']]
    });

    // supaya nomor gk acak
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    table.buttons().container()
        .appendTo('#testabel_wrapper .col-md-6:eq(0)');

    // script waktu
    $('.jammulai').timepicker({
        uiLibrary: 'bootstrap4'
    });

    $('.jamselesai').timepicker({
        uiLibrary: 'bootstrap4'
    });
});


$("body").on("click", ".pagination a", function () {
    var theUrl = $(this).attr('href');

    $('#komenmasukan').load(theUrl);
    // document.location.href = theUrl;
    return false
});


