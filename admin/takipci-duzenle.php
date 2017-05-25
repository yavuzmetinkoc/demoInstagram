<?php include 'sidebar.php';include '../php/config.php';

	if (isset($_GET['id'])) {

		$id=$_GET['id'];

		$result=mysqli_query($connection,"SELECT * FROM takipciler WHERE takipci_id='$id' Order by takip_edilen_id asc");
		
		$takipci_cek=mysqli_fetch_array($result);
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
									<h3 class="panel-title">Takipçileri Düzenle</h3>
								</div>

								<div class="form-group col-md-2">
									<h5>Takipçi ID</h5>
									<input type="text" name="takipci_id" class="form-control" value="<?php echo $takipci_cek['takipci_id']; ?>">
									<br>									
								</div>
								<div class="form-group col-md-4">
									<h5>Takip Edilen ID</h5> 		
									<input type="text" name="takip_edilen_id" value="<?php echo $takipci_cek['takip_edilen_id']; ?>" class="form-control">
									<br>									
								</div>
								<div class="form-group col-md-3">
									<h5>Takipçi</h5>
									<input type="text" name="takipci_adi" value="<?php echo $takipci_cek['takipci_adi']; ?>" class="form-control">
									<br>									
								</div>
								<div class="form-group col-md-3">
									<h5>Takip Edilen</h5>
									<input type="text" name="takip_edilen_kisi" value="<?php echo $takipci_cek['takip_edilen_kisi']; ?>" class="form-control">
									<br>									
								</div>
								<div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<input type="submit" name="takipci-duzenle" value="Kaydet" class="btn btn-success btn btn-success col-md-12 col-md-12 col-sm-12 col-xs-12">
									<br>									
								</div>
								<div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<input type="submit" value="Takibi Bırak" class="btn btn-danger col-md-12 col-md-12 col-sm-12" name="btn-takipci-sil">
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