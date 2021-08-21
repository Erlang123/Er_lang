<?php
session_start();
// Pengaturan koneksi server database

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbpus";

// Membuat koneksi ke database

$conn = mysqli_connect($servername, $username, $password, $dbname);


// Membuat variabel selector processing block

$selector = $_GET[""];

// Membuat variabel detail database

$namatabel = "";
// Karena tabelnya cuman satu, sekalian detail yang dibutuhkan dari tabel didefinisikan juga

$jumlah_baris = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM " . $namatabel)); // tipe Integer

// Process
	// Memakai variabel selector untuk memilah blok pemroses data
switch ($selector){
	case "": // Blok untuk memproses INSERT data (unfin)
		
		// Menyusun query untuk bagian value dari statement INSERT data (unfin)
		$query = "'" . $jumlah_baris . "', '" . /* nama */ . "', '" . /* jenis kelamin */ . "', '" . /* alamat */ . "', '" . /* status */ . "'";
			
		// Menyusun dan mengeksekusi statement (unfin)
		if($mysqli_query($conn, "INSERT INTO " . $namatabel . " VALUES (" . $query . ")")){
		
		// Membuat session untuk menggunakan notifikasi
			$_SESSION["isadded"] = true;
			
		// Mengarahkan pengguna ke halaman yang ditentukan
			header("location:"); // (unfin)
		}
		else{
			
		// Membuat session untuk menggunakan notifikasi
			$_SESSION["isadded"] = false;
			
		// Mengarahkan pengguna ke halaman yang ditentukan
			header("location:"); // (unfin)
		}
	break;
	case "": // Blok untuk memproses DELETE data (unfin)
		
		// Mengeksekusi query yang berdasarkan ID data
		if($mysqli_query($conn, "DELETE FROM " . $namatabel . " WHERE ID = '" . /* ID */ . "'")){
		
		// Membuat session untuk menggunakan notifikasi
			$_SESSION["isdeleted"] = true;
			
		// Mengarahkan pengguna ke halaman yang ditentukan
			header("location:"); // (unfin)
		}
		else{
			
		// Membuat session untuk menggunakan notifikasi
			$_SESSION["isdeleted"] = false;
			
		// Mengarahkan pengguna ke halaman yang ditentukan
			header("location:"); // (unfin)
		}
	break;
	case "": // Blok untuk memproses SELECT data (unfin)
		
		// Karena data yang dibutuhkan untuk ditampilkan ke tabel adalah seluruh record tanpa terkecuali
		$result = $mysqli($conn, "SELECT * FROM " . $namatabel . "");
		
		// Cek apakah data dalam tabel lebih dari 0
		if(mysqli_num_rows($result) > 0){ // Blok ini yang akan dieksekusi ketika semua kondisi bernilai true
			
			// Membuat session untuk menandakan bahwa data tersedia dalam tabel di database
			$_SESSION["isavailableforview"] = true;
			
			// Membuat kontainer array satu dimensi yang kosong
			$_SESSION["alldata"] = array();
			
			// Menyusun data yang dipilih oleh query SELECT ke dalam array satu dimensi
			while($row = mysqli_fetch_row($result)){
				
				// Mengisi elemen array ke dalam kontainer array
				array_push($_SESSION["alldata"], $row);
			}
		}
		else{
			
			// Membuat session untuk menandakan bahwa data tidak tersedia dalam tabel di database
			$_SESSION["isavailable"] = false;
		}
	break;
	case "": // Blok untuk memproses CHANGE data (unfin)
		
		// Mencari data yang dimaksud
		$result = mysqli_query($conn,
			"SELECT ID FROM ID = '" . /* ID */ . "' && nama = '" . /* nama */ . "' &&
			jenis_kelamin = '" . /* jenis kelamin */ . "' && alamat = '" . /* alamat */ . "' &&
			status = '" . /* status */);
		
		// Mengecek apakah data ada atau tidak
		if(mysqli_num_rows($result) > 0){ // Blok ini yang akan dieksekusi ketika semua kondisi bernilai true
			
			// Mengubah nilai sesuai data yang ditentukan oleh ID, dengan data yang telah diubah
			while($row = mysqli_fetch_row($result)){
				mysqli_query($conn, "UPDATE " . $namatabel . "
					SET ID = '" . /* ID */ . "', nama = '" . /* nama */ . ", jenis_kelamin = '" . /* jenis kelamin */ . "', alamat = '" . /* alamat */ . "', status = '" . /* status */ . "' WHERE ID = '" . $row[0]);
			}
		}
		else{
			$_SESSION["isavailableforchange"] = false;
		}
	break;
	default:
}
//$var1 = $_GET[""]; $var6 = $_GET[""];
//$var2 = $_GET[""]; $var7 = $_GET[""];
//$var3 = $_GET[""]; $var8 = $_GET[""];
//$var4 = $_GET[""]; $var9 = $_GET[""];
//$var5 = $_GET[""]; $var10 = $_GET[""];
?>
