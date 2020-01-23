<h3>Referensi No PO</h3>
			
			<table class="table table-condensed table-striped">
					<tr>
						<th>No PO</th>
						<th>Pemegang Kontrak</th>
						<th>NAMA PERUSAHAAN</th>
					</tr>
			</table>
			<div class="well well-sm" style="height:800px; overflow:auto">
			<table class="table table-condensed table-striped">
					<?php
							$query="SELECT * FROM no_po 
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan 
											LEFT JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id 
										ORDER BY no_po.no_po";

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr>
						
						
						<td><?php  echo $rows['no_po']; ?></td>
						<td><?php  echo $rows['fungsi']; ?></td>
						<td><?php  echo $rows['nm_perusahaan']; ?></td>
						
					</tr>
								<?php } ?>
				</table>
				</div>
			
