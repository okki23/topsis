

 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">TAMBAH unit</button>';
		}
	?>
  
	<br>
	&nbsp;
 
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead class="panel-heading">
					<tr>
						<th class="text-center">Nama Unit</th>
					 
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select * from unit order by id_unit";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die("Gagal Query Data ");}
							
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "  <td>{$data['nama_unit']}</td>
                                  
									<td>";
									 if($hak_akses==0 || $hak_akses==2  ){
										echo "	<a class='btn btn-primary ubah' ref='".$data['id_unit']."'>Ubah</a>
										<a class='btn btn-danger hapus' ref='".$data['id_unit']."' nama='".$data['nama_unit']."'>Hapus</a>&nbsp;";
									}
                                  	
                                    echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
 

<script src="../vendor/jquery/jquery.min.js"></script>

<script>
	$(document).ready(function () {
	
		 

	$("#tambah").click(function () {
			   window.location.replace("index.php?navigasi=unit&crud=tambah");
	  });
	
	$('.ubah').click(function() {
			var id_unit=$(this).attr('ref');
		 window.location.replace("index.php?navigasi=unit&crud=edit&id_unit="+id_unit);
	});

	$('.hapus').click(function() {
		var id_unit =$(this).attr('ref');
		 if (confirm('Yakin menghapus unit '+id_unit+'????')) {
				$.ajax({
				type: "POST",
				url: "../include/kontrol/kontrol_unit.php",
				data: 'crud=hapus&id_unit='+id_unit,
				success: function (respons) {
					
					console.log(respons);
					if (respons = 1){
				alert('Data Terhapus!');
					window.location='index.php?navigasi=unit&crud=view';
			  }
			  else {
				alert('Gagal!');
					window.location='index.php?navigasi=unit&crud=view';

			  }
				}
				});
		 }
		
	});
	 
 });
</script>