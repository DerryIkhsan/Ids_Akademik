				<thead>
					<tr>
						<th>Username</th>
						<th>Usergroup</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryuser = mysqli_query ($konek, "SELECT Id_User, Username, Id_Usergroup_User, Id_Usergroup, Nama_Usergroup FROM user INNER JOIN usergroup ON Id_Usergroup_User=Id_Usergroup");
						if($queryuser == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($user = mysqli_fetch_array ($queryuser)){
							
							echo "
								<tr>
									<td>$user[Username]</td>
									<td>$user[Nama_Usergroup]</td>
									<td>
								";
								if($user["Id_User"]==$_SESSION["Id_User"]){
									echo "
										<a href='#'>Disable</a>";
								}else{
									echo "
										<a href='#' onClick='confirm_delete(\"user_delete.php?Id_User=$user[Id_User]\")'>Delete</a>";
								}
							echo
								"
									</td>
								</tr>";
						}
					?>
				</tbody>