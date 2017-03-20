				<thead>
					<tr>
						<th>Mahasiswa</th>
						<th>Matakuliah</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querynilai = mysqli_query ($konek, "SELECT Id_Nilai, NIM_Nilai, Kode_Matakuliah_Nilai, Nilai, NIM, Nama_Mahasiswa, Kode_Matakuliah, Nama_Matakuliah FROM nilai
										INNER JOIN mahasiswa ON NIM_Nilai=NIM
										INNER JOIN matakuliah ON Kode_Matakuliah_Nilai=Kode_Matakuliah WHERE NIM_Nilai='$_SESSION[Username]'");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($nilai = mysqli_fetch_array ($querynilai)){
							
							echo "
								<tr>
									<td>$nilai[Nama_Mahasiswa]</td>
									<td>$nilai[Nama_Matakuliah]</td>
									<td>$nilai[Nilai]</td>
								</tr>";
						}
					?>
				</tbody>