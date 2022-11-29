<?php
session_start();

if (!empty($_SESSION['nik'])) {
    include "../koneksi.php";

    $sql_pengaduan = "SELECT * FROM pengaduan pa INNER JOIN masyarakat ma ON pa.nik = ma.nik WHERE `status`='proses' ORDER BY id_pengaduan DESC";
    $exc_pengaduan = mysqli_query($koneksi, $sql_pengaduan);
    $jml_pengaduan = mysqli_num_rows($exc_pengaduan);

    header("content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=report_proses.xls");
?>

    <h4>Tabel Pengaduan Sedang Diproses</h4>

    <table border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Masyarakat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Isi Pengaduan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            function status_pengaduan($data)
            {
                if ($data['status'] == '0') {
                    return "Belum diproses";
                } elseif ($data['status'] == 'proses') {
                    return "Dalam proses";
                } elseif ($data['status'] == 'selesai') {
                    return "Selesai";
                }

                return;
            }

            foreach ($exc_pengaduan as $data) :

            ?>

                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td>'<?= $data['nik'] ?>'</td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tgl_pengaduan'] ?></td>
                    <td><?= $data['isi_laporan'] ?></td>
                    <td><?= status_pengaduan($data) ?></td>
                </tr>

            <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>

    <p>Jumlah Laporan Yang Masuk <?= $jml_pengaduan ?></p>


<?php
}
?>