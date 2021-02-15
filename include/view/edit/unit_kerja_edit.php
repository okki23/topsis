 <?php
            $id_unit_kerja=$_GET['id_unit_kerja'];
            $edit=("select * from unit_kerja where id_unit_kerja='$id_unit_kerja'");
            $hasil = mysqli_query($db_link,$edit);
            $row=mysqli_fetch_array($hasil);

?>

 
               <form class="form-horizontal">
                    <div class="form-group" id="nama_group">
                        <input type="hidden" name="id_unit_kerja" id="id_unit_kerja" value="<?php echo $id_unit_kerja;?>"/>   
                        <label class="control-label col-sm-3" for="name">Nama unit_kerja : </label>
                         <div class="col-sm-8">
                            <input class="form-control" id="nama_unit_kerja" type="text" name="nama_unit_kerja" value="<?php echo $row['nama_unit_kerja'];?>" />
                        </div>
                    </div>
                    <div class="panel-footer">
                    <div class="text-center">	
                        <button type="button" onclick="Save();" class="btn btn-success">SIMPAN</button>
                        <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=unit_kerja&crud=view';" class="btn btn-danger">CANCEL</button>
                    </div>
                </div>
                </form>
    
<script> 
    function Save(){
        var nama_unit_kerja = $('#nama_unit_kerja').val();
        var id_unit_kerja = $('#id_unit_kerja').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"edit",nama_unit_kerja:nama_unit_kerja,id_unit_kerja:id_unit_kerja,menu:"unit_kerja"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Diubah!');
	                    window.location='index.php?navigasi=unit_kerja&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=unit_kerja&crud=view'; 
                    } 
				}
			});
    }
</script>
 