

 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">Tambah Unit Kerja</button>';
		}
	?>
  
	<br>
	&nbsp;
 
	<table class="table table-bordered table-striped table-hover unit_datatable dataTable">
				<thead class="panel-heading">
					<tr>
						<th class="text-center">Nama Unit Kerja</th>  					
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select * from unit_kerja order by id_unit_kerja";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die("Gagal Query Data ");}
							
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "  <td>{$data['nama_unit_kerja']}</td>  
									<td>";
									 if($hak_akses==0 || $hak_akses==2  ){
										echo "	<a class='btn btn-primary ubah' ref='".$data['id_unit_kerja']."'>Ubah</a>
										<a class='btn btn-danger hapus' ref='".$data['id_unit_kerja']."' nama='".$data['nama_unit_kerja']."'>Hapus</a>&nbsp;";
									}
                                  	
                                    echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>

 
<script>
	 $(document).ready(function () {
		$('.unit_datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1,]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1,]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, ]
                }
            }
        ]
    });
		$("#tambah").click(function () {
           		window.location.replace("index.php?navigasi=unit_kerja&crud=tambah");
          });
		
		$('.ubah').click(function() {
			 var id_unit_kerja=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=unit_kerja&crud=edit&id_unit_kerja="+id_unit_kerja);
		});

		$('.hapus').click(function() { 
    		var id_unit_kerja = $(this).attr('ref'); 
			$.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"delete",id_unit_kerja:id_unit_kerja,menu:"unit_kerja"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Dihapus!');
	                    window.location='index.php?navigasi=unit_kerja&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=unit_kerja&crud=view'; 
                    } 
				}
			});
			
		});
		 
 
	 });
</script>