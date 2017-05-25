<?php include 'sidebar.php';include '../php/config.php';

$result=mysqli_query($connection,"SELECT * from takipciler");
?>
		
		<!-- MAIN -->
		<div class="main">
		
			<!-- NAVBAR -->
			<?php include 'header.php'; ?>
			<!-- END NAVBAR -->

			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Takipçiler</h3>
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
												<th>Takipçi ID</th>
												<th>Takipçi</th>
												<th>Takip Edilen ID</th>
												<th>Takip Edilen</th>
											</tr>
										</thead>
										<?php 
										while ($result_pull=mysqli_fetch_array($result)) {
										echo '
											<tbody>
											<tr>
												<td>'.$result_pull['takipci_id'].'</td>
												<td>'.$result_pull['takipci_adi'].'</td>
												<td>'.$result_pull['takip_edilen_id'].'</td>
												<td>'.$result_pull['takip_edilen_kisi'].'</td>
												<td><a href="takipci-duzenle.php?id='.$result_pull['takipci_id'].'"><input type="submit" class="btn btn-primary" value="Düzenle"></a></td>
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
