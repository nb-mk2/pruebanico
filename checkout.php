<html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<?php
	require_once('auth.php');
?>
       
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

	
	
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->


<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
</head>
<body onLoad="document.getElementById('country').focus();">
<form action="savesales.php" method="post">
	
<div id="ac">
<center><h4><i class="icon icon-money icon-large"></i> Efectivo</h4></center><hr>
<input type="hidden" name="date" value="<?php echo date("d/m/y"); ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" />
<input type="hidden" name="material" value="<?php echo $_GET['material']; ?>" />
<center>
<select name="product"   style="width:650px; color:ff0e6e;"class="chzn-select " required>
<option></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM customer");
		//$result->bindParam(':customer_id', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['customer_name'];?>"><?php echo $row['customer_name']; ?></option>
	<?php
				}
			?>

</select> 

<!--
<input type="text" size="25" value="" name="cname" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Nombre de Cliente" style="width: 268px; height:30px;" /> -->
   
<div class="suggestionsBox" id="suggestions" style="display: none;">
 <div class="suggestionList" id="suggestionsList"> &nbsp; &nbsp; </div>
 </div>
<?php
$asas=$_GET['pt'];
if($asas=='credit') {
?>Due Date: <input type="date" name="due" placeholder="Due Date" style="width: 268px; height:30px; margin-bottom: 15px;" /><br>
<?php
}
if($asas=='cash') {
?>
<input type="number" id="cash" name="cash" placeholder="Paga con" style="width: 268px; height:30px;  margin-bottom: 15px; margin-top: 20px;"  /><br>
<?php
}

?>

&nbsp;
<select  name="cuenta"  id="cuenta" required>
<option></option>
<option value="Pagado">Pagado</option>
<option value="Presupuesto">Presupuesto</option>
</select>

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Guardar</button>
</center>
</div>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("cuenta");
    var cashInput = document.getElementById("cash");

    function handleSelectChange() {
      if (select.value === "Pagado") {
        cashInput.disabled = false;
        cashInput.value = 0;
      } else if (select.value === "Presupuesto") {
        cashInput.disabled = true;
        cashInput.value = "";
      }
    }

    select.addEventListener("change", handleSelectChange);
  });
</script>

</body>
<?php include('footer.php');?>
</html>

