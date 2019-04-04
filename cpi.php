<?php 
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->sql('SELECT id_kriteria, min(nilai) as nilaiterkecil FROM `nilai` group by id_kriteria ORDER BY `nilai`.`id_kriteria` ASC');
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
<div class="row">
  <div class="card-panel">
    <h5>Composite Performance Index (CPI) <br> Tahap 2</h5>
    <table class="bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th><?= $kriteria[0]['nama_kriteria']."(".$kriteria[0]['bobot'].")"?></th>
          <th><?= $kriteria[1]['nama_kriteria']."(".$kriteria[1]['bobot'].")"?></th>
          <th><?= $kriteria[2]['nama_kriteria']."(".$kriteria[2]['bobot'].")"?></th>
          <th><?= $kriteria[3]['nama_kriteria']."(".$kriteria[3]['bobot'].")"?></th>
          <th><?= $kriteria[4]['nama_kriteria']."(".$kriteria[4]['bobot'].")"?></th>
          <th>TOTAL <small>(setelah dikali bobot)</small></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $count = sizeof($sampel);
        for($i=0;$i<$count;$i++){ 
          // $totalperrow[$i] = 0;
          $k1 = 0;
          $k2 = 0;
          $k3 = 0;
          $k4 = 0;
          $k5 = 0;
          ?>
        <tr>
          <td><?= $sampel[$i]['nama']?></td>
          <td>
            <?php if ($kriteria[0]['trend']=='positif') {
              $k1 = ($nilai[$i][0]['nilai']/$min[0]['nilaiterkecil'])*100;
            echo $k1;
          } elseif($kriteria[0]['trend']=='negatif'){
            $k1 = ($min[0]['nilaiterkecil']/$nilai[$i][0]['nilai'])*100;
            echo $k1;
          } ?>
          </td>
          <td>
            <?php if ($kriteria[1]['trend']=='positif') {
              $k2 = ($nilai[$i][1]['nilai']/$min[1]['nilaiterkecil'])*100;
            echo $k2;
          } elseif($kriteria[1]['trend']=='negatif'){
            $k2 = ($min[1]['nilaiterkecil']/$nilai[$i][1]['nilai'])*100;
            echo $k2;
          } ?>
          </td>
          <td>
            <?php if ($kriteria[2]['trend']=='positif') {
              $k3 = ($nilai[$i][2]['nilai']/$min[2]['nilaiterkecil'])*100;
            echo $k3;
          } elseif($kriteria[2]['trend']=='negatif'){
            $k3 = ($min[2]['nilaiterkecil']/$nilai[$i][2]['nilai'])*100;
            echo $k3;
          } ?>
          </td>
          <td>
            <?php if ($kriteria[3]['trend']=='positif') {
              $k4 = ($nilai[$i][3]['nilai']/$min[3]['nilaiterkecil'])*100;
            echo $k4;
          } elseif($kriteria[3]['trend']=='negatif'){
            $k4 = ($min[3]['nilaiterkecil']/$nilai[$i][3]['nilai'])*100;
            echo $k4;
          } ?>
          </td>
          <td>
            <?php if ($kriteria[4]['trend']=='positif') {
              $k5 =  ($nilai[$i][4]['nilai']/$min[4]['nilaiterkecil'])*100;
            echo $k5;
          } elseif($kriteria[4]['trend']=='negatif'){
            $k5 = ($min[4]['nilaiterkecil']/$nilai[$i][4]['nilai'])*100;
            echo $k5;
          } ?>
          </td>
          <?php 
            $totalperrow[$i] = ($k1*$kriteria[0]['bobot'])+($k2*$kriteria[1]['bobot'])+($k3*$kriteria[2]['bobot'])+($k4*$kriteria[3]['bobot'])+($k5*$kriteria[4]['bobot']);
          ?>
          <td><?= $totalperrow[$i] ?></td>
        </tr>
        <?php
        } ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="card-panel">
    <h5>Composite Performance Index (CPI) <br> Tahap 3</h5>
    <table class="bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Total</th>
          <th>Rank</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $count = sizeof($sampel);
        $ordered_values = $totalperrow;
				rsort($ordered_values);
        for($i=0;$i<$count;$i++){ 
          foreach ($ordered_values as $ordered_key => $ordered_value) {
            if ($totalperrow[$i] === $ordered_value) {
              $key = $ordered_key;
              break;
            }
          }
          ?>
        <tr>
          <td><?= $sampel[$i]['nama']?></td>
          <td><?= $totalperrow[$i]?></td>
          <td><?php echo ((int) $key + 1);?></td>
        </tr>
        <?php
        } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once("template/footer.php") ?>