<?php 
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->sql('SELECT id_kriteria, min(nilai) FROM `nilai` group by id_kriteria ORDER BY `nilai`.`id_kriteria` ASC');
$min = $db->getResult();
$db->sql('SELECT calon_peminjam.nama, nilai.id_calon from nilai join calon_peminjam on nilai.id_calon=calon_peminjam.id_calon GROUP by nilai.id_calon');
$sampel = $db->getResult();
$db->select('kriteria');
$kriteria = $db->getResult();
?>
<?php include_once("template/header.php") ?>
<div class="row">
  <div class="card-panel">
    <h5>Composite Performance Index (CPI) <br> Tahap 1</h5>
    <table class="bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th><?= $kriteria[0]['nama_kriteria']?></th>
          <th><?= $kriteria[1]['nama_kriteria']?></th>
          <th><?= $kriteria[2]['nama_kriteria']?></th>
          <th><?= $kriteria[3]['nama_kriteria']?></th>
          <th><?= $kriteria[4]['nama_kriteria']?></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $count = sizeof($sampel);
        for($i=0;$i<$count;$i++){ 
          $db->sql('select nilai from nilai where id_calon='.$sampel[$i]['id_calon'].' order by id_kriteria ');
          $nilai[$i] = $db->getResult();
          ?>
        <tr>
          <td><?= $sampel[$i]['nama']?></td>
          <td><?= $nilai[$i][0]['nilai']?></td>
          <td><?= $nilai[$i][1]['nilai']?></td>
          <td><?= $nilai[$i][2]['nilai']?></td>
          <td><?= $nilai[$i][3]['nilai']?></td>
          <td><?= $nilai[$i][4]['nilai']?></td>
        </tr>
        <?php
        } ?>
      </tbody>
    </table>
  </div>
</div>


<?php include_once("template/footer.php") ?>