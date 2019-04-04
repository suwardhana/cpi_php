<?php include_once("template/header.php") ?>
<?php
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->sql('SELECT id_kriteria, nama_kriteria, bobot, trend FROM kriteria where id_kriteria='.$_GET['id'].' limit 1');
$res = $db->getResult();
$a = $res[0];
?>
<div class="row">
  <div class="card-panel">
    <div class="row">
      <h5>Edit Kriteria</h5>
      <form action="save_kriteria.php" method="POST">
        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="" required name="nama_kriteria" value="<?= $a['nama_kriteria']?>">
          <label for="first_name">Nama Kriteria</label>
        </div>
        <div class="input-field col s12 l6">
          <input type="number" id="last_name" name="bobot" value="<?= $a['bobot']?>">
          <label for="last_name">Bobot</label>
        </div>
        <div class="input-field col s12 l6">
          <select name="trend">
            <!-- <option value="" disabled selected>Choose your option</option> -->
            <option value="positif">Positif</option>
            <option value="negatif">Negatif</option>
          </select>
          <label>Trend</label>
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $a['id_kriteria'] ?>">
    <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>
    </div>
    </form>
  </div>
</div>
<?php include_once("template/footer.php") ?>