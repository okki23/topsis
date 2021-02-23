<?php
            $no_penilaian=$_GET['no_penilaian'];
            $edit=("select * from penilaian where id_penilaian='$no_penilaian'");
            $hasil = mysqli_query($db_link,$edit);
            $row=mysqli_fetch_array($hasil);
            $sqlpeg = "select * from pegawai";
            $exsqlpeg = mysqli_query($db_link,$sqlpeg); 
            
            $sqlkri = "select * from kriteria";
            $exsqlkri = mysqli_query($db_link,$sqlkri);
?>

                <form class="form-horizontal">
                <input type="hidden" name="id_penilaian" autocomplete="off" value="<?php echo $row['id_penilaian']; ?>"/>
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="tgl_penilaian">Tanggal Penilaian :</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" class="form-control" id="tgl_penilaian" name="tgl_penilaian" value="<?php echo $row['tgl_penilaian']; ?>">
                                        </div>
                                </div>
                                 
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="nama_pegawai">Nama Pegawai : </label>
                        <div class="col-sm-6">
                            <select  class="form-control" name="nama_pegawai" id="nama_pegawai">   
                                    <?php
                                   while ($jl=mysqli_fetch_assoc($exsqlpeg)){
                                           echo "<option value='".$jl['no_pegawai']."'";
                                           if ($row['no_pegawai']==$jl['no_pegawai']) echo "selected='selected'";
                                           echo ">".$jl['nama']."</option>";
                                       }
                                    ?>
                        </select> 
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-5" for="kriteria">Kriteria : </label>
                        <div class="col-sm-6">
                            <select  class="form-control" name="kriteria" id="kriteria">   
                            <?php
                                   while ($jx=mysqli_fetch_assoc($exsqlkri)){
                                           echo "<option value='".$jx['id_kriteria']."'";
                                           if ($row['id_kriteria']==$jx['id_kriteria']) echo "selected='selected'";
                                           echo ">".$jx['nama_kriteria']."</option>";
                                       }
                                    ?>
                        </select> 
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-5" for="nilai">Nilai : </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $row['nilai']; ?>">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br> 
                        <div class="text-center">	
                            <button type="button" onclick="Save();" class="btn btn-success">Simpan</button>
                            <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=penilaian&crud=view';" class="btn btn-danger">CANCEL</button>
                        </div>
                   </form>   
                
<script type="text/javascript"> 
 function Save(){
        var id_penilaian = $('input[name=id_penilaian]').val();
        var tgl_penilaian = $('input[name=tgl_penilaian]').val();
        var kriteria = $('select[name=kriteria]').val(); 
        var nilai = $('input[name=nilai]').val();
        var nama_pegawai = $('select[name=nama_pegawai]').val(); 
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"edit",id_penilaian:id_penilaian,nama_pegawai:nama_pegawai,nilai:nilai,tgl_penilaian:tgl_penilaian,kriteria:kriteria,menu:"penilaian"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Diubah!');
	                    window.location='index.php?navigasi=penilaian&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=penilaian&crud=view'; 
                    } 
				}
			});
    } 
</script>
 