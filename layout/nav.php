<?php
// NAV ACTIVE
function nav_active($nav_active = '')
{
    if ($nav_active == 'beranda') {
        $active = ['active', '', '', ''];
        return $active;
    }

    if ($nav_active == 'pengaduan_baru') {
        $active = ['', 'active', '', ''];
        return $active;
    }

    if ($nav_active == 'pengaduan') {
        $active = ['', '', 'active', ''];
        return $active;
    }

    if ($nav_active == 'manajemen') {
        $active = ['', '', '', 'active'];
        return $active;
    }

    if ($nav_active == '') {
        return;
    }
}

function sub_active($sub_active = '')
{
    if ($sub_active == 'total') {
        $sub = ['bg-primary text-white', '', '', ''];
        return $sub;
    }

    if ($sub_active == 'belum') {
        $sub = ['', 'bg-primary text-white', '', ''];
        return $sub;
    }

    if ($sub_active == 'proses') {
        $sub = ['', '', 'bg-primary text-white', ''];
        return $sub;
    }

    if ($sub_active == 'selesai') {
        $sub = ['', '', '', 'bg-primary text-white'];
        return $sub;
    }

    if ($sub_active == '') {
        return;
    }
}

$sub = sub_active($sub_active);
$nav = nav_active($nav_active);
?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">ADMAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $nav[0] ?>" aria-current="page" href="index.php">Beranda</a>
                </li>

                <?php
                if ($_SESSION['level'] == 'masyarakat') :
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $nav[1] ?>" aria-current="page" href="form_tambah_aduan.php">Buat pengaduan baru</a>
                    </li>
                <?php
                endif;
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= $nav[2] ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pengaduan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= $sub[0] ?>" href="show_pengaduan_total.php">Total Pengaduan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?= $sub[1] ?>" href="show_pengaduan_belum.php">Pengaduan Belum Di Proses</a></li>
                        <li><a class="dropdown-item <?= $sub[2] ?>" href="show_pengaduan_diproses.php">Pengaduan Dalam Proses</a></li>
                        <li><a class="dropdown-item <?= $sub[3] ?>" href="show_pengaduan_selesai.php">Pengaduan Selesai</a></li>
                    </ul>
                </li>

                <?php
                if ($_SESSION['level'] == 'admin') :
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $nav[3] ?>" href="manage_anggota.php">Manajemen Anggota</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="verifikasi_akun.php">Verifikasi Akun</a>
                    </li> -->
                <?php
                endif;
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> -->
            </ul>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form> -->

            <span class="navbar-text text-white">
                <?php echo $_SESSION['nama'] ?> (<a href='system/logout.php'>Keluar</a>)
            </span>
        </div>
    </div>
</nav>