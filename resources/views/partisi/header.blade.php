<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>KPP - Depok Cimanggis</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('vendor')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('vendor')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('vendor')}}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('vendor')}}/dist/css/style.css">
    <link rel="icon" href="{{asset('vendor')}}/dist/img/djp.ico">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        /* mulai style baru */
        /* body {
            font-family: 'Poppins';
            font-size: 89%;
        } */
        .dataTables_filter {
            text-align: right;
        }
        p {
            font-family: 'Poppins';
        }
        .main-footer {
            background-color: #253664;
            color: #ffffff
        }

        .bg-kpp {
            background-color: #253664;
            color: #ffffff;
        }

        .bg-kpp-1 {
            background-color: #253664;
            color: #ffc107;
        }
        .btn.bg-kpp:hover{
            background-color: #202e55;
            color: #ffc107;
        }
        label {
            text-align: left;
        }
        .form-inline.ps {
                margin-left: -18px;
                white-space: nowrap;
        }
        .form-inline.ps1 {
                margin-left: 190px;
                white-space: nowrap;
        }
        .form-inline.ps2 {
                margin-left: 59px;
                white-space: nowrap;
        }

        progress {
            border-radius: 20px;
            width: 100%;
            height: 22px;
            background-color: #e9ecef;
        }

        progress::-webkit-progress-bar {
            background-color: #e9ecef;
            border-radius: 20px;
        }

        progress::-webkit-progress-value {
            background-color: #17a2b8;
            border-radius: 20px;
        }
        
        progress.sudah-lapor::-webkit-progress-bar {
            background-color: #e9ecef;
            border-radius: 20px;
        }

        progress.sudah-lapor::-webkit-progress-value {
            background-color: #28a745;
            border-radius: 20px;
        }
        
        progress.belum-lapor::-webkit-progress-bar {
            background-color: #e9ecef;
            border-radius: 20px;
        }

        progress.belum-lapor::-webkit-progress-value {
            background-color: #dc3545;
            border-radius: 20px;
        }

        progress::-moz-progress-bar {
            background-color: #17a2b8;
            border-radius: 20px;
        }
        
        progress.sudah-lapor::-moz-progress-bar{
            background-color: #28a745;
            border-radius: 20px;
        }
        progress.belum-lapor::-moz-progress-bar{
            background-color: #dc3545;
            border-radius: 20px;
        }

        /* selesai style baru */

        /* untuk responsif */
        @media screen and (max-width: 767px) {

            .dataTables_filter {
                text-align: left;
            }
            .ps {
                margin-top: 5px;
                margin-left: -52%;
                white-space: nowrap;

            }
            .form-inline.ps {
                margin-left: 1%;
                white-space: nowrap;
            }
            .form-inline.ps1 {
                margin-left: 1%;
                white-space: nowrap;
        }
            .ps-right{
                margin-top: 5px;
                margin-left: -45%;
                white-space: nowrap;
            }
        }
        /* tutup responsif */

    </style>
</head>
