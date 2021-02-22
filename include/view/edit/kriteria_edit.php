<?php
  $id_kriteria=$_GET['id_kriteria'];
  $edit=("select * from kriteria where id_kriteria='$id_kriteria'");
  $hasil = mysqli_query($db_link,$edit);
  $row=mysqli_fetch_array($hasil);
?>
 
               <form class="form-horizontal">
                    <div class="form-group" >
                      <label class="control-label col-sm-3" for="id_kriteria">ID Kriteria :</label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" placeholder="Id Kriteria" value="<?php echo $row['id_kriteria'];?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group" id="id_group">
                        <label class="control-label col-sm-3" for="name">Nama Kriteria : </label>
                         <div class="col-sm-8">
                            <input class="form-control" id="nama_kriteria" type="text" name="nama_kriteria" value="<?php echo $row['nama_kriteria'];?>" />
                        </div>
                    </div>
                    <div class="form-group" id="id_group">
                        <label class="control-label col-sm-3" for="name">Bobot : </label>
                         <div class="col-sm-8">
                            <input class="form-control" id="bobot" type="text" name="bobot" value="<?php echo $row['bobot'];?>" />
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="atribut">Atribut :</label>
                        <div class="col-sm-8"> 
                          <select  class="form-control" id="atribut" name="atribut">
                              <option value="K" <?php if ($row['atribut']=='K') echo "selected='selected'";?>>Keuntungan</option>  
                            <option value="B" <?php if ($row['atribut']=='B') echo "selected='selected'";?>>Biaya</option>
                          </select>
                        </div>
                    </div>
                    <div class="text-center">	
                            <button type="button" onclick="Save();" class="btn btn-success">Simpan</button>
                            <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=kriteria&crud=view';" class="btn btn-danger">CANCEL</button>
                    </div>
                </form>
          
<script>  
      function Save(){
        var id_kriteria = $('#id_kriteria').val();
        var nama_kriteria = $('#nama_kriteria').val();
        var bobot = $('#bobot').val();
        var atribut = $('#atribut').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"edit",id_kriteria:id_kriteria,bobot:bobot,nama_kriteria:nama_kriteria,atribut:atribut,menu:"kriteria"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Diubah!');
	                    window.location='index.php?navigasi=kriteria&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=kriteria&crud=view'; 
                    } 
				}
			});
    }
</script>
 