<?php
$pegawai=("SELECT A.no_pegawai,A.nama from pegawai A
        LEFT JOIN user B ON A.no_pegawai=B.id_pegawai
		WHERE B.id_pegawai IS NULL ");
    $pegawai_query = mysqli_query($db_link,$pegawai);
?>

 
                    <form class="form-horizontal">
						<div class="form-group" id="pegawai">
                            <label class="control-label col-sm-3" for="pegawai">No Pegawai : </label>
                            <div class="col-sm-8">
                            <select  class="form-control" name="pegawai" id="pegawai">  
                           	 	<?php
                            		while ($pegawai_tampil=mysqli_fetch_assoc($pegawai_query)){
                            			echo "<option value='".$pegawai_tampil['no_pegawai']."'>".$pegawai_tampil['no_pegawai']." - ".$pegawai_tampil['nama']."</option>";
                                	}
                            	?>
                            </select> 
                            </div>
                        </div>

												
                        <div class="form-group" id="nama_group">
                            <label class="control-label col-sm-3" for="user_name">Username :</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" require/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="password">Password :</label>
                            <div class="col-sm-8"> 
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" require/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-sm-3" for="hak_akses">Hak Akses : </label>
                            <div class="col-sm-8">
                                 <select  class="form-control" name="hak_akses" id="hak_akses">  
                                   <option value="1">Manager</option>
                                   <option value="2">HRD</option>
                                   <option value="3">Koordinator</option>
                                   <option value="4">Karyawan</option>
                                </select> 
                            </div>
                        </div>
                        <div class="text-center">	
                            <button type="button" onclick="Save();" class="btn btn-success">SIMPAN</button>
                            <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=user&crud=view';" class="btn btn-danger">CANCEL</button>
                        </div>
                    </form>
               
<script> 
    function Save(){
        var user_name = $('#user_name').val();
        var password = $('#password').val();
        var pegawai = $('select[name=pegawai]').val();
        var hak_akses = $('select[name=hak_akses]').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"add",user_name:user_name,password:password,pegawai:pegawai,hak_akses:hak_akses,menu:"user"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Ditambahkan!');
	                    window.location='index.php?navigasi=user&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=user&crud=view'; 
                    } 
				}
			});
    } 
</script>
 