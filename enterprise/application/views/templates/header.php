<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets'); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/datatables-1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">

    <!-- Waktu -->
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

    <!-- Chart -->
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>


    <style>
        .ket {

            position: relative;
            background: #ff3466;
            padding: 5px 12px;
            margin: 5px;
            font-size: 10px;
            border-radius: 100%;
            color: black;
        }

        .ket:before,
        .ket:after {
            position: absolute;
            content: '';
            opacity: 0;
            transition: all 0.4s ease;
        }

        .ket:before {
            border-width: 10px 8px 0 8px;
            border-style: solid;
            border-color: #ff3466 transparent transparent transparent;
            top: -10px;
            transform: translateY(20px);
        }

        .ket:after {
            text-align: left;
            content: attr(data-ket);
            background: #ff3466;
            width: 160px;
            height: 40px;
            font-size: 13px;
            font-weight: 300;
            top: -50px;
            left: -10px;
            padding-left: 5px;
            border-radius: 5px;
            letter-spacing: 1px;
            transform: translateY(20px);
        }

        .ket:hover::before,
        .ket:hover::after {
            opacity: 1;
            transform: translateY(-2px);
        }

        @keyframes shake {
            0% {
                transform: rotate(2deg);
            }

            50% {
                transform: rotate(-3deg);
            }

            70% {
                transform: rotate(3deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        #anim:hover {
            animation: shake 500ms ease-in-out forwards;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">