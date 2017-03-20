				<thead>
					<tr>
						<th>Mahasiswa</th>
						<th>Matakuliah</th>
						<th>Nilai</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querynilai = mysqli_query ($konek, "SELECT Id_Nilai, NIM_Nilai, Kode_Matakuliah_Nilai, Nilai, NIM, Nama_Mahasiswa, Kode_Matakuliah, Nama_Matakuliah FROM nilai
										INNER JOIN mahasiswa ON NIM_Nilai=NIM
										INNER JOIN matakuliah ON Kode_Matakuliah_Nilai=Kode_Matakuliah");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($nilai = mysqli_fetch_array ($querynilai)){
							
							echo "
								<tr>
									<td>$nilai[Nama_Mahasiswa]</td>
									<td>$nilai[Nama_Matakuliah]</td>
									<td>$nilai[Nilai]</td>
									<td>
										<a href='#' class='open_modal' id='$nilai[Id_Nilai]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"nilai_delete.php?Id_Nilai=$nilai[Id_Nilai]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>