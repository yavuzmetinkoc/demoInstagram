<?php include 'sidebar.php';include '../php/config.php';

$result=mysqli_query($connection,"SELECT * FROM paylasimlar JOIN kullanicilar on kullanicilar.id=paylasimlar.kullaniciID");
?>
		<!-- MAIN -->
		<div class="main">
			<!-- NAVBAR -->
			<?php include 'header.php'; ?>
			<!-- END NAVBAR -->

			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Paylasımlar</h3>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>	
												<th>K.ID</th>
												<th>Tarih</th>
												<th>Konum</th>
												<th>Resim Yolu</th>
												<th>Resim Açıklaması</th>
												<th>Begeni Sayısı</th>
												<th>Düzenle</th>
											</tr>
										</thead>
										<?php 

										while ($result_pull=mysqli_fetch_array($result)) {
										$like=mysqli_query($connection,"SELECT COUNT(*) AS toplambegeni FROM begeniler WHERE sID='".$result_pull['sID']."'");
										$like_pull=mysqli_fetch_array($like);	
										
										echo '
											<tbody>
											<tr>
													

												<td name="ID">'.$result_pull['sID'].'</td>
												<td name="fullname">'.$result_pull['kullaniciID'].'</td>
												<td name="sTarih">'.$result_pull['sTarih'].'</td>
												<td name="sKonum">'.$result_pull['sKonum'].'</td>
												<td name="sYol">'.$result_pull['sYol'].'</td>
												<td name="aciklama">'.$result_pull['aciklama'].'</td>
												<td name="sBegeni">'.$like_pull['toplambegeni'].'</td>
												<td><a href="paylasim-duzenle.php?id='.$result_pull['sID'].'"><input type="submit" class="btn btn-primary" value="Düzenle" name="kullanici-bilgi-duzenle"></a></td>
											</tr>
										</tbody>
											';
										}


										 ?>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->		
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/klorofil.min.js"></script>
</body>

</html>
