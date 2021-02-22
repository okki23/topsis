
<?php
$query = "SELECT max(id_kriteria) as maxKode FROM kriteria";
$hasil = mysqli_query($db_link,$query);
$data  = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K-";
$newID = $char . sprintf("%04s", $noUrut);
?>
  
                    <form class="form-horizontal">
                        <div class="form-group" >
                            <label class="control-label col-sm-3" for="id_kriteria">ID Kriteria :</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" placeholder="Id Kriteria" value="<?php echo $newID;?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group" id="id_group">
                            <label class="control-label col-sm-3" for="nama_kriteria">Nama Kriteria :</label>
                            <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Nama Kriteria"/>
                            </div>
                        </div>
                        <div class="form-group" id="id_group">
                        <label class="control-label col-sm-3" for="name">Bobot : </label>
                         <div class="col-sm-8">
                            <input class="form-control" id="bobot" type="text" name="bobot" placeholder="Bobot" />
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="atribut">Atribut :</label>
                            <div class="col-sm-8"> 
                            <select  class="form-control" id="atribut" name="atribut">
                                <option value="">- Pilih Atribut -</option>  
 			                    <option value="K">Keuntungan</option>  
			                    <option value="B">Biaya</option>
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
        var atribut = $('#atribut').val();
        var bobot = $('#bobot').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"add",id_kriteria:id_kriteria,nama_kriteria:nama_kriteria,bobot:bobot,atribut:atribut,menu:"kriteria"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Ditambahkan!');
	                    window.location='index.php?navigasi=kriteria&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=kriteria&crud=view'; 
                    } 
				}
			});
    }
</script>
 