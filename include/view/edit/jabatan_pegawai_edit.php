<?php
            $id_jabatan=$_GET['id_jabatan'];
            $edit=("select * from jabatan where id_jabatan='$id_jabatan'");
            $hasil = mysqli_query($db_link,$edit);
            $row=mysqli_fetch_array($hasil);

?>

 
               <form class="form-horizontal">
                    <div class="form-group" id="nama_group">
                        <input type="hidden" name="id_jabatan" id="id_jabatan" value="<?php echo $id_jabatan;?>"/>   
                        <label class="control-label col-sm-3" for="name">Nama Jabatan : </label>
                         <div class="col-sm-8">
                            <input class="form-control" id="nama_jabatan" type="text" name="nama_jabatan" value="<?php echo $row['nama_jabatan'];?>" />
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
        var nama_jabatan = $('#nama_jabatan').val();
        var id_jabatan = $('#id_jabatan').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"edit",nama_jabatan:nama_jabatan,id_jabatan:id_jabatan,menu:"jabatan"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Diubah!');
	                    window.location='index.php?navigasi=jabatan_pegawai&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=jabatan_pegawai&crud=view'; 
                    } 
				}
			});
    }
</script>
 