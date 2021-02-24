<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

//data conn and query
$conn = new mysqli("localhost", "root", "", "spk_topsis");
 
$tampil = $conn->query("SELECT b.nama,c.nama_kriteria,a.nilai,c.bobot
FROM
  penilaian a
  JOIN
    pegawai b USING(no_pegawai)
  JOIN
    kriteria c USING(id_kriteria)");

$data      =array();
$kriterias =array();
$bobot     =array();
$nilai_kuadrat =array();

if ($tampil) {
while($row=$tampil->fetch_object()){
if(!isset($data[$row->nama])){
$data[$row->nama]=array();
}
if(!isset($data[$row->nama][$row->nama_kriteria])){
$data[$row->nama][$row->nama_kriteria]=array();
}
if(!isset($nilai_kuadrat[$row->nama_kriteria])){
$nilai_kuadrat[$row->nama_kriteria]=0;
}
$bobot[$row->nama_kriteria]=$row->bobot;
$data[$row->nama][$row->nama_kriteria]=$row->nilai;
$nilai_kuadrat[$row->nama_kriteria]+=pow($row->nilai,2);
$kriterias[]=$row->nama_kriteria;
}
}

$kriteria     =array_unique($kriterias);
$jml_kriteria =count($kriteria);
 


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$html = '<h3 align="left">    Evaluation Matrix (x<sub>ij</sub>) </h3>
      	  
<table style="border: solid 1px #FF0000; background: #FFFFFF; width: 100%; text-align: center">
    <thead>
      <tr style="width:100%; border:1px solid blue;">
        <th rowspan="3">No</th>
        <th rowspan="3">Alternatif</th>
        <th rowspan="3">Nama</th>
        <th colspan="'.$jml_kriteria.'">Kriteria</th>
      </tr>
      <tr>';
         
        foreach($kriteria as $k)
          $html.= '<th>'.$k.'</th>\n';
$html.=" </tr>";
        
        for($n=1;$n<=$jml_kriteria;$n++)
          $html.="<th>K$n</th>";
$html.="</tr>
    </thead>
    <tbody>";

      $i=0;
      foreach($data as $nama=>$krit){
        $html.="\n <tr>
          <td>".(++$i)."</td>
          <th>A$i</th>
          <td>$nama</td>";
        foreach($kriteria as $k){
          $html.="<td align='center'>$krit[$k]</td>";
        }
        $html.= "</tr>\n";
      } 
$html.="</tbody>
  </table>
";
$dompdf->loadHtml($html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("oke.pdf",array("Attachment" => false));
?>