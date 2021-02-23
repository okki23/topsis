<?php
            $id_pegawai=$_GET['id_pegawai'];
            $edit="select * from user where id_pegawai='$id_pegawai'";
            $exedit = mysqli_query($db_link,$edit);
            $row=mysqli_fetch_array($exedit);
			$pegawai="select * from pegawai";
            $pegawai_query = mysqli_query($db_link,$pegawai);
?>

 
               <form class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai'];?>"/>
                                
                        <label class="control-label col-sm-3" for="name">No Pegawai : </label>
                         <div class="col-sm-8">    
                            <select  class="form-control" name="id_pegawai" id="id_pegawai" disabled="disabled">  
                                    <?php
                                       while ($pegawai_tampil=mysqli_fetch_assoc($pegawai_query)){
                                           echo "<option value='".$pegawai_tampil['no_pegawai']."'";
                                           if ($row['id_pegawai']==$pegawai_tampil['no_pegawai']) echo "selected='selected'";
                                           echo ">".$pegawai_tampil['no_pegawai']." - ".$pegawai_tampil['nama']."</option>";
                                       }
                                    ?>
                                </select> 
                        </div>
					</div>
						
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="user_name">Username : </label>
                         <div class="col-sm-8">
                            <input class="form-control"  type="text" id="user_name" name="user_name" value="<?php echo $row['user_name'];?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="password">Password : </label>
                         <div class="col-sm-8">
                            <input class="form-control"  type="text" name="password" value="<?php echo $row['password'];?>" />
                        </div>
                    </div>
										
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="hak_akses">Hak akses :</label>
                        <div class="col-sm-8"> 
                           <select  class="form-control" name="hak_akses" id="hak_akses">  
                              <option value="1" <?php   if ($row['hak_akses']=='1') echo "selected='selected'"; ?>>Manager</option>
                              <option value="2" <?php if ($row['hak_akses']=='2') echo "selected='selected'"; ?>>HRD</option>
                              <option value="3" <?php if ($row['hak_akses']=='3') echo "selected='selected'"; ?>>Koordinator</option>
                              <option value="4" <?php if ($row['hak_akses']=='4') echo "selected='selected'"; ?>>Karyawan</option>
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
        var id_pegawai = $('#id_pegawai').val();
        var user_name = $('#user_name').val();
        var password = $('#password').val();
        var pegawai = $('select[name=pegawai]').val();
        var hak_akses = $('select[name=hak_akses]').val();
        $.ajax({
				url:"../include/kontrol/controller.php",
				type:"POST",
				data:{crud:"edit",id_pegawai:id_pegawai,user_name:user_name,password:password,pegawai:pegawai,hak_akses:hak_akses,menu:"user"},
				success:function(response){
					if (response = 1){
                        alert('Berhasil Diubah!');
	                    window.location='index.php?navigasi=user&crud=view'; 
                    }else {
                        alert('Gagal!');
                        window.location='index.php?navigasi=user&crud=view'; 
                    } 
				}
			});
    } 
</script>
 