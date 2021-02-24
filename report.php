<?php 

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

?>
<br>
            <h3 align="left">    Evaluation Matrix (x<sub>ij</sub>) </h3>
      	  
			<table style="border: solid 1px #FF0000; background: #FFFFFF; width: 100%; text-align: center">
                <thead>
                  <tr style="width:100%;">
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriterias</th>
                  </tr>
                  <tr>
                    <?php
                    foreach($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for($n=1;$n<=$jml_kriteria;$n++)
                      echo "<th>K$n</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>A$i</th>
                      <td>$nama</td>";
                    foreach($kriteria as $k){
                      echo "<td align='center'>$krit[$k]</td>";
                    }
                    echo "</tr>\n";
                  }
                  ?>
                </tbody>
              </table>
          