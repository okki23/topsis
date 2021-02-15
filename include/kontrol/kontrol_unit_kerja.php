<?php
include_once "../../koneksi.php";

if(isset($_POST['nama_unit_kerja'])){


    if (isset($_POST['crud'])){
        if($_POST['crud']=='update'){
            $id_unit=$_POST['id_unit'];
            $nama_unit_kerja=$_POST['nama_unit_kerja']; 
            $proses="UPDATE unit SET nama_unit_kerja='$nama_unit_kerja' WHERE id_unit='$id_unit'";
            $hasil = mysqli_query($db_link,$proses);
            if ($hasil) {
                $resp = array("status"=>1);
                echo json_encode($resp,TRUE);
            } 
            else {
                $resp = array("status"=>2);
                echo json_encode($resp,TRUE);
            }
        }

        if($_POST['crud']=='tambah'){
        $nama_unit_kerja=$_POST['nama_unit_kerja']; 
            $sql = "INSERT INTO unit_kerja (nama_unit_kerja)
                    VALUES ('".$nama_unit_kerja."') ";
            $hasil = mysqli_query($db_link,$sql); 
            
            if ($hasil) {
                $resp = array("status"=>1);
                echo json_encode($resp,TRUE);
            } 
            else {
                $resp = array("status"=>2);
                echo json_encode($resp,TRUE);
            }
        }

        if($_POST['crud']=='hapus'){

           $id_unit_kerja = $_POST['id_unit_kerja'];
           echo $id_unit_kerja;
           die();
            $sql = "DELETE from unit_kerja where id_unit_kerja=".$id_unit_kerja;
            $hasil = mysqli_query($db_link,$sql);
            if ($hasil) {
                $resp = array("status"=>1);
                echo json_encode($resp,TRUE);
            } 
            else {
                $resp = array("status"=>2);
                echo json_encode($resp,TRUE);
            }
        }
    }

    if($_GET['act']== 'del'){
        echo 'kowe mlebu rene cok!';
    }
}
?>
