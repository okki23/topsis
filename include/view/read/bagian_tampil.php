

 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">TAMBAH BAGIAN</button>';
		}
	?>
  
	<br>
	&nbsp;
 
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead>
					<tr>
						<th class="text-center">ID Bagian</th>
						<th class="text-center">Nama Bagian</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select * from bagian order by id_bagian";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die("Gagal Query Data ");}
							
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
								echo "<td>{$data['id_bagian']}</td>
											<td>{$data['bagian']}</td>
											<td>";
											 if($hak_akses==0 || $hak_akses==2 ){
												echo "<a class='btn btn-primary ubah' ref='".$data['id_bagian']."'>Ubah</a>
												<a class='btn btn-danger hapus' ref='".$data['id_bagian']."'>Hapus</a>&nbsp;";
											}
												
										echo"	</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			 

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script>

	 $(document).ready(function () {
	
		 

        $("#tambah").click(function () {
           		window.location.replace("index.php?navigasi=bagian&crud=tambah");
          });
		
		$('.ubah').click(function() {
				var id_bagian=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=bagian&crud=edit&id_bagian="+id_bagian);
		});

		$('.hapus').click(function() {
    		var id_bagian =$(this).attr('ref');
			 if (confirm('Yakin menghapus Bagian '+id_bagian+'????')) {
					$.ajax({
					type: "POST",
					url: "../include/kontrol/kontrol_bagian.php",
					data: 'crud=hapus&id_bagian='+id_bagian,
					success: function (respons) {
						
						console.log(respons);
						if (respons = 1){
                    alert('Data Terhapus!');
	                    window.location='index.php?navigasi=bagian&crud=view';
                  }
                  else {
                    alert('Gagal!');
	                    window.location='index.php?navigasi=bagian&crud=view';

                  }
					}
					});
			 }
			
		});
		 
	 });
</script>

