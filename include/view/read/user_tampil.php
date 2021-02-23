

 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">Tambah User </button>';
		}
	?>
  
	<br>
	&nbsp;
 
	<table class="table table-bordered table-striped table-hover user_datatable dataTable">
				<thead class="panel-heading">
					<tr>
						<th class="text-center">No Pegawai</th>
						<th class="text-center">Username</th>
						<th class="text-center">Hak Akses</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select * from user order by id_pegawai";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die("Gagal Query Data ");}
							
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "  <td>{$data['id_pegawai']}</td>
									<td>{$data['user_name']}</td>
									<td>";
									if($data['hak_akses']==0){
										echo "Admin";
									}
									else if($data['hak_akses']==1){
										echo "Manager";
									}
									else if($data['hak_akses']==2){
										echo "HRD";
									}
									else if($data['hak_akses']==3){
										echo "Koordinator";
									}
									else if($data['hak_akses']==4){
										echo "Karyawan";
									}
									echo "</td>
									<td>
										  <a class='btn btn-primary ubah' ref='".$data['id_pegawai']."'>Ubah</a>&nbsp;";
									if ($data['hak_akses']<>0){
										echo "<a class='btn btn-danger hapus' ref='".$data['id_pegawai']."' nama='".$data['user_name']."'>Hapus</a>";
									}
                                    echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
					  
<script>
	 $(document).ready(function () {
		$('.user_datatable').DataTable({
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
           		window.location.replace("index.php?navigasi=user&crud=tambah");
          });
		
		$('.ubah').click(function() {
				var id_pegawai=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=user&crud=edit&id_pegawai="+id_pegawai);
		});

		$('.hapus').click(function() { 
    		var id_pegawai = $(this).attr('ref'); 
			$.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"delete",id_pegawai:id_pegawai,menu:"user"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Dihapus!');
	                    window.location='index.php?navigasi=user&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=user&crud=view'; 
                    } 
				}
			});
			
		});
		 
	 });
</script>