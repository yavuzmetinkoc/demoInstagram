<?php include 'sidebar.php';include '../php/config.php';

if (isset($_GET['id'])) {

		$id=$_GET['id'];

		$result=mysqli_query($connection,"SELECT * FROM kullanicilar WHERE id='$id'");
		
		$result_pull=mysqli_fetch_array($result);
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
								<div class="panel-heading">
									<h3 class="panel-title">Kulllanıcı Bilgilerini Düzenle</h3>
								</div>
								<form action="admin-islem.php" method="POST" enctype="multipart/form-data">
								
									<div class="form-group col-md-2">
										<h4>ID</h4>
										<input type="text" class="form-control" name="id" value="<?php echo $result_pull['id']; ?>">
									</div>
									<div class="form-group col-md-4">
										<h4>Kullanıcı Adı</h4>
										<input type="text" name="username" class="form-control"  value="<?php echo $result_pull['username']; ?>">
										<br>									
									</div>
									<div class="form-group col-md-3">
										<h4>Adı Soyadı</h4>
										<input type="text" name="fullname" class="form-control"  value="<?php echo $result_pull['fullname']; ?>">
										<br>									
									</div>
									<div class="form-group col-md-3">
										<h4>E-Mail</h4>
										<input type="email" name="email" class="form-control"  value="<?php echo $result_pull['email']; ?>">
										<br>									
									</div>
									<div class="form-group col-md-4">
										<h4>Profil Resmi</h4>
										<img src="<?php echo $result_pull['Presim'];?>" style="height: 300px;width: 300px;" alt="Profil Resmi" title="">
										<br>									
									</div>
									<div class="form-group col-md-4">
										<h4>Profil Resmini Değiştir</h4>
										<input name="resim" type="file"><!--resmin yolu güncellenirken çekilecek-->
										<br>									
									</div>
									<div class="form-group col-md-6">
										<h4>Biyografi</h4>
										<input type="text" name="pBiyografi" class="form-control"  value="<?php echo $result_pull['pBiyografi']; ?>">
										<br>									
									</div>
									<div class="form-group col-md-6">
										<h4>Durum</h4>
										<input type="text" name="durum" class="form-control" value="<?php echo $result_pull['durum']; ?>">
										<br>									
									</div>
									<div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
										<input type="submit" value="Kaydet" class="btn btn-success col-md-12 col-sm-12 col-xs-12" name="btn-kullanici-duzenle">
										<br>									
									</div>
									<div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
										<input type="submit" value="Kullanıcıyı Sil" class="btn btn-danger col-md-12 col-sm-12 col-xs-12" name="btn-kullanici-sil">
										<br>									
									</div>
								</form>
									<?php 
										/*if ($_GET['durum']="ok") {
										echo '<h5>Güncelleme Başarılı</h5>';
										}else{
										echo '<h5>Güncelleme Başarısız</h5>';
										}*/
									 ?>
							</div>
							<!-- END INPUTS -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->