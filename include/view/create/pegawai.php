<?php
    include_once "../koneksi.php";
    $query = "SELECT max(no_pegawai) as maxKode FROM pegawai";
    $hasil = mysqli_query($db_link,$query);
    $data  = mysqli_fetch_array($hasil);
    $nopegawai = $data['maxKode'];
    $noUrut = (int) substr($nopegawai, 3, 3);
    $noUrut++;
    $char = "P-";
    $newID = $char . sprintf("%04s", $noUrut);
    $qjabatan = "select * from jabatan";
    $jabatan_list = mysqli_query($db_link,$qjabatan); 
?>

 
                    <form class="form-horizontal" id="myForm">
                     
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="no_pegawai">NO PEGAWAI :</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="id_pegawai" size="8" value="<?php echo $newID;?>" readonly/>
                                <input type="hidden" name="no_pegawai" id="no_pegawai" autocomplete="off" value="<?php echo $newID;?>"/>
                            </div>
                        </div>
                        <div class="form-group" id="nama_group">
                            <label class="control-label col-sm-4" for="nama_pegawai">NAMA PEGAWAI :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" >
                            </div>
                        </div>
                        <div class="form-group" id="tempat_group">
                            <label class="control-label col-sm-4" for="tempat_lahir">TEMPAT LAHIR :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" >
                            </div>
                        </div>
                        <div class="form-group" id="tgl_lhr_group">
                            <label class="control-label col-sm-4" for="tanggal_lahir">TANGGAL LAHIR :</label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Please choose a date...">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="jabatan">JABATAN : </label>
                            <div class="col-sm-6">
                                 <select  class="form-control" name="jabatan" id="jabatan">  
                                    <?php
                                       
                                       while ($jl=mysqli_fetch_assoc($jabatan_list)){ 
                                           echo "<option value='".$jl['id_jabatan']."'>".$jl['nama_jabatan']."</option>";
                                       }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group" id="jekel_group">
                            <label class="control-label col-sm-4" for="jekel">JENIS KELAMIN :</label>
                            <div class="col-sm-4">
                                <select  class="form-control" name="jekel" id="jekel">  
                                    <option value="">- Pilih Jenkel -</option>  
                                    <option value="L">Laki-Laki</option>  
                                    <option value="P">Perempuan</option>   
                                </select>   
                            </div>
                        </div>
                        <div class="form-group" id="agama_group">
                            <label class="control-label col-sm-4" for="agama">AGAMA :</label>
                            <div class="col-sm-4">
                                <select  class="form-control" name="agama" id="agama">  
                                    <option value="">- Pilih Agama -</option>  
                                    <option value="Islam">Islam</option>  
                                    <option value="Kristen">Kristen</option>  
                                    <option value="Katolik">Katolik</option>  
                                    <option value="Hindu">Hindu</option>  
                                    <option value="Budha">Budha</option>  
                                </select>   
                            </div>
                        </div>
                        <div class="form-group" id="status_group">
                            <label class="control-label col-sm-4" for="status">STATUS PERKAWINAN :</label>
                            <div class="col-sm-4">
                                <select  class="form-control" name="status" id="status">  
                                    <option value="">- Pilih Status Perkawinan -</option>  
                                    <option value="Kawin">Kawin</option>  
                                    <option value="Belum kawin">Belum kawin</option>  
                                    <option value="Cerai hidup">Cerai hidup</option>  
                                    <option value="Cerai mati">Cerai mati</option>  
                                </select>    
                            </div>
                        </div>
                        <div class="form-group" id="no_telp_group">
                            <label class="control-label col-sm-4" for="no_telp">NO TELEPON :</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" id="no_telp" name="no_telp" placeholder="No Telpone" >
                            </div>
                        </div>
                        <div class="form-group" id="alamat_group">
                            <label class="control-label col-sm-4" for="alamat">ALAMAT :</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="" id="alamat" name="alamat" placeholder="Alamat Tinggal" ></textarea>
                            </div>
                        </div>
                        <div class="form-group" id="tgl_msk_group">
                            <label class="control-label col-sm-4" for="tanggal_masuk">TANGGAL MASUK :</label>
                            <div class="col-sm-3">
                            <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Please choose a date...">
                                        </div>
                                </div>
                                 
                            </div>
                        </div>
                        <div class="text-center">	
                            <button type="button" onclick="Save();" class="btn btn-success">Simpan</button>
                            <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=pegawai&crud=view';" class="btn btn-danger">CANCEL</button>
                        </div>
                    </form> 
 

<script type="text/javascript">  
 function Save(){
        var no_pegawai = $('input[name=no_pegawai]').val();
        var nama_pegawai = $('input[name=nama_pegawai]').val();
        var tempat_lahir = $('input[name=tempat_lahir]').val();
        var tanggal_lahir = $('input[name=tanggal_lahir]').val();
        var jekel = $('select[name=jekel]').val();
        var jabatan = $('select[name=jabatan]').val();
        var agama = $('select[name=agama]').val();
        var status = $('select[name=status]').val();
        var no_telp = $('input[name=no_telp]').val();
        var alamat = $('textarea[name=alamat]').val();
        var tanggal_masuk = $('input[name=tanggal_masuk]').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"add",no_pegawai:no_pegawai,nama_pegawai:nama_pegawai,tempat_lahir:tempat_lahir,tanggal_lahir:tanggal_lahir,
                    jekel:jekel,jabatan:jabatan,agama:agama,status:status,no_telp:no_telp,alamat:alamat,tanggal_masuk:tanggal_masuk,menu:"pegawai"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Ditambahkan!');
	                    window.location='index.php?navigasi=pegawai&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=pegawai&crud=view'; 
                    } 
				}
			});
    } 
</script>
 