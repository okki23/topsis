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


    //kriteria
    case "kriteria":
        if($crud == 'add'){            
            $id_kriteria=$_POST['id_kriteria']; 
            $nama_kriteria=$_POST['nama_kriteria'];
            $bobot=$_POST['bobot'];
            $atribut=$_POST['atribut']; 
            $sql = "INSERT INTO kriteria (id_kriteria,nama_kriteria,bobot,atribut)
                    VALUES ('".$id_kriteria."','".$nama_kriteria."','".$bobot."','".$atribut."') ";
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
            $id_kriteria=$_POST['id_kriteria']; 
            $nama_kriteria=$_POST['nama_kriteria']; 
            $bobot=$_POST['bobot']; 
            $atribut=$_POST['atribut']; 
            $proses="UPDATE kriteria SET nama_kriteria='$nama_kriteria',bobot='$bobot',atribut='$atribut' WHERE id_kriteria='$id_kriteria'";
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
            $id_kriteria = $_POST['id_kriteria']; 
            $sql = "DELETE from kriteria where id_kriteria=".$id_kriteria;
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

    //pegawai
    case "pegawai":
        if($crud == 'add'){            
            $no_pegawai=$_POST['no_pegawai']; 
            $nama_pegawai=$_POST['nama_pegawai']; 
            $tempat_lahir=$_POST['tempat_lahir']; 
            $tanggal_lahir=$_POST['tanggal_lahir']; 
            $jekel=$_POST['jekel']; 
            $jabatan=$_POST['jabatan']; 
            $agama=$_POST['agama']; 
            $status=$_POST['status']; 
            $no_telp=$_POST['no_telp']; 
            $alamat=$_POST['alamat']; 
            $tanggal_masuk=$_POST['tanggal_masuk'];  
            $sql = "INSERT INTO pegawai (no_pegawai,nama,tempat_lahir,tanggal_lahir,jekel,id_jabatan,agama,status_perkawinan,no_telp,alamat,tgl_masuk)
                    VALUES ('".$no_pegawai."','".$nama_pegawai."',
                    '".$tempat_lahir."',
                    '".$tanggal_lahir."',
                    '".$jekel."',
                    '".$jabatan."',
                    '".$agama."',
                    '".$status."',
                    '".$no_telp."',
                    '".$alamat."',
                    '".$tanggal_masuk."') ";
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
            $no_pegawai=$_POST['no_pegawai']; 
            $nama_pegawai=$_POST['nama_pegawai']; 
            $tempat_lahir=$_POST['tempat_lahir']; 
            $tanggal_lahir=$_POST['tanggal_lahir']; 
            $jekel=$_POST['jekel']; 
            $jabatan=$_POST['jabatan']; 
            $agama=$_POST['agama']; 
            $status=$_POST['status']; 
            $no_telp=$_POST['no_telp']; 
            $alamat=$_POST['alamat']; 
            $tanggal_masuk=$_POST['tanggal_masuk']; 
            $proses="UPDATE pegawai SET 
            nama='$nama_pegawai',
            tempat_lahir='$tempat_lahir',
            tanggal_lahir='$tanggal_lahir',
            jekel='$jekel',
            id_jabatan='$jabatan',
            agama='$agama',
            status_perkawinan='$status',
            no_telp='$no_telp',
            alamat='$alamat',
            tempat_lahir='$tempat_lahir'
             WHERE no_pegawai='$no_pegawai'";
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
            $no_pegawai = $_POST['no_pegawai']; 
            $sql = "DELETE from pegawai where no_pegawai = '$no_pegawai' "; 
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
        
        //jabatan
    case "jabatan":
        if($crud == 'add'){            
            $nama_jabatan=$_POST['nama_jabatan']; 
            $sql = "INSERT INTO jabatan (nama_jabatan)
                    VALUES ('".$nama_jabatan ."') ";
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
            $id_jabatan=$_POST['id_jabatan']; 
            $nama_jabatan=$_POST['nama_jabatan']; 
             
            $proses="UPDATE jabatan SET 
            nama_jabatan='$nama_jabatan' WHERE id_jabatan='$id_jabatan'";
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
            $id_jabatan = $_POST['id_jabatan']; 
            $sql = "DELETE from jabatan where id_jabatan = '$id_jabatan' "; 
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