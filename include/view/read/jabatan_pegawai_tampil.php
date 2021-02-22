


 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">Tambah Jabatan </button>';
		}
	?>
  
	<br>
	&nbsp;
 
	<table class="table table-bordered table-striped table-hover jabatan_datatable dataTable">
			 
				<thead class="panel-heading">
					<tr> 
						<th class="text-center">JABATAN</th> 
						<th class="text-center">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php  
							$sql = "Select * from jabatan";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die(mysqli_error($db_link));}
							
							$no=1;
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "
									<td>{$data['nama_jabatan']}</td> 
									<td>";
									 if($hak_akses==0 || $hak_akses==2){
										echo "<a class='btn btn-primary ubah' ref='".$data['id_jabatan']."'>Ubah</a>
										<a class='btn btn-danger hapus' ref='".$data['id_jabatan']."' nama='".$data['nama_jabatan']."'>Hapus</a>&nbsp;";
									}
                                  		
                                   echo" </td>";
							echo "</tr>";
							$no++;
						}
					?>
				</tbody>
			</table>
				 
<script>
	 $(document).ready(function () {
		$('.jabatan_datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0]
                }
            }
        ]
		});
        $("#tambah").click(function () {
           		window.location.replace("index.php?navigasi=jabatan_pegawai&crud=tambah");
          });
		
		$('.ubah').click(function() {
				var id_jabatan=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=jabatan_pegawai&crud=edit&id_jabatan="+id_jabatan);
		});

		
		$('.hapus').click(function() { 
    		var id_jabatan = $(this).attr('ref'); 
			$.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"delete",id_jabatan:id_jabatan,menu:"jabatan"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Dihapus!');
	                    window.location='index.php?navigasi=jabatan_pegawai&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=jabatan_pegawai&crud=view'; 
                    } 
				}
			});
			
		});
	});
</script>