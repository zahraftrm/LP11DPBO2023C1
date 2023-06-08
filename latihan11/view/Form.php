<?php

include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class Form implements KontrakPasienView
{
     // Presenter yang dapat berinteraksi langsung dengan view
    private $prosespasien;
    private $tpl;

    // Constructor   
    public function __construct() {
        $this->prosespasien = new ProsesPasien();
    }

    public function tampil() {
        // Membaca template skin.html
		$this->tpl = new Template("templates/form.html");
		
        // Mengganti kode Judul Data dan Nama Button dengan data yang sudah diproses
		$this->tpl->replace("DATA_TITLE", "Tambah Data Pasien");
        $this->tpl->replace("DATA_BUTTON","Submit");

		// Menampilkan ke layar
		$this->tpl->write();
    }

    public function updateData($id) {
        
        $this->prosespasien->prosesDataPasien();
	    
        // Membaca template skin.html
		$this->tpl = new Template("templates/form.html");
        $form = "<input type='hidden' name='id' value='" . $this->prosespasien->getId($id) . "'>";
		
        // Mengganti kode Data dengan data yang sudah diproses
		$this->tpl->replace("DATA_TITLE", "Edit Data Pasien");

        // Menampilkan data yang ada di database ketika mau mengupdate data
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($id));
		$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($id));
		$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($id));
		$this->tpl->replace("DATA_TL", $this->prosespasien->getTl($id));
		$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($id));
		$this->tpl->replace("DATA_TELP", $this->prosespasien->getTelepon($id));
        $lk = $this->prosespasien->getGender($id) === "Laki-laki" ? "checked" : "";
        $pr = $this->prosespasien->getGender($id) === "Perempuan" ? "checked" : "";
		$this->tpl->replace("DATA_LAKI", $lk);
        $this->tpl->replace("DATA_PEREMPUAN", $pr);
        $this->tpl->replace("DATA_HIDDEN", $form);
        $this->tpl->replace("DATA_BUTTON","Update");
        $this->tpl->write();
    }

    // Fungsi tambah data untuk mengambil recordnya
    function addPasien($data){
        $this->prosespasien->addPasien($data);
    }
    
    // Fungsi update data untuk mengambil recordnya
    function updatePasien($data){
        $this->prosespasien->updatePasien($data);
    }

    // Fungsi delete data untuk mengambil recordnya
    function deletePasien($i)
	{
		$this->prosespasien->deletePasien($i);
	}

}