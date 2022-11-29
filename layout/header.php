<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Logout jika diam -->
    <meta http-equiv="refresh" content="900;url=system/logout.php" />

    <title>ADMAS SMK AL AMANAH</title>
    <link rel="icon" href="svg/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="fa/css/all.min.css">

    <!-- CSS -->
    <style>
        body {
            min-height: 400px;
            margin-bottom: 130px;
            clear: both;
        }

        /* FOR MOBILE */
        @media only screen and (min-width: 768px) {
            .device-mobile {
                display: none;
            }
        }

        /* FOR DESKTOP */
        /* @media only screen and (min-width: 768px) {
        .device-tablet {
            display: none;
        }
    } */

        /* FOR TABLET -> DESKTOP */
        @media only screen and (max-width: 600px) {
            .device-desktop {
                display: none;
            }
        }
    </style>
</head>

<body>

    <?php
    function kembali()
    {
        $kembali = "<script>
                        function kembali() {
                            history.go(-1);
                        }
                        kembali();
                    </script>";

        return $kembali;
    }
    ?>