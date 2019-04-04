<?php include_once("template/header.php") ?>

<?php 

include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->select('kriteria');
$a = $db->getResult();

$db->sql('SELECT calon_peminjam.* FROM calon_peminjam 
LEFT JOIN nilai
ON nilai.id_calon = calon_peminjam.id_calon
WHERE nilai.id_calon IS NULL');
$b = $db->getResult();
?>

<div class="row">
  <div class="card-panel">
    <h5>Nilai Calon Peminjam </h5>
    <form action="save_nilai.php" method="POST">
      <div class="row">
        <div class="input-field col s12 l6">
          <select name="id_calon">
            <?php foreach($b as $calon) :?>
            <option value="<?= $calon['id_calon']?>"><?= $calon['nama']?></option>
            <?php endforeach; ?>
          </select>
          <label>Pilih Calon</label>
        </div>
      </div>
      <div class="row">

        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="" required name="nilai[]">
          <label for="first_name"><?= $a[0]['nama_kriteria']?></label>
        </div>
        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="" required name="nilai[]">
          <label for="first_name"><?= $a[1]['nama_kriteria']?></label>
        </div>
        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="" required name="nilai[]">
          <label for="first_name"><?= $a[2]['nama_kriteria']?></label>
        </div>
        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="" required name="nilai[]">
          <label for="first_name"><?= $a[3]['nama_kriteria']?></label>
        </div>
        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="" required name="nilai[]">
          <label for="first_name"><?= $a[4]['nama_kriteria']?></label>
        </div>
      </div>
      <div class="row">

        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
</div>

<?php include_once("template/footer.php") ?>