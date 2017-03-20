				<thead>
					<tr>
						<th>Matakuliah</th>
						<th>Dosen</th>
						<th>Ruangan</th>
						<th>Jurusan</th>
						<th>Hari</th>
						<th>Jam</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querymhs = mysqli_query($konek, "SELECT Kode_Jurusan_Mhs, Kode_Jurusan, Nama_Jurusan FROM mahasiswa INNER JOIN jurusan ON Kode_Jurusan_Mhs=Kode_Jurusan WHERE NIM='$_SESSION[Username]'");
						if($querymhs == false){
							die("Terdapat Kesalahan : ". mysqli_error($konek));
						}
						while ($mhs = mysqli_fetch_array($querymhs)){
							
							$queryjadwal = mysqli_query ($konek, "SELECT Id_Jadwal, Kode_Matakuliah_Jadwal, NIP_Jadwal, Kode_Ruangan_Jadwal, Hari,
							Jam, Kode_Matakuliah, Nama_Matakuliah, NIP, Nama_Dosen, Kode_Ruangan, Nama_Ruangan, Kode_Jurusan, Nama_Jurusan FROM jadwal 
							INNER JOIN matakuliah ON Kode_Matakuliah_Jadwal=Kode_Matakuliah
							INNER JOIN dosen ON NIP_Jadwal=NIP
							INNER JOIN ruangan ON Kode_Ruangan_Jadwal=Kode_Ruangan
							INNER JOIN jurusan ON Kode_Jurusan_Jadwal=Kode_Jurusan WHERE Kode_Jurusan_Jadwal='$mhs[Kode_Jurusan_Mhs]'");
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
									</tr>";
							}
							
						}
					
						
					?>
				</tbody>