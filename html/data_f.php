<!-- Row -->
<?php
require_once 'connection/connect.php';
session_start();
$date = date('d');
$q = mysqli_query($conn, "SELECT * FROM absen JOIN (SELECT fingerprint.fingerprint,struktur.* FROM fingerprint JOIN struktur ON fingerprint.nip = struktur.nip) AS people ON absen.fingerprint = people.fingerprint WHERE day(waktu) = '$date' ORDER BY waktu DESC");
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Informasi Kehadiran Hari Ini</h4>
                <div class="table-responsive m-t-40">
                    <table class="table stylish-table">
                        <thead>
                            <tr>
                                <th colspan="2">Nama</th>
                                <th>Jabatan</th>
                                <th>Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($dataP = mysqli_fetch_assoc($q)) { ?>
                                <tr>
                                    <td style="width:50px;"><img src="../assets/images/users/<?php echo  $dataP['foto']; ?>" class="round"></td>
                                    <td>
                                        <h6><?php echo $dataP['nama']; ?></h6>
                                    </td>
                                    <td><?php echo $dataP['jabatan']; ?></td>
                                    <td><?php echo date('d M Y H:i:s', strtotime($dataP['waktu'])); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->