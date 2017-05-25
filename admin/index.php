<?php include 'sidebar.php';include '../php/config.php';

$result=mysqli_query($connection,"SELECT * FROM kullanicilar");

 ?>
		<!-- MAIN -->
		<div class="main">

			<!-- NAVBAR -->
				<?php include 'header.php'; ?>
			<!-- END NAVBAR -->

			<!-- MAIN CONTENT -->

			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Kullanıcı Adı</th>
												<th>Tam Adı</th>
												<th>E-mail</th>
												<th>Biyografi</th>
												<th>Durum</th>
												<th>Düzenle</th>
											</tr>
										</thead>
									<?php 
									
									while ($result_pull=mysqli_fetch_array($result)) {
										
								
									echo   '<tbody>
											<tr>
												<td>'.$result_pull['id'].'</td>
												<td>'.$result_pull['username'].'</td>
												<td>'.$result_pull['fullname'].'</td>
												<td>'.$result_pull['email'].'</td>
												<td>'.$result_pull['pBiyografi'].'</td>
												<td>'.$result_pull['durum'].'</td>
												<td><a href="kullanici-duzenle.php?id='.$result_pull['id'].'"><input type="submit" class="btn btn-primary" value="Düzenle"></a></td>
											</tr>
										</tbody>';
										}
									 ?>

									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i><?php echo date('F j ,Y / H:i:s');  ?></span></div>
										<div class="col-md-6 text-right"></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
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
	<script src="assets/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js"></script>
	<script src="assets/js/plugins/chartist/chartist.min.js"></script>
	<script src="assets/js/klorofil.min.js"></script>
</body>
</html>
