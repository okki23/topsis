


 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">Tambah Kriteria</button>';
		}
	?>
  
	<br>
	&nbsp;
 
	<table class="table table-bordered table-striped table-hover kriteria_datatable dataTable">
				<thead class="panel-heading">
					<tr>
						<th class="text-center">ID Kriteria</th>
						<th class="text-center">Nama Kriteria</th>
						<th class="text-center">Atribut</th>
                        <th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select * from kriteria order by id_kriteria";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die("Gagal Query Data ");}
							
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "  <td>{$data['id_kriteria']}</td>
                                    <td>{$data['nama_kriteria']}</td>
                                    <td>";
									if ($data['atribut']=='K') {echo 'Keuntungan'; }
									ELSE echo 'Biaya';
							echo "</td>
									<td>";
									 if($hak_akses==0 || $hak_akses==2  ){
										echo "<a class='btn btn-primary ubah' ref='".$data['id_kriteria']."'>Ubah</a>
										<a class='btn btn-danger hapus' ref='".$data['id_kriteria']."' nama='".$data['nama_kriteria']."'>Hapus</a>&nbsp;";
									}
                                  		
                                    echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
						 

<script>
	 $(document).ready(function () {
		$('.kriteria_datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                }
            }
        ]
		});
    	
        $("#tambah").click(function () {
           		window.location.replace("index.php?navigasi=kriteria&crud=tambah");
          });
		
		$('.ubah').click(function() {
				var id_kriteria=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=kriteria&crud=edit&id_kriteria="+id_kriteria);
		});

		$('.hapus').click(function() {
    		var id_kriteria =$(this).attr('ref');
			var nama_kriteria=$(this).attr('nama');
			 if (confirm('Yakin menghapus Kriteria '+nama_kriteria+'????')) {
					$.ajax({
					type: "POST",
					url: "../include/kontrol/kontrol_kriteria.php",
					data: 'crud=hapus&id_kriteria='+id_kriteria,
					success: function (respons) {
						
						console.log(respons);
						if (respons=='berhasil'){
							$('#pesan_berhasil').text("Kriteria Berhasil Dihapus");
								$("#hasil").show();
								setTimeout(function(){
									$("#hasil").hide();
									window.location.reload(1);
								}, 2000);
						}

						else {
								$('#pesan_gagal').text("Kriteria Gagal Dihapus");
								$("#gagal").show();
								setTimeout(function(){
									$("#gagal").hide(); 
									window.location.reload(1);
								}, 2000);
							
						}
					}
					});
			 }
			
		});
		 
	 });
</script>