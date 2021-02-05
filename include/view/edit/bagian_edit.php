 <?php
            $id_bagian=$_GET['id_bagian'];
            $edit=("select * from bagian where id_bagian='$id_bagian'");
            $hasil = mysqli_query($db_link,$edit);
            $row=mysqli_fetch_array($hasil);
?>

<h2 class="text-center">UBAH BAGIAN</h2>
           
               <form class="form-horizontal">
                    <div class="form-group" id="id_group">
                        <input type="hidden" name="id_bagian" value="<?php echo $id_bagian;?>"/>
                                
                        <label class="control-label col-sm-3" for="name">Nama Bagian : </label>
                         <div class="col-sm-8">
                            <input class="form-control" id="nama_bagian"  type="text" name="bagian" value="<?php echo $row['bagian'];?>" />
                        </div>
                    </div>
                        
                </form>

                <div class="text-center">	
					<button type="button" id="simpan" class="btn btn-success">SIMPAN</button>
                    <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=bagian&crud=view';" class="btn btn-danger">CANCEL</button>
				</div>
			 
		 
<script src="../vendor/jquery/jquery.min.js"></script>
<script>
 $(document).ready(function () {
          $("#simpan").click(function () {
            var id_bagian = $('input[name=id_bagian]').val();
            var bagian = $('input[name=bagian]').val();
             if (bagian=='' || bagian==null) {

                $("#id_group").addClass("form-group has-error has-feedback");
                $("#nama_bagian").after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                 $('#pesan_required').text("Nama Bagian Tidak Boleh Kosong");
                  $("#required").show();
                }
                else {
            $.ajax({
              type: "POST",
              url: "../include/kontrol/kontrol_bagian.php",
              data: 'crud=update&id_bagian=' + id_bagian + '&bagian=' + bagian,
              success: function (respons) {
                  if (respons=='berhasil'){
                        $('#pesan_berhasil').text("Bagian Berhasil Dirubah");
                        $("#hasil").show();
                        setTimeout(function(){
                            $("#hasil").hide(); 
                        }, 2000);
                  }
                  else {
                        $('#pesan_gagal').text("Bagian Gagal Dirubah");
                        $("#gagal").show();
                        setTimeout(function(){
                            $("#gagal").hide(); 
                        }, 2000);

                  }
              }
            });
                }
          });
      });
</script>

<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">