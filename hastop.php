<?php 
include "koneksi.php";
$tampil = "select a.*,b.nama,c.nama_kriteria from penilaian a
left join pegawai b on b.no_pegawai = a.no_pegawai
left join kriteria c on c.id_kriteria = a.id_kriteria";
$hasil = mysqli_query($db_link,$tampil);
$row=mysqli_fetch_array($hasil);

var_dump($row);
die();
$data      =array();
$kriterias =array();
$bobot     =array();
$nilai_kuadrat =array();

if ($tampil) {
  while($row=$tampil->fetch_object()){
    if(!isset($data[$row->nama_alternatif])){
      $data[$row->nama_alternatif]=array();
    }
    if(!isset($data[$row->nama_alternatif][$row->nama_kriteria])){
      $data[$row->nama_alternatif][$row->nama_kriteria]=array();
    }
    if(!isset($nilai_kuadrat[$row->nama_kriteria])){
      $nilai_kuadrat[$row->nama_kriteria]=0;
    }
    $bobot[$row->nama_kriteria]=$row->bobot;
    $data[$row->nama_alternatif][$row->nama_kriteria]=$row->nilai;
    $nilai_kuadrat[$row->nama_kriteria]+=pow($row->nilai,2);
    $kriterias[]=$row->nama_kriteria;
  }
}
?>