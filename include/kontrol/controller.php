<?php
//get connection db
include_once "../../koneksi.php";

//init action and menu
$crud = isset($_POST['crud']) ? $_REQUEST['crud'] : '';
$menu = isset($_POST['menu']) ? $_REQUEST['menu'] : '';
 
//processing
switch($menu){

    //unit_kerja
    case "unit_kerja":
        if($crud == 'add'){            
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

        }else if($crud == 'edit'){
            $id_unit_kerja=$_POST['id_unit_kerja'];
            $nama_unit_kerja=$_POST['nama_unit_kerja']; 
            $proses="UPDATE unit_kerja SET nama_unit_kerja='$nama_unit_kerja' WHERE id_unit_kerja='$id_unit_kerja'";
            $hasil = mysqli_query($db_link,$proses);
            if ($hasil) {
                $resp = array("status"=>1);
                echo json_encode($resp,TRUE);
            } 
            else {
                $resp = array("status"=>2);
                echo json_encode($resp,TRUE);
            }

        }else if($crud == 'delete'){
            $id_unit_kerja = $_POST['id_unit_kerja'];
           
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
    default:
            echo "<script language=javascript>
                alert('Sorry your operation note permitted!');
                window.location='index.php?navigasi=bagian&crud=view';
                </script>";
    }

     
    //kriteria
    //pegawai
    //jabatan
    //bobot_penilaian
    //penilaiain
    //usulan_pegawai_terbaik
 
    /*
    
$sql = "DELETE from unit_kerja where id_unit_kerja='$id_unit_kerja'";
$hasil = mysqli_query($db_link,$sql);
if ($hasil) {
    $resp = array("status"=>1);
    echo json_encode($resp,TRUE);
} 
else {
    $resp = array("status"=>2);
    echo json_encode($resp,TRUE);
}
 */
?>