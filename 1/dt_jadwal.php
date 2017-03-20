				<thead>
					<tr>
						<th>Matakuliah</th>
						<th>Dosen</th>
						<th>Ruangan</th>
						<th>Jurusan</th>
						<th>Hari</th>
						<th>Jam</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryjadwal = mysqli_query ($konek, "SELECT Id_Jadwal, Kode_Matakuliah_Jadwal, NIP_Jadwal, Kode_Ruangan_Jadwal, Hari,
							Jam, Kode_Matakuliah, Nama_Matakuliah, NIP, Nama_Dosen, Kode_Ruangan, Nama_Ruangan, Kode_Jurusan, Nama_Jurusan FROM jadwal 
							INNER JOIN matakuliah ON Kode_Matakuliah_Jadwal=Kode_Matakuliah
							INNER JOIN dosen ON NIP_Jadwal=NIP
							INNER JOIN ruangan ON Kode_Ruangan_Jadwal=Kode_Ruangan
							INNER JOIN jurusan ON Kode_Jurusan_Jadwal=Kode_Jurusan");
						if($queryjadwal == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($jadwal = mysqli_fetch_array ($queryjadwal)){
							
							echo "
								<tr>
									<td>$jadwal[Nama_Matakuliah]</td>
									<td>$jadwal[Nama_Dosen]</td>
									<td>$jadwal[Nama_Ruangan]</td>
									<td>$jadwal[Nama_Jurusan]</td>
									<td>$jadwal[Hari]</td>
									<td>$jadwal[Jam]</td>
									<td>
										<a href='#' class='open_modal' id='$jadwal[Id_Jadwal]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"jadwal_delete.php?Id_Jadwal=$jadwal[Id_Jadwal]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>