<?php include_once("template/header.php") ?>

<?php 

include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->select('kriteria'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();
?>

<div class="row">
    <table class="bordered">
        <thead>
            <tr>
                <th data-field="kriteria">Kriteria</th>
                <th data-field="bobot">Bobot</th>
                <th data-field="trend">Trend</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($res as $a) { ?>
            <tr>
                <td><?= $a['nama_kriteria'] ?></td>
                <td><?= $a['bobot'] ?></td>
                <td><?= $a['trend'] ?></td>
            </tr>

            <?php

            }

            ?>
        </tbody>
    </table>
</div>
<?php include_once("template/footer.php") ?>