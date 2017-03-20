				<thead>
					<tr>
						<th>NIM</th>
						<th>Mahasiswa</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Telpon</th>
						<th>Alamat</th>
						<th>Jurusan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querymhs = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa, DATE_FORMAT(Tanggal_Lahir, '%d-%m-%Y')as Tanggal_Lahir, JK, No_Telp, Alamat, Kode_Jurusan_Mhs, Nama_Jurusan FROM mahasiswa INNER JOIN jurusan ON Kode_Jurusan_Mhs = Kode_Jurusan");
						if($querymhs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
							
						while ($mhs = mysqli_fetch_array ($querymhs)){
							
							echo "
								<tr>
									<td>$mhs[NIM]</td>
									<td>$mhs[Nama_Mahasiswa]</td>
									<td>$mhs[Tanggal_Lahir]</td>
									<td>
								";
									if($mhs["JK"] == "L"){
										echo "Laki - laki";
									}
									else{
										echo "Perempuan";
									}
							echo "
									</td>
									<td>$mhs[No_Telp]</td>
									<td>$mhs[Alamat]</td>
									<td>$mhs[Nama_Jurusan]</td>
									<td>
										<a href='#' class='open_modal' id='$mhs[NIM]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"mahasiswa_delete.php?NIM=$mhs[NIM]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>