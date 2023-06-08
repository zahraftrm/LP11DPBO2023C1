<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/Form.php");


$tf = new form();

// Ketika add data
if (isset($_POST['Submit'])) {
    $tf->addPasien($_POST);
}
// Ketika update data tampilkan data yg pada databasenya 
else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $tf->updateData($id);
} 
// Ketika update data
else if (isset($_POST['Update'])) {
    $tf->updatePasien($_POST);
}
// Ketika hapus data
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $tf->deletePasien($id);
} 
// Menampilkan data
else {
    $data = $tf->tampil();
}