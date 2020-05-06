const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {
    Swal.fire({
        title: 'Data Menu',
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}

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
}

// supaya muncul tulisan di upload gambar
$('.custom-file-input').on('change', function () {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
});

// perubahan akses menu
$('.form-check-input').on('click', function () {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');
    $.ajax({
        url: "<?= base_url('admin/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function () {
            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }
    });
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

// Chart

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Minggu Area Chart Example
var ctx = document.getElementById("mingguAreaChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Earnings",
            fill: false,
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function (value, index, values) {
                        return '$' + number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function (tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});

// Bulan Area Chart Example
var ctx = document.getElementById("bulanAreaChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Earnings",
            fill: false,
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function (value, index, values) {
                        return '$' + number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function (tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});

// // Tahun Area Chart Example
// var ctx = document.getElementById("tahunAreaChart");
// var myLineChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
//         datasets: [{
//             label: "Earnings",
//             fill: false,
//             lineTension: 0.3,
//             backgroundColor: "rgba(78, 115, 223, 0.05)",
//             borderColor: "rgba(78, 115, 223, 1)",
//             pointRadius: 3,
//             pointBackgroundColor: "rgba(78, 115, 223, 1)",
//             pointBorderColor: "rgba(78, 115, 223, 1)",
//             pointHoverRadius: 3,
//             pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
//             pointHoverBorderColor: "rgba(78, 115, 223, 1)",
//             pointHitRadius: 10,
//             pointBorderWidth: 2,
//             data: json_encode($pTahun)
//         }],
//     },
//     options: {
//         maintainAspectRatio: false,
//         layout: {
//             padding: {
//                 left: 10,
//                 right: 25,
//                 top: 25,
//                 bottom: 0
//             }
//         },
//         scales: {
//             xAxes: [{
//                 time: {
//                     unit: 'date'
//                 },
//                 gridLines: {
//                     display: false,
//                     drawBorder: false
//                 },
//                 ticks: {
//                     maxTicksLimit: 7
//                 }
//             }],
//             yAxes: [{
//                 ticks: {
//                     maxTicksLimit: 5,
//                     padding: 10,
//                     // Include a dollar sign in the ticks
//                     callback: function (value, index, values) {
//                         return '$' + number_format(value);
//                     }
//                 },
//                 gridLines: {
//                     color: "rgb(234, 236, 244)",
//                     zeroLineColor: "rgb(234, 236, 244)",
//                     drawBorder: false,
//                     borderDash: [2],
//                     zeroLineBorderDash: [2]
//                 }
//             }],
//         },
//         legend: {
//             display: false
//         },
//         tooltips: {
//             backgroundColor: "rgb(255,255,255)",
//             bodyFontColor: "#858796",
//             titleMarginBottom: 10,
//             titleFontColor: '#6e707e',
//             titleFontSize: 14,
//             borderColor: '#dddfeb',
//             borderWidth: 1,
//             xPadding: 15,
//             yPadding: 15,
//             displayColors: false,
//             intersect: false,
//             mode: 'index',
//             caretPadding: 10,
//             callbacks: {
//                 label: function (tooltipItem, chart) {
//                     var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
//                     return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
//                 }
//             }
//         }
//     }
// });
