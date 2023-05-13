<html>
<head>
<title>
POS
</title>

<?php 
require_once('auth.php');
?>
<!-- DATATABLES -->
  <link rel="stylesheet" href="vendors/datatables/css/jquery.dataTables.min.css"> 
 <link href="css/bootstrap.css" rel="stylesheet">
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

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
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

<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>


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

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Inicio </a></li> 
			<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<li class="active"><a href="products.php"><i class="icon-list-alt icon-2x"></i>Materiales</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i>Agregar Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Proveedores</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Reporte ventas</a>                </li>
			<li><a href="corriente.php"><i class="icon-bar-chart icon-2x"></i>Cuentas Corriente</a>                </li>


			<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>             
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-table"></i> Productos
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Inico</a></li> /
			<li class="active">Productos</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Atras</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products where qty < 10 ORDER BY product_id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();

			?>
				<div style="text-align:center;">
			Total Cantidad de Materiales:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
			
</div>
<a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Agregar Materiales</button></a>

<!--<a  href="addporcen.php" rel="facebox"> <Button id="btnObtener" type="submit"  class="btn btn-primary" style="float:right; width:230px; height:35px;background: green;" /><i class="icon-plus-sign icon-large"></i> Aumentar por porcentaje</button></a> -->
<div>
	
</div>
<br><br>
<br><br>

        <div class="container py-4 text-center">
            <h2>Productos</h2>

            <div class="row g-4">

                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                </div>

                <div class="col-auto">
                    <select name="num_registros" id="num_registros" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">registros </label>
                </div>

                <div class="col-5"></div>

                <div class="col-auto">
                    <label for="campo" class="col-form-label">Buscar: </label>
                </div>
                <div class="col-auto">
                    <input type="text" name="campo" id="campo" class="form-control">
                </div>
            </div>

            <div class="row py-4">
                <div class="col">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <th class="sort asc">Num. empleado</th>
                            <th class="sort asc">Nombre</th>
                            <th class="sort asc">Apellido</th>
                          
                            <th></th>
                            <th></th>
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label id="lbl-total"></label>
                </div>

                <div class="col-6" id="nav-paginacion"></div>

                <input type="hidden" id="pagina" value="1">
                <input type="hidden" id="orderCol" value="0">
                <input type="hidden" id="orderType" value="asc">
            </div>
        </div>
    

    <script>


/* Llamando a la función getData() */
getData();

/* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData */
document.getElementById("campo").addEventListener("keyup", function() {
    getData();
}, false);
document.getElementById("num_registros").addEventListener("change", function() {
    getData();
}, false);

/* Peticion AJAX */
function getData() {
    let input = document.getElementById("campo").value;
    let num_registros = document.getElementById("num_registros").value;
    let content = document.getElementById("content");
    let pagina = document.getElementById("pagina").value;
    let orderCol = document.getElementById("orderCol").value;
    let orderType = document.getElementById("orderType").value;

    if (pagina == null) {
        pagina = 1;
    }

    let url = "buscar.php";
    let formaData = new FormData();
    formaData.append('campo', input);
    formaData.append('registros', num_registros);
    formaData.append('pagina', pagina);
    formaData.append('orderCol', orderCol);
    formaData.append('orderType', orderType);

    fetch(url, {
        method: "POST",
        body: formaData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data.data;
        document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
            ' de ' + data.totalRegistros + ' registros';
        document.getElementById("nav-paginacion").innerHTML = data.paginacion;

        let container = document.getElementById("content");
container.addEventListener("click", function(event) {
  if (event.target.classList.contains("rel")) {
    facebox();
  }
});
    })
    .catch(err => console.log(err));
}


function nextPage(pagina) {
    document.getElementById('pagina').value = pagina;
    getData();
}

let columns = document.getElementsByClassName("sort");
let tamanio = columns.length;
for (let i = 0; i < tamanio; i++) {
    columns[i].addEventListener("click", ordenar);
}

function ordenar(e) {
    let elemento = e.target;

    document.getElementById('orderCol').value = elemento.cellIndex;

    if (elemento.classList.contains("asc")) {
        document.getElementById("orderType").value = "asc";
        elemento.classList.remove("asc");
        elemento.classList.add("desc");
    } else {
        document.getElementById("orderType").value = "desc";
        elemento.classList.remove("desc");
        elemento.classList.add("asc");
    }

    getData();
}


    </script>

<a rel="facebox " title="Click para editar materiales" href="editproduct.php?id=1"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("¿Seguro que quieres eliminar este producto?"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteproduct.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>

<!-- JQUERY -->
    <script src="js/jquery-1.7.2.min.js">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <script type="js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
     <script src="js.jquery.dataTables.js"></script>

    <!-- datatables extension SELECT -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <script>
        $(document).ready(function () {
           var table = $('#resultTablee').DataTable({
            	 // 1 - inicializacion
            	columnDefs: [ {
				          orderable: false,
				          className: 'select-checkbox',
				          targets:   0
				      } ],

              select:true,  
              //2 - tipo de selección 
              select: {
				          style:    'multi', //'os' para seleccion unica 
				          selector: 'td:first-child'
				      },
           
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                
                lengthMenu: [ [20, 50, -1], [20, 50] ]
            });
					          $('#btnObtener').on('click', function (event) {
					   					 event.preventDefault();

					    
								    $('#resultTablee').find('input[type="hidden"]').remove();
								    var seleccionados = table.rows({ selected: true });
					    
								    if(!seleccionados.data().length){
								        $('<input>', {
								          type: 'hidden',
								          value: '',
								          name: 'ids[]'
								      }).appendTo('#resultTablee');
								        
								        $("#resultTablee").submit(); //submiteas el form
								      
								    }else{
								      seleccionados.every(
								        function(key, data){

								        $('<input>', {
								            type: 'hidden',
								            value: this.data()[1],
								            name: 'ids[]'
								        }).appendTo('#resultTablee');

					        
					        $("#resultTablee").submit(); //submiteas el form
					      }); 
					    }
					});
        });


		    </script>
		  <!-- datatables-->
		    <style>
		    table.dataTable tbody tr.selected {
		        color: white;
		        background-color: #736ff1;  /* Not working */
		    }
</style>
  <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
<?php include('footer.php');?>

</html>

