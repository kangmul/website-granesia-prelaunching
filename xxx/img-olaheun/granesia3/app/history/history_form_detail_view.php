<div class="container">
		<div class="row-fluid">
			<div class="span9">
				<h3> Detail History</h3>
					<?if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}?>

		 <?php
			include ('path.php');
			$file = $_GET['nama_file'];
		 
			$namafile = $root."\\log\\".$file;
			$handle = fopen ($namafile, "r");
			if (!$handle) {
			 echo "Gagal";
			} else {
			
				while(true)
				{
					$isi = fgets ($handle, 2048);
					if($isi == null)break;
						echo "$isi</br>";
						//echo $isi;
				}
			}
			fclose($handle);
		?>
			</div>
		</div>
</div>