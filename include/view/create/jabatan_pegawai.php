
                    <form class="form-horizontal">
                        <div class="form-group" id="nama_group">
                            <label class="control-label col-sm-3" for="nama_unit_kerja">NAMA JABATAN:</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" require/>
                            </div>
                        </div>
                       
                        <div class="text-center">	
                            <button type="button" onclick="Save();" class="btn btn-success">Simpan</button>
                            <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=jabatan_pegawai&crud=view';" class="btn btn-danger">CANCEL</button>
                        </div>
                    </form>
<script> 
    function Save(){
        var nama_jabatan = $('#nama_jabatan').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"add",nama_jabatan:nama_jabatan,menu:"jabatan"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Ditambahkan!');
	                    window.location='index.php?navigasi=jabatan_pegawai&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=jabatan_pegawai&crud=view'; 
                    } 
				}
			});
    } 
</script>
 