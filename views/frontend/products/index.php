<head>
	<title>Trang quản trị - Sản phẩm</title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<style type="text/css">
		body {
			background-color: white !important;
			font-family: Helvetica;
			margin: 0px;
			padding: 0px;
		}

		a {
			text-decoration: none !important;
			color: white !important;
		}

		.panel-main-body {
			margin-top: 20px;
		}

		.panel-main-body .panel-heading {
			padding-top: 15px; padding-bottom: 15px;
		}

		.panel-main-body .panel-heading .panel-title {
			font-size: 22px;
		}

		.breadcrumb {
			margin-top: 15px;
			font-size: 16px;
			background-color: white !important;
			border-bottom: 3px solid #d8d8d8;
			border-radius: 0px !important;
		}

		.breadcrumb li a {
			color: #2a2a2a !important;
		}

		.product-function-form {
			width: 100%;
			padding: 5px;
			margin-bottom: 15px;
		}

		.product-function-form .form-left {
			float: left;
		}

		.product-function-form .form-right {
			float: right;
		}

		.product-function-form .form-right .input-group {
			width: 350px;
		}

		table {
			clear: both;
			margin-top: 50px;
			background-color: white !important;
			font-size: 13px;
		}

		table #table-header-tr {
			border-bottom: 2px solid #d3d3d3;
		}

		table button {
			font-size: 13px !important;
		}

		table form {
			text-align: center;
		}

		table img {
			width: 140px;
			height: auto;
		}

		.pagination li a {
			color: #5a5a5a !important;
		}

	</style>
	<script>
		function checkBlankSearchInput(){
	    	if(document.getElementById('search-input').value.length == 0){
				window.alert("Bạn chưa nhập nội dung tìm kiếm");
	    		return false;
	    	}
	    	return true;
	    }

	    window.onload = function () {
			if (typeof history.pushState === "function") {
			    history.pushState("jibberish", null, null);
			    window.onpopstate = function () {
			        history.pushState('newjibberish', null, null);
			        <?php
			        	echo "header('admin.php?controller=product')";
			        ?>
			    };
			}
		}
	</script>
</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null);

		if(!isset($_SESSION["login_status"])) {
			$_SESSION["login_status"] = 0;
		}

		if(isset($_SESSION["db_fail"])) {
			echo $_SESSION["db_fail"];
			$_SESSION["db_fail"] = "";
		}

		if(isset($_SESSION["create_product_successfull"])) {
			echo $_SESSION["create_product_successfull"];
			$_SESSION["create_product_successfull"] = "";
		}

		if(isset($_SESSION["create_product_fail"])) {
			echo $_SESSION["create_product_fail"];
			$_SESSION["create_product_fail"] = "";
		}

		if(isset($_SESSION["delete_product_successful"])) {
			echo $_SESSION["delete_product_successful"];
			$_SESSION["delete_product_successful"] = "";
		}

		if(isset($_SESSION["delete_product_fail"])) {
			echo $_SESSION["delete_product_fail"];
			$_SESSION["delete_product_fail"] = "";
		}

		if(isset($_SESSION["update_product_successful"])) {
			echo $_SESSION["update_product_successful"];
			$_SESSION["update_product_successful"] = "";
		}

		if(isset($_SESSION["edit_product_fail"])) {
			echo $_SESSION["edit_product_fail"];
			$_SESSION["edit_product_fail"] = "";
		}
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Dashbroard</a></li>
	    <li class="active">Quản lý sản phẩm</li>
	</ol>

	<div class="panel panel-default panel-main-body">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-product" aria-hidden="true"></span>Danh mục quản lý sản phẩm</h3>
		</div>
		<div class="panel-body">

			<div class="product-function-form">
				<div class="form-left">
					<button type="button" class="btn btn-primary"><a href="?controller=product&action=add">Thêm mới</a></button>
				</div>
				<div class="form-right">
					<form class="input-group" method="POST" action="admin.php?controller=product&action=search" onsubmit="return checkBlankSearchInput()">
				        <input type="text" id="search-input" name="keyword" class="form-control" placeholder="Nhập thông tin sản phẩm cần tìm">
				        <span class="input-group-btn">
				        <?php
				        echo "<button class='btn btn-primary' type='submit' name='search_submit'>Tìm kiếm</button>";
						?>
				      </span>
				    </form>
				</div>
			</div>

			<?php
				
				echo "<table class='table table-bordered'>";
					echo "<tr id='table-header-tr'>";
					 	echo "<th>Id</th>";
					 	echo "<th>Danh mục</th>";
					 	echo "<th>Nhà cung cấp</th>";
					 	echo "<th>Tên sản phẩm</th>";
					 	echo "<th>Ảnh</th>";
					 	echo "<th>Giá (VNĐ)</th>";
					 	echo "<th>Trạng thái</th>";
					 	echo "<th>Thông tin</th>";
					 	echo "<th>Chỉnh sửa</th>";
					 	echo "<th>Xóa</th>";
					 echo "</tr>";

					foreach($result as $row) {
					 	echo "<tr>";
						 	echo "<td>" . $row["product_id"] . "</td>";
						 	echo "<td>" . $row["category_id"] . "</td>";
						 	echo "<td>" . $row["manufacturer_id"] . "</td>";
						 	echo "<td>" . $row["name"] . "</td>";
						 	echo "<td><img src='" . $row["avatar"] . "'></td>";
						 	echo "<td>" . $row["price"] . " đ</td>";
						 	echo "<td>" . $row["status"] . "</td>";
						 	echo "<td style='text-align: center'>
						 		<button class='btn btn-info'><a href='admin.php?controller=product&action=show&product_id=".$row["product_id"]."'><span class='glyphicon glyphicon-list' aria-hidden='true'></span>Chi tiết</a></button>
						 	</td>";
						 	echo "<td style='text-align: center'>
						 		<button class='btn btn-success'><a href='admin.php?controller=product&action=edit&product_id=".$row["product_id"]."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</a></button>
						 	</td>";
						 	echo "<td style='text-align: center'>
						 		<button class='btn btn-danger'><a href='admin.php?controller=product&action=delete&product_id=".$row["product_id"]."'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</a></button>
						 	</td>";
						echo "</tr>";
					}
				echo "</table>";
			?>

			<nav>
			    <ul class="pagination">
			    	<?php
			    		echo "<li>";
			    		if (!isset($_GET["action"])) {
			    			echo "<a href='admin.php?controller=product&action=search&page=".($_GET["page"]-1)."' aria-label='Previous'>";
			    		} else { 
				    		if ($_GET["action"] != "search") {
				    			echo "<a href='admin.php?controller=product&page=".($_GET["page"]-1)."' aria-label='Previous'>";
				    		} else {
				    			echo "<a href='admin.php?controller=product&action=search&page=".($_GET["page"]-1)."' aria-label='Previous'>";
				    		}
			    		}
					    echo "<span aria-hidden='true'>&laquo;</span>
					        </a>
					    </li>";
			    		for($i = 1; $i <= $page_number; $i++) {
			    			if(!isset($_GET["action"])) {
			    				echo "<li><a href='admin.php?controller=product&page=".$i."'> ".$i."</a></li>";
			    			} else {
			    				if ($_GET["action"] != "search") {
				    				echo "<li><a href='admin.php?controller=product&page=".$i."'> ".$i."</a></li>";
					    		} else {
					    			echo "<li><a href='admin.php?controller=product&keyword=".$keyword."&action=search&page=".$i."'> ".$i."</a></li>";
					    		}
			    			}
			    		}
			    		echo "<li>";
			    		if(!isset($_GET["action"])) {
			    			echo "<a href='admin.php?controller=product&action=search&page=".($_GET["page"]+1)."' aria-label='Next'>";
			    		} else { 
				    		if ($_GET["action"] != "search") {
				    			echo "<a href='admin.php?controller=product&action=search&page=".($_GET["page"]+1)."' aria-label='Next'>";
				    		} else {
				    			echo "<a href='admin.php?controller=product&action=search&page=".($_GET["page"]+1)."' aria-label='Next'>";
				    		}
				    	}
					    echo "<span aria-hidden='true'>&laquo;</span>
					        </a>
					    </li>";
			    	?>			    	
			    </ul>
			</nav>
		</div>
	</div>

	
</body>