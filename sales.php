<!DOCTYPE html>
<html>
<head>
	<!-- js -->			
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>

<title>
POS
</title>
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




 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	

</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)round(microtime(true)*1000000));
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Efectivo
</a>

<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>
	
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Inicio </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i>Materiales</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i>Agregar Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Proveedores</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Reporte ventas</a>                </li>
			<li><a href="corriente.php"><i class="icon-bar-chart icon-2x"></i>Cuentas Corriente</a>                </li>
			<br><br><br><br><br><br>
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
			</form>
			  </div>
			</li>
				
				</ul>    
<?php } ?>				
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
		<div class="contentheader">
			<i class="icon-money"></i> Ventas
			</div>
			<ul class="breadcrumb">
			<a href="index.php"><li>Inicio</li></a> /
			<li class="active">Ventas</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Atras</button></a>
</div>
													
<form action="incoming.php" method="post" >
											
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; // product?>" />

<input type="hidden" name="producto_id" id="producto_id">
<input type="text" name="campo" id="campo"  style="width:650px; font-size: 24px; ">
<input type="number" step = "any" min = ”0 ″ name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("d/m/y"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Agregar</button>
<ul  style="width: 650px; font-size: 24px; margin-bottom: 5px; " id="lista"></ul>

</form>

<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Nombre Producto</th>
			<th> Precio unitario</th>
			<th> Cantidad </th>
			<th> Total </th>
			<th> Accion </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['invoice'];
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			
			
			
			<tr class="record">
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['product_code']; ?></td>

			<td>
			<?php
			$ppp=$row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			
			<td><?php echo $row['qty']; ?></td>
			
			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			
			
			<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			
			
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Cantidad total: </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;"></strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
				<!--
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php 
				$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
				$resulta->bindParam(':b', $sdsd);
				$resulta->execute();
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$asd=$qwe['sum(profit)'];
				echo formatMoney($asd, true);
				}
				?>
		
				</td>
				
				<?php 
				$hola = $db->prepare("SELECT product_code FROM sales_order WHERE invoice= :b");
				$hola->bindParam(':b', $sdsd);
				$hola->execute();
				for($i=0; $qwe = $hola->fetch(); $i++){
				$material=$qwe['product_code'];
				echo formatMoney($material, true);
				}
				?>-->
				
				<th></th>
			</tr>
		
	</tbody>
</table><br>
<!-- aqui le mandamos al checkout, la id de invoice, total, totalprof, y cashier-->
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>&material=<?php echo $material?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> Guardar</button></a>
<div class="clearfix"></div> 
</div>
</div>
</div>
<script>
    document.getElementById("campo").addEventListener("keyup", getCodigos)

    function getCodigos() {

        let inputCP = document.getElementById("campo").value
        let lista = document.getElementById("lista")

        if (inputCP.length > 0) {

            let url = "buscarinputAjax.php"
            let formData = new FormData()
            formData.append("campo", inputCP)

            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }

	
    }

	

	function mostrar(cp , productCode) {
    lista.style.display = 'none';
    document.getElementById("producto_id").value = cp;
	document.getElementById("campo").value = productCode;
	}

	document.getElementById("lista").addEventListener("mouseover", function(event) {
    if (event.target && event.target.nodeName === "LI") {
        event.target.style.backgroundColor = "yellow";
    }
		});

		document.getElementById("lista").addEventListener("mouseout", function(event) {
			if (event.target && event.target.nodeName === "LI") {
				event.target.style.backgroundColor = "";
			}
		});

  </script>
</body>
<?php include('footer.php');?>
</html>