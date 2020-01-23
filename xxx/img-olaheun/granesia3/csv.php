<?php
include ('db.php');
if(!isset($_POST['usia']) || !isset($_GET['usia']))
		$usia = 'semua_umur';
		
							if(	isset($_GET['ktp']) || isset($_GET['nama']) ||  
							    isset($_GET['usia']) ||
								isset($_GET['id_field']) || isset($_GET['id_lks_kerja']) || 
								isset($_GET['id_sistem_kerja']) ||
								isset($_GET['id_klasifikasi']) || 
								isset($_GET['id_fkerja'])){
									
								
								$sql = "SELECT tkjp.nm_lengkap as NamaLengkap,YEAR( curdate( ) ) - YEAR( tkjp.tgl_lahir ) as Usia, tkjp.no_ktp as NoKTP,tkjp.no_npwp as NoNPWP,tkjp.no_jamsostek as NoJamsostek,
									tkjp.no_rek_payroll as NoRekPayroll,tkjp.tmp_lahir as TempatLahir,tkjp.tgl_lahir as TanggalLahir,tkjp.alamat as Alamat,
									field.nm_field as NamaField,fungsi_kerja.fkerja as FungsiKerja,
									lokasi_kerja.lokasi as LokasiKerja,klasifikasi.klasifikasi as StatusKaryawan,sistem_kerja.waktu as WaktuKerja,
									tkjp.tmt as TMT,tkjp.nm_pekerjaan as JenisPekerjaan 
									FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											where status = 'aktif'";
										
										
										if($_GET['ktp']!= '0'){
											$ktp = $_GET['ktp'];
											$kondisi_ktp = " no_ktp LIKE '%$ktp%' || no_jamsostek LIKE '%$ktp%' ";
											$sql = $sql." AND ".$kondisi_ktp ;
										}
										
										
										if ($_GET['nama'] != '0'){
										$nama = $_GET['nama'];
											$kondisi_nama = " nm_lengkap LIKE '%$nama%' || nm_pekerjaan LIKE '%$nama%' ";
											$sql = $sql." AND ".$kondisi_nama ;
										}
										
											$tanggal_sekarang = date('Y-m-d');
											isset ($_POST['usia']) ? $usia = $_POST['usia'] : $usia = $_GET['usia'];
											
											if($usia == 'tua'){
											{					
												$kondisi_usia = "  YEAR( curdate( ) ) - YEAR( tgl_lahir ) >'55' ";
												$sql = $sql." AND ".$kondisi_usia;
											}
											}else if($usia == 'muda')
											{
												$kondisi_usia = " YEAR( curdate( ) ) - YEAR( tgl_lahir ) <='55' ";
												$sql = $sql." AND ".$kondisi_usia;
											}			
										
										
										if($_GET['id_field'] != '0'){
											$id_field = $_GET['id_field'];
											$kondisi_field = " tkjp.id_field = '$id_field' ";
											$sql = $sql." AND ".$kondisi_field;
										}
										
										
										
										if($_GET['id_fkerja'] != '0'){
											$id_fkerja = $_GET['id_fkerja'];
											$kondisi_fungsi_kerja = " tkjp.id_fkerja = '$id_fkerja' ";
											$sql = $sql." AND ".$kondisi_fungsi_kerja;
										}
										
										if($_GET['id_lks_kerja'] != '0'){
											$id_lks_kerja = $_GET['id_lks_kerja'];
											$kondisi_lokasi = " tkjp.id_lks_kerja = '$id_lks_kerja' ";
											$sql = $sql." AND ".$kondisi_lokasi;
										}
										
										
										if($_GET['id_sistem_kerja'] != '0'){
											$id_sistem_kerja = $_GET['id_sistem_kerja'];
											$kondisi_sistem_kerja = " tkjp.id_sistem_kerja = '$id_sistem_kerja' ";
											$sql = $sql." AND ".$kondisi_sistem_kerja;
										}

										if($_GET['id_klasifikasi'] != '0'){
											$id_klasifikasi = $_GET['id_klasifikasi'];
											$kondisi_klasifikasi = " tkjp.id_klasifikasi = '$id_klasifikasi' ";
											$sql =$sql." AND ". $kondisi_klasifikasi;
										}
										
										
									$query= $sql. " order by nm_lengkap";
									

							}
							
 
$header = '';
$data ='';
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $export );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );
 
if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}

$filename=date('Y:m:d')."".date('H:i:s')."_tkjp.xls";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";

?>