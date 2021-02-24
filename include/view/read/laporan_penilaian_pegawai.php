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
<a href="../report.php" target="_blank" class="btn btn-info"> Print Laporan </a>
        <div class="panel-heading">
            <h3 align="left">    Evaluation Matrix (x<sub>ij</sub>) </h3>
      	    </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
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
         </div>

         <div class="panel-heading">
         <h3 align="left">   Rating Kinerja Ternormalisasi (r<sub>ij</sub>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
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
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      echo "<td align='center'>".@round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)."</td>";
                    }
                    echo
                     "</tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="panel-heading">
            <h3 align="left">   Rating Bobot Ternormalisasi(y<sub>ij</sub>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
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
                  $y=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      @$y[$k][$i-1]=round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)*$bobot[$k];
                      echo "<td align='center'>".$y[$k][$i-1]."</td>";
                    }
                    echo
                     "</tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="panel-heading">
            <h3 align="left">   Solusi Ideal positif (A<sup>+</sup>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
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
                      echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $yplus=array();
                    foreach($kriteria as $k){
                      $yplus[$k]=([$k]?max($y[$k]):min($y[$k]));
                      echo "<th>$yplus[$k]</th>";
                    }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="panel-heading">
            <h3 align="left"> Solusi Ideal negatif (A<sup>-</sup>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach($kriteria as $k)
                      echo "<th>{$k}</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for($n=1;$n<=$jml_kriteria;$n++)
                      echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $ymin=array();
                    foreach($kriteria as $k){
                      $ymin[$k]=[$k]?min($y[$k]):max($y[$k]);
                      echo "<th>{$ymin[$k]}</th>";
                    }

                    ?>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="panel-heading">
            <h3 align="left">  Jarak positif (D<sub>i</sub><sup>+</sup>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>D<suo>+</sup></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  $dplus=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      if(!isset($dplus[$i-1])) $dplus[$i-1]=0;
                      $dplus[$i-1]+=pow($yplus[$k]-$y[$k][$i-1],2);
                    }
                    echo "<td>".round(sqrt($dplus[$i-1]),6)."</td>
                     </tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="panel-heading">
            <h3 align="left">  Jarak negatif (D<sub>i</sub><sup>-</sup>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>D<suo>-</sup></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  $dmin=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      if(!isset($dmin[$i-1]))$dmin[$i-1]=0;
                      $dmin[$i-1]+=pow($ymin[$k]-$y[$k][$i-1],2);
                    }
                    echo "<td>".round(sqrt($dmin[$i-1]),6)."</td>
                     </tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="panel-heading">
            <h3 align="left">   Nilai Preferensi(V<sub>i</sub>) </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>V<sub>i</sub></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  $V=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      @$V[$i-1]=$dmin[$i-1]/($dmin[$i-1]+$dplus[$i-1]);
                    }
                    echo "<td>{$V[$i-1]}</td></tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>