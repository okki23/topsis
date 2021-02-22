


 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">Tambah Pegawai </button>';
		}
	?>
  
	<br>
	&nbsp;
 
	<table class="table table-bordered table-striped table-hover pegawai_datatable dataTable">
				<thead class="panel-heading">
					<tr>
						 
						<th class="text-center">NO PEGAWAI</th>
						<th class="text-center">NAMA PEGAWAI</th>
						<th class="text-center">JENIS KELAMIN</th>
						<th class="text-center">JABATAN</th>
						<th class="text-center">AGAMA</th>
						<th class="text-center">STATUS PERKAWINAN</th>
						<th class="text-center">TANGGAL MASUK</th>
						<th class="text-center">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select a.*, b.nama_jabatan from pegawai a
							left join jabatan b on b.id_jabatan = a.id_jabatan";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die(mysqli_error($db_link));}

							$no=1;
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "  
							        <td>{$data['no_pegawai']}</td>
                                    <td>{$data['nama']}</td>
									<td>";
									if ($data['jekel']=='L') {echo 'Laki - laki'; }
									ELSE echo 'Perempuan';
							echo "</td>
							<td>{$data['nama_jabatan']}</td>	
								<td>{$data['agama']}</td>
									
									<td>{$data['status_perkawinan']}</td>
									<td>".date("d-m-Y", strtotime($data['tgl_masuk']))."</td>";
							echo "<td>
										<a class='btn btn-info detail' ref='".$data['no_pegawai']."'>Detail</a>";
							 if($hak_akses==0 || $hak_akses==2  ){
										echo " <a class='btn btn-primary ubah' ref='".$data['no_pegawai']."'>Ubah</a>
										<a class='btn btn-danger hapus' ref='".$data['no_pegawai']."' nama='".$data['nama']."'>Hapus</a>&nbsp;";
									}
                                  		
                                    echo "</td>";
							echo "</tr>";
							$no++;
						}
					?>
				</tbody>
			</table>
						 
			  
<script>
	 $(document).ready(function () {
		$('.pegawai_datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            }
        ]
		});
        $("#tambah").click(function () {
           		window.location.replace("index.php?navigasi=pegawai&crud=tambah");
          });
		
		$('.ubah').click(function() {
				var no_pegawai=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=pegawai&crud=edit&no_pegawai="+no_pegawai);
		});

		$('.hapus').click(function() { 
    		var no_pegawai = $(this).attr('ref'); 
			$.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"delete",no_pegawai:no_pegawai,menu:"pegawai"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Dihapus!');
	                    window.location='index.php?navigasi=pegawai&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=pegawai&crud=view'; 
                    } 
				}
			});
			
		});
		$(".detail").click(function () {
			var no_pegawai=$(this).attr('ref');
			window.location.replace("index.php?navigasi=pegawai&crud=detail&no_pegawai="+no_pegawai);
		});
	 });
</script>