<?php include_once("template/header.php") ?>

<div class="row">
    <div class="card-panel">
        <h5>Tambah Data</h5>
        <form action="save_peminjam.php">
            <div class="input-field col s12 l6">
                <input type="text" id="first_name" class="validate">
                <label for="first_name">Nama</label>
            </div>
            <div class="input-field col s12 l6">
                <input type="text" id="last_name" class="validate">
                <label for="last_name">Kontak</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
</div>

<?php include_once("template/footer.php") ?>