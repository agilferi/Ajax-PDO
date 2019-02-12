<?php
include 'koneksi.php';

$nama = @$_POST['nama'];
$jk = @$_POST['jk'];
$alamat = @$_POST['alamat'];
$telp = @$_POST['telp'];
$id = @$_POST['id'];

if(@$_GET['page'] == 'tambah') {
	$insert = $db->prepare("INSERT INTO anggota(nama, jk, alamat, telp) VALUES(?, ?, ?, ?)");
	$insert->bindParam(1, $nama);
	$insert->bindParam(2, $jk);
	$insert->bindParam(3, $alamat);
	$insert->bindParam(4, $telp);
	$insert->execute();
	if($insert->rowCount() > 0 ) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit') {

	$edit = $db->prepare("UPDATE anggota SET nama = ?, jk = ?, alamat = ?, telp = ? WHERE id = ?");
	$edit->execute(array($nama, $jk, $alamat, $telp, $id));
	if($edit->rowCount() > 0 ) {
		echo "sukses";
	}

} else if(@$_GET['page'] == 'hapus') {

	$hapus = $db->prepare("DELETE FROM anggota WHERE id = :id");
	$hapus->bindParam(":id", $id);
	$hapus->execute();
	if($hapus->rowCount() > 0 ) {
		echo "sukses";
	}	

}
?>