
<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sweet Shack</title>
	<!-- Link the CSS file -->
	<link rel="stylesheet" type="text/css" href ="mycss.css">
	
  </head>
  
	<body class = "design">
		<!--Created a modal for the login details -->
  	<div class="modal " id = "loginModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content button">
			  <div class="modal-header">
				<h2 class="modal-title"><img src="images/sweetIcon.png" alt=" Hard candy" class="sweetmargin" width="30px">Login<img src="images/sweetIcon.png" class="sweetmargin" width="30px" ></h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<div class="modal-body" id = "loggedIn">
					<form>
						<div class="form-group">
							<label for="userEmail">Email address:</label>
							<input type="email" class="form-control"  id="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text ">Example: user@user.ie</small>
						</div>
						<div class="form-group">
							<label for="userPassword">Password:</label>
							<input type="password" class="form-control" id="userPassword" placeholder="Password">
						</div>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-danger" onclick= "login()">Submit</button>
				  
					</form>
				</div>
				
			</div>
		</div>
	</div>
		
	<!-- navBar contains two buttons with centered text and matching icons on either end-->
	<nav class="navbar centered sticky-top" id="navBarColour">
		<img src="images/sweetIcon.png" class="sweetmargin" width="30px" >
		<!-- onclick of the sweet treats button calls function which displays the products -->
		<button type="button" class="btn  ml-2 button " onclick="showTreats()">Sweet Treats</button>
		<h2><a href="index.html">Sweet Shack</a></h2>
		<!-- when cart button is pressed it calls to the cart modal -->
		<button class=" button btn ml-2 my-sm-0 navright"><img src="images/shopping-cart.png" height="19px" data-toggle="modal" data-target="#cartModal">  Cart </button>
		<img src="images/sweetIcon.png" class="sweetmargin navright" width="30px" >
		
	</nav>
	
	<!--contains all the product cards -->
	<div class="container cardHolder " id= "products" style="display:none"  >
	<?php
	

		//Establish a connection with the database
		$connection = mysqli_connect("localhost","root" , "" ,"g00330394" );
		
		//in case it fails
		if(mysqli_connect_errno()){
			die("DB Connection Failed: " .
			mysqli_connect_error().
			"(".mysqli_connect_errno().")"
			
			);
		}
		if(!$connection){
			die('Could not connect: '.mysqli_errno());
		}
		
		//selects all products from the database and saves to variable result
		$result = mysqli_query($connection, "SELECT * FROM PRODUCTS");
		//loops over each row
			while($row = mysqli_fetch_array($result)){
	 
	?>
	
			<!-- php parses the value into cards to be displayed in html-->
			<div class=" card  col-lg-2 col-md-4 col-sm-4 col-xs-1 ">
				<form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
					<img class="card-img-top" width="100px" height= "175px"   src="<?php echo $row['image']; ?>" alt="Card image cap">
					<hr>
					<div class="card-body text-center ">
						<p class="card-title" id="name"><?php echo $row['name']; ?></p>
						<input type="text" name="quantity" class = "form-control" value = "1"/>
						<p class="card-text">€<?php echo $row['price']; ?></p>
						<!-- hidden values and quantity are used to creat objects to be save into shopping cart-->
						<input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>"/>
						<input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>"/>
						<button name="add_to_cart" class="btn btn-danger" >Add to cart</button>
					</div>
				</form>
			</div>
		
			<?php } ?>
		
	<?php
			
				if(isset($_POST["add_to_cart"])) {  
			if(isset($_SESSION["shopping_cart"])){  
			   $item_array_id = array_column($_SESSION["shopping_cart"], "item_id"); 
			   
			   if(!in_array($_GET["id"], $item_array_id))  
			   {  
					$count = count($_SESSION["shopping_cart"]);  
					$item_array = array(  
						 'item_id'               =>     $_GET["id"],  
						 'item_name'               =>     $_POST["hidden_name"],  
						 'item_price'          =>     $_POST["hidden_price"],  
						 'item_quantity'          =>     $_POST["quantity"]  
					);  
					$_SESSION["shopping_cart"][$count] = $item_array;  
					 json_encode($item_array);
			   }  
			    
			}else{  
			   $item_array = array(  
					'item_id'               =>     $_GET["id"],  
					'item_name'               =>     $_POST["hidden_name"],  
					'item_price'          =>     $_POST["hidden_price"],  
					'item_quantity'          =>     $_POST["quantity"]  
			   );  
			   $_SESSION["shopping_cart"][0] = $item_array;  
			}  
		} 
		
	?>
	
	
						  
	<?php
		
							  // frees data and closes connection
									mysqli_free_result($result);
									mysqli_close($connection);
		 
	?>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</div>
	
		</body>
	</html>