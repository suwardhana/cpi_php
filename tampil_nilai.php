<?php include_once("template/header.php") ?>

<?php 

include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->sql('select nama, nama_kriteria, nilai from nilai join calon_peminjam on nilai.id_calon=calon_peminjam.id_calon join kriteria on nilai.id_kriteria=kriteria.id_kriteria order by id_nilai'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();
?>

<div class="row">
  <div class="card-panel">
    <h5>Data Calon Peminjam</h5>
    <a href="nilai.php" class="waves-effect waves-light btn">Nilai Calon</a>
    <table class="bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Calon Peminjam</th>
          <th>Kategori</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;
            foreach ($res as $a) { ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $a['nama'] ?></td>
          <td><?= $a['nama_kriteria'] ?></td>
          <td><?= number_format($a['nilai']) ?></td>
        </tr>
        <?php
                $i++;
            }
            ?>
      </tbody>
    </table>
  </div>

</div>
<?php include_once("template/footer.php") ?>