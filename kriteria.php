<?php include_once("template/header.php") ?>

<?php 

include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->select('kriteria');
$res = $db->getResult();
?>

<div class="row">
  <div class="card-panel">
    <table class="bordered">
      <thead>
        <tr>
          <th>Kriteria</th>
          <th>Bobot</th>
          <th>Trend</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $totalbobot = 0;
            foreach ($res as $a) { ?>
        <tr>
          <td><?= $a['nama_kriteria'] ?></td>
          <td><?= $a['bobot'] ?></td>
          <td><?= $a['trend'] ?></td>
          <td><a href="edit_kriteria.php?id=<?= $a['id_kriteria']?>" class="waves-effect waves-light btn">Edit</a></td>
        </tr>
        <?php
          $totalbobot += $a['bobot'];  
          }
            ?>
        <tr>
          <td style="text-align:right">Total</td>
          <td><?= $totalbobot?></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
<?php include_once("template/footer.php") ?>