<?php
    $query = "SELECT max(id_bagian) as maxKode FROM bagian";
    $hasil = mysqli_query($db_link,$query);
    $data  = mysqli_fetch_array($hasil);
    $kodeBarang = $data['maxKode'];
    $noUrut = (int) substr($kodeBarang, 3, 3);
    $noUrut++;
    $char = "B-";
    $newID = $char . sprintf("%04s", $noUrut);
?>
 

                <h2 class="text-center">TAMBAH BAGIAN</h2>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="name">ID BAGIAN :</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="id_bagian" disabled autocomplete="off" size="8" value="<?php echo $newID;?>"/>
                                <input type="hidden" name="id_bagian" autocomplete="off" value="<?php echo $newID;?>"/>
                            </div>
                        </div>
                        <div class="form-group" id="id_group">
                            <label class="control-label col-sm-3" for="bagian" >BAGIAN :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_bagian" name="nama_bagian" placeholder="Nama Bagian" >
                                <div></div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">	
					<button type="button" id="tambah" class="btn btn-success">SIMPAN</button>
                    <button type="button" id="cancel" onclick="window.location ='index.php?navigasi=bagian&crud=view';" class="btn btn-danger">CANCEL</button>
				</div>
                </div>
		 
	 

<script src="../vendor/jquery/jquery.min.js"></script>

<script>
 $(document).ready(function () {
     
          $("#tambah").click(function () {
            var id_bagian = $('input[name=id_bagian]').val();
            var bagian = $('input[name=nama_bagian]').val();
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
              data: 'crud=tambah&id_bagian=' + id_bagian + '&bagian=' + bagian,
              success: function (respons) {
                if (respons = 1){
                    alert('Berhasil Ditambahkan!');
	                    window.location='index.php?navigasi=bagian&crud=view';
                  }
                  else {
                    alert('Gagal!');
	                    window.location='index.php?navigasi=bagian&crud=view';

                  }
                  
              }
            }); 
                }
          });
      });
</script>

<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">