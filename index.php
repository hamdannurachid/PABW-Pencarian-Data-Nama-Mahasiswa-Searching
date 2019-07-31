<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php 
include 'config.php';
?>
<body>
<title>Form Pencarian</title>
<h3>Form Pencarian</h3>


<form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>

<div class="alert alert-primary" role="alert">
  <?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
</div>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
<table class="table table-hover table-warning">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($koneksi, "select * from mhs where nama like '%".$cari."%'");				
	}else{
		$data = mysqli_query($koneksi, "select * from mhs");		
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['nama']; ?></td>
	</tr>
	<?php } ?>
    </tr>
    
  </tbody>
</table>

</div>
</body>