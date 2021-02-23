


 
 	<?php
		if($hak_akses==0 || $hak_akses==2 ){
		 
		echo '	<button type="button" id="tambah" class="btn btn-success">Tambah penilaian </button>';
		}
	?>
  
	<br>
	&nbsp;
 
	<table class="table table-bordered table-striped table-hover penilaian_datatable dataTable">
				<thead class="panel-heading">
					<tr>
						 
						 
						<th class="text-center">NAMA PEGAWAI</th>
						<th class="text-center">KRITERIA</th>
						<th class="text-center">NILAI</th> 
						<th class="text-center">TGL NILAI</th> 
						<th class="text-center">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php /*php pembuka tabel atas*/
							$sql = "select a.*,b.nama,c.nama_kriteria from penilaian a
                            left join pegawai b on b.no_pegawai = a.no_pegawai
							left join kriteria c on c.id_kriteria = a.id_kriteria";
							$hasil = mysqli_query($db_link,$sql);
							if (!$hasil){
							die(mysqli_error($db_link));}

							$no=1;
							while ($data=mysqli_fetch_array($hasil)) {
							echo "<tr>";
                            echo "  
							        <td>{$data['nama']}</td>
                                    <td>{$data['nama_kriteria']}</td>
									<td>{$data['nilai']}</td>
									<td>{$data['tgl_penilaian']}</td>
									<td>";
									 
							 
							 if($hak_akses==0 || $hak_akses==2  ){
										echo " <a class='btn btn-primary ubah' ref='".$data['id_penilaian']."'>Ubah</a>
										<a class='btn btn-danger hapus' ref='".$data['id_penilaian']."' nama='".$data['id_penilaian']."'>Hapus</a>&nbsp;";
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
		$('.penilaian_datatable').DataTable({
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
           		window.location.replace("index.php?navigasi=penilaian&crud=tambah");
          });
		
		$('.ubah').click(function() {
				var no_penilaian=$(this).attr('ref');
			 window.location.replace("index.php?navigasi=penilaian&crud=edit&no_penilaian="+no_penilaian);
		});

		$('.hapus').click(function() { 
    		var no_penilaian = $(this).attr('ref'); 
			$.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"delete",no_penilaian:no_penilaian,menu:"penilaian"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Dihapus!');
	                    window.location='index.php?navigasi=penilaian&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=penilaian&crud=view'; 
                    } 
				}
			});
			
		});
		$(".detail").click(function () {
			var no_penilaian=$(this).attr('ref');
			window.location.replace("index.php?navigasi=penilaian&crud=detail&no_penilaian="+no_penilaian);
		});
	 });
</script>