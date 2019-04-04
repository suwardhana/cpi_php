<?php include_once("template/header.php") ?>

<?php 

include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->select('calon_peminjam'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();
?>

<div class="row">
  <div class="card-panel">
    <h5>Data Calon Peminjam</h5>
    <table class="bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kontak</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;
            foreach ($res as $a) { ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $a['nama'] ?></td>
          <td><?= $a['kontak'] ?></td>
          <td><a href="hapus_calon.php?id=<?= $a['id_calon']?>" class="waves-effect waves-light btn">hapus</a>
          </td>
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