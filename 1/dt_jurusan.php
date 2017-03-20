				<thead>
					<tr>
						<th>Kode Jurusan</th>
						<th>Jurusan</th>
						<th>Jenjang</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryjurusan = mysqli_query ($konek, "SELECT Kode_Jurusan, Nama_Jurusan, Kode_Jenjang_Jrs, Kode_Jenjang, Nama_Jenjang FROM jurusan INNER JOIN jenjang ON Kode_Jenjang_Jrs = Kode_Jenjang");
						if($queryjurusan == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($jurusan = mysqli_fetch_array ($queryjurusan)){
							
							echo "
								<tr>
									<td>$jurusan[Kode_Jurusan]</td>
									<td>$jurusan[Nama_Jurusan]</td>
									<td>$jurusan[Nama_Jenjang]</td>
									<td>
										<a href='#' class='open_modal' id='$jurusan[Kode_Jurusan]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"jurusan_delete.php?Kode_Jurusan=$jurusan[Kode_Jurusan]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>