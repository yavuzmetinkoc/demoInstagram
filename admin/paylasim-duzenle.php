<?php include 'sidebar.php';include '../php/config.php';

if (isset($_GET['id'])) {

		$id=$_GET['id'];

		$result=mysqli_query($connection,"SELECT * FROM paylasimlar WHERE sID='$id'");

		$like=mysqli_query($connection,"SELECT COUNT(*) AS toplambegeni FROM begeniler WHERE sID='$id'");
		
		$like_pull=mysqli_fetch_array($like);
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
									<h3 class="panel-title">Paylaşımları Düzenle</h3>
								</div>

								<form action="admin-islem.php" method="POST" enctype="multipart/form-data">

									<div class="form-group col-md-2">
										<h4>ID</h4>
										<input type="text" name="sID" class="form-control" value="<?php echo $result_pull['sID'];?>">
										<br>									
									</div>
									<div class="form-group col-md-4">
										<h4>Kullanıcı ID</h4>
										<input type="text" name="kullaniciID" class="form-control" value="<?php echo $result_pull['kullaniciID'];?>">
										<br>									
									</div>
									<div class="form-group col-md-3">
										<h4>Tarih</h4>
										<input type="text" name="sTarih"  class="form-control" placeholder="Tarih" value="<?php echo $result_pull['sTarih'];?>">
										<br>									
									</div>
									<div class="form-group col-md-3">
										<h4>Konum</h4>
										<input type="text" name="sKonum"  class="form-control" placeholder="Konum" value="<?php echo $result_pull['sKonum'];?>">
										<br>									
									</div>
									<div class="form-group col-md-6">
										<h4>Resim Açıklaması</h4>
										<input type="text" name="aciklama"  class="form-control" placeholder="Resim Açıklaması" value="<?php echo $result_pull['aciklama'];?>">
										<br>									
									</div>	
									<div class="form-group col-md-3">
										<h4>Beğeni</h4>
										<input type="text" disabled="disabled" name="sBegeni" class="form-control" placeholder="Beğeni" value="<?php echo $like_pull['toplambegeni'];?>">
										<br>									
									</div>
									<div class="form-group col-md-4">
										<h4>Resim</h4>
										<img src="<?php echo $result_pull['sYol'];?>" style="height: 300px;width: 300px;" alt="" title="">
										<br>									
									</div>
									<div class="form-group col-md-4">
										<h4>Resmi Değiştir</h4>
										<input name="resim" type="file"><!--resmin yolu güncellenirken çekilecek-->
										<br>									
									</div>
									<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<input type="submit" name="btn-paylasim-duzenle"  class="btn btn-success col-md-6 col-md-12 col-sm-12 col-xs-12" value="Kaydet">
										<br>									
									</div>
									<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<input type="submit" value="Paylaşımı Sil" class="btn btn-danger col-md-6 col-md-12 col-sm-12 col-xs-12" name="btn-paylasim-sil">
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