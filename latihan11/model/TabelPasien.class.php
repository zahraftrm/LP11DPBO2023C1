<?php

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDetailPasien($i)
	{
		// Query
		$query = "SELECT * FROM pasien WHERE id='$i'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien($data)
	{
		// Masukkan data
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telp'];

		// Query
		$query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telepon')";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasien($data)
	{
		// Masukkan data
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telp'];

		// Query
		$query = "UPDATE pasien SET nik = '$nik', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telepon' where id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($i)
	{
		// Query
		$query = "DELETE FROM pasien WHERE id = '$i'";

        // Mengeksekusi query
        return $this->execute($query);
	}
}
