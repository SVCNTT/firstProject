<html>
	<head>
		<title>Home Server Control</title>
		<style type="text/css">

			#serverControl{
				width: 50%;
			}
			.btnOnLightCluster {
				width: 60px;
				height: 60px;
			}

			.btnOnLight1 {
				width: 60px;
				height: 60px;
			}

			.btnOnLight2 {
				width: 60px;
				height: 60px;
			}

			.changeAction1 {
				color: red;
			}
		</style>

		<script type="text/javascript" src='jquery.min.js'></script>

		 <script type="text/javascript">

		 $(document).ready(function() {

		 	<?php
		 			$conn = mysqli_connect("localhost", "root", "spkt","dbDen") or die("can't connect database");

					$query = "SELECT * FROM tbDen ";
					$result = $conn->query($query);


					if($conn->query($query) == TRUE) {
					    
						while ($row = mysqli_fetch_array($result)){

							if ($row['ID'] == 1) {
			?>
								var status_light_cluster = <?php echo $row['status'] ?>;
			<?php			} 

							if ($row['ID'] == 2) {
			?>
								var status_light1 = <?php echo $row['status'] ?>;
			<?php			}

							if ($row['ID'] == 3) {
			?>
								var status_light2 = <?php echo $row['status']?>;
			<?php				}

						}

					} else {
					    echo "Error updating record: " . $conn->error;
					}	
		 	?>
		

	 		if (status_light_cluster == 0) {
	 			$('.btnOnLightCluster').css('background-image','url(images/icon_light_off.png)');
	 		} else {
	 			$('.btnOnLightCluster').css('background-image','url(images/icon_light_on.png)');	
	 		}

	 		if (status_light1 == 0) {
	 			$('.btnOnLight1').css('background-image','url(images/icon_light_off.png)');
	 		} else {
	 			$('.btnOnLight1').css('background-image','url(images/icon_light_on.png)');	
	 		}

	 		if (status_light2 == 0) {
	 			$('.btnOnLight2').css('background-image','url(images/icon_light_off.png)');
	 		} else {
	 			$('.btnOnLight2').css('background-image','url(images/icon_light_on.png)');	
	 		}

		 	$('.btnOnLightCluster').click(function(){

		 		if( status_light_cluster == 0) {
			 		status_light_cluster = 1;
			 	} else {
			 		status_light_cluster = 0;
			 	}

		 		$.ajax({
							type : 'POST',
							url : 'saveAction.php',
							data: {id : 1 , status : status_light_cluster},
							success : function (dc) {

	                        	$('.changeAction1').remove();

	                        	$('.changeAction').after('<label class="changeAction1">'+dc+'</label>');

								if (status_light_cluster == 0) {
						 			$('.btnOnLightCluster').css('background-image','url(images/icon_light_off.png)');
						 		} else {
						 			$('.btnOnLightCluster').css('background-image','url(images/icon_light_on.png)');	
						 		}
	                   	 	}
						});

		 	});

		 	$('.btnOnLight1').click(function(){

		 		if( status_light1 == 0) {
			 		status_light1 = 1;
			 	} else {
			 		status_light1 = 0;
			 	}


		 		$.ajax({
							type : 'POST',
							url : 'saveAction.php',
							data: {id : 2 , status : status_light1},
							success : function (dc) {

								$('.changeAction1').remove();

	                        	$('.changeAction').after('<label class="changeAction1">'+dc+'</label>');

	                        	if (status_light1 == 0) {
						 			$('.btnOnLight1').css('background-image','url(images/icon_light_off.png)');
						 		} else {
						 			$('.btnOnLight1').css('background-image','url(images/icon_light_on.png)');	
						 		}
	                   	 	}
						});

		 	});

		 	$('.btnOnLight2').click(function(){

		 		if( status_light2 == 0) {
			 		status_light2 = 1;
			 	} else {
			 		status_light2 = 0;
			 	}

		 		$.ajax({
							type : 'POST',
							url : 'saveAction.php',
							data: {id : 3 , status : status_light2},
							success : function (dc) {

	                        	$('.changeAction1').remove();

	                        	$('.changeAction').after('<label class="changeAction1">'+dc+'</label>');

	                        	if (status_light2 == 0) {
						 			$('.btnOnLight2').css('background-image','url(images/icon_light_off.png)');
						 		} else {
						 			$('.btnOnLight2').css('background-image','url(images/icon_light_on.png)');	
						 		}
	                   	 	}
						});

		 	});

		 });

		 </script>
	</head>
	<body>

		<div id="serverControl">

			<label class="changeAction" ></label>

			<p>
				<button class="btnOnLightCluster"  name="btnOnLightCluster" value=""></button>
				<label>ĐÈN CHÙM</label>
			</p>

			<p>
				<button class="btnOnLight1" name="btnOnLightCluster" value=""></button>
				<label>ĐÈN 1</label>
				
			</p>

			<p>
				<button class="btnOnLight2"  name="btnOnLightCluster" value=""></button>
				<label>ĐÈN 2</label>

			</p>
		</div>
	</body>
</html>