
                    <form class="form-horizontal">
                        <div class="form-group" id="nama_group">
                            <label class="control-label col-sm-3" for="nama_unit_kerja">Nama Unit Kerja:</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_unit_kerja" name="nama_unit_kerja" placeholder="Nama Unit Kerja" require/>
                            </div>
                        </div>
                       
                        <div class="text-center">	
                        <button type="button" onclick="Save();" class="btn btn-success">SIMPAN</button>
                        <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=unit_kerja&crud=view';" class="btn btn-danger">CANCEL</button>
                    </div>
                    </form>
             

<script src="../vendor/jquery/jquery.min.js"></script>
<script>

    function Save(){
        var nama_unit_kerja = $('#nama_unit_kerja').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"add",nama_unit_kerja:nama_unit_kerja,menu:"unit_kerja"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Ditambahkan!');
	                    window.location='index.php?navigasi=unit_kerja&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=unit_kerja&crud=view'; 
                    } 
				}
			});
    }
  
</script>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">