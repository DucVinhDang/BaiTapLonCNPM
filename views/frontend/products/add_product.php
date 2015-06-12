<head>
	<style type="text/css">
		body {
			background-color: white !important;
			font-family: Helvetica;
		}

		a {
			text-decoration: none !important;
			color: white !important;
		}

		.panel-main-body {
			width: 800px;
		}

		.panel-main-body .form-group {
			padding: 15px 10px;
		}

		.panel-main-body .panel-heading {
			padding-top: 12px; padding-bottom: 12px;
		}

		.panel-main-body .panel-heading .panel-title {
			font-size: 18px;
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

		.button-form {
			margin-left: 20px; margin-right: 25px;
			margin-top: 45px;
			padding-top: 15px;
			border-top: 1px solid #d3d3d3;
		}

		.button-form button {
			float: left; margin-right: 5px;
		}

	</style>
</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
	    <li class="active">Tạo sản phẩm</li>
	    
	</ol>
	<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo sản phẩm</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newname" placeholder="Tên sản phẩm">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Mã danh mục</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newcategoryid">
			        <?php
			        	foreach($categories as $row)  {
			        		echo "<option value=".$row["category_id"].">" . $row["name"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Mã nhà cung cấp</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newmanufacturerid">
			        <?php
			        	foreach($manufacturers as $row)  {
			        		echo "<option value=".$row["manufacturer_id"].">" . $row["name"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newprice" placeholder="Giá sản phẩm">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newquantity" placeholder="Số lượng">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Độ tuổi thích hợp</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newage" placeholder="Độ tuổi thích hợp">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newgender">
			        	<option value="2">Bé trai và bé gái</option>
			        	<option value="1">Bé trai</option>
			        	<option value="0">Bé gái</option>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
			    <div class="col-md-10">
			        <input type="file" name="newavatar" id="productAvatarToUpload">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Đánh giá nhanh</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newquickreview" placeholder="Đánh giá nhanh">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Trạng thái sản phẩm</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newstatus">
			        	<option value="1">Bình thường</option>
			        	<option value="0">Khóa</option>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputPassword3" name="newdescription" placeholder="Mô tả">
			    </div>
			</div>
			<div class="button-form">
				<button class="btn btn-primary"><a href="admin.php?controller=product">Quay lại</a></button>
				<input class="btn btn-success" id="create-btn" type="submit" name="submit" value="Tạo mới">
			</div>
		</div>
		
	</form>
</body>