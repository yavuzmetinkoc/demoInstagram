<?php include 'sidebar.php';include '../php/config.php';
if ($_GET['id']) {
	
	$id=$_GET['id'];

	$result=mysqli_query($connection,"SELECT * FROM yorumlar WHERE yorumID='$id'");
		
	$yorum_cek=mysqli_fetch_array($result);
}
?>
		<!-- MAIN -->
		<div class="main">
			
			<!-- NAVBAR -->
				<?php include 'header.php'; ?>
			<!-- END NAVBAR -->
			
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
							<div class="panel col-lg-12 col-md-12 col-sm-12 col-xs-12">

							<form action="admin-islem.php" method="POST">
								<div class="panel-heading">
									<h3 class="panel-title">Yorumları Düzenle</h3>
								</div>

								<div class="form-group col-md-2">
									<h5>Yorum ID</h5>
									<input type="text" name="yorumID" class="form-control" placeholder="Yorum ID" value="<?php echo $yorum_cek['yorumID']; ?>">
									<br>									
								</div>
								<div class="form-group col-md-4">
									<h5>Resim ID</h5>
									<input type="text" name="resimID" class="form-control" placeholder="Resim ID" value="<?php echo $yorum_cek['resimID']; ?>">
									<br>									
								</div>
								<div class="form-group col-md-4">
									<h5>Yorum Yapan ID</h5>
									<input type="text" name="kullaniciID" class="form-control" placeholder="Kullanıcı Adı" value="<?php echo $yorum_cek['kullaniciID']; ?>">
									<br>									
								</div>
								<div class="form-group col-md-3">
									<h5>Yorum Yapan</h5>
									<input type="text" name="yorum_yapan" class="form-control" placeholder="Yorum Yapan" value="<?php echo $yorum_cek['yorum_yapan']; ?>">
									<br>									
								</div>
								<div class="form-group col-md-7">
									<h5>Yapılan Yorum</h5>
									<input type="text" name="yapilan_yorum" class="form-control" placeholder="Yapılan Yorum" value="<?php echo $yorum_cek['yorum']; ?>">
									<br>									
								</div>
								<div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<input type="submit" class="btn btn-success btn btn-success col-md-12 col-md-12 col-sm-12 col-xs-12" name="yorum-duzenle" value="Kaydet">
									<br>									
								</div>
								<div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<input type="submit" value="Yorumu Sil" class="btn btn-danger col-md-12 col-md-12 col-sm-12" name="btn-yorum-sil">
										<br>									
								</div>
							</form>
							</div>
							<!-- END INPUTS -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->