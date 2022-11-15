<html>
	<head>
		<!-- Jquery -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
			bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
			Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Bootstrap JS -->
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous"></script>

		<!--Font-Awesome CSS-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/orderHistory.css"/>

		<!-- Scripts -->
			<script type="text/javascript">
            	window.setTimeout(function() {
                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                    	$(this).remove(); 
                	});
            	}, 3000);
        	</script>

        <!-- Message Pop ups -->
			<?php
				if(isset($_GET['error'])){ ?>
					<div class="alert alert-danger" id="alert-message">
  						<a href="#" id='alert-message' class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<?= $_GET['error'] ?>
					</div>
			<?php  }
				if(isset($_GET['message'])){ ?>
					<div class="alert alert-success" id="alert-message">
  						<a href="#"  class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<?= $_GET['message'] ?>
					</div>
			<?php  }
			?>


			<title>Order History</title>
	</head>
		
	<body>	

		<!-- Nav -->
			<div class ="navbar">
				<?php if(isset($_SESSION['username'])){
			    	echo '
			     		<a class="active" href ="/Product/indexBuyer">Home</a>
		        		<a  href ="/Profile/viewCart">Cart</a>
		        		<a  href ="/Profile/viewMessages">Messages</a>
  						<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
		        		<a  href ="/Profile/orderHistory">History</a>
						<a  href ="/Profile/logout">Logout</a>
					';
			    }?>	
			</div>

		<h1 class='title'>My Orders</h1>	

		<div class="order">
		<?php
						foreach($data['order'] as $order)
						{	
								echo"
								<div class='container'>
    								<article class='card'>
        							<div class='card-body'>
            						<h6>Order ID: $order->order_id</h6>
            						<article class='card1'>
						                <div class='card-body row'>
						                    <div class='card-body row'>
						                    <div class='col'> <strong>Status:</strong><br>$order->status</div>
						                    <div class='col'> <strong>Date:</strong><br>$order->date</div>
						                </div>
						                </div>
						            </article>
						            <hr style='display:inline-block'>
							        	<ul class='row'>
							                <ol class='col-md-4'>
							                <figure class='itemside'>
							                        <div class='aside'><img src='/images/$order->image' class='img-sm border' style='max-width: 200px; max-height: 200px;'></div>
							                        <figcaption class='info align-self-center'>
							                            <p class='title'>$order->name</p> <span class='text-muted'>$$order->price ($order->qty)</span>
							                        </figcaption>
							                    </figure>
							                </ol>
							           	</ul>
						 			</hr>
				        			</div>
							    			</article>
										</div><br>";
						}	
		?>
	</div>
	</body>		
</html>