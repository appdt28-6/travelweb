<?php 
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$apError = null;
		$amError = null;
		//$edadError = null;
		//$calleError = null;
		//$numeroError = null;
		//$coloniaError = null;
		//$munError = null;
		//$cpError = null;
		//$estadoError = null;
		//$telError = null;
		$celError = null;
		$emailError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$ap = $_POST['ap'];
		$am = $_POST['am'];
		$edad ="";
		$fn="";
		$gen = "";
		$calle = "";
		$numero = "";
		$col = "";
		$mun = "";
		$cp="";
		$estado = "";
		$tel = "";
		$cel = $_POST['cel'];
		$email = $_POST['email'];
		$evento="";
		$coord="0";
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($ap)) {
			$apError = 'Please enter Apellido';
			$valid = false;
		}
		if (empty($am)) {
			$amError = 'Please enter Apellido';
			$valid = false;
		}
		if (empty($cel)) {
			$celError = 'Please enter Num. Celular';
			$valid = false;
		}
		
		else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email';
			$valid = false;
		}
			
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Clientes (nombre,ap,am,fn,edad,gen,calle,numero,col,mun,cp,estado,tel,cel,email,id_coord,id_evento) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$ap,$am,$fn,$edad,$gen,$calle,$numero,$col,$mun,$cp,$estado,$tel,$cel,$email,$coord,$evento));
			/*if ($q->execute(array($name,$ap,$am,$edad,$gen,$calle,$numero,$col,$mun,$estado,$tel,$cel,$email,$coord,$evento))) { 
   			$exito="Registro exitoso";	
			} else {
   			$exito="Error";	
			}*/
			Database::disconnect();
			/////////Correo
			$destinatario = $email; 
			$asunto = "¡Bienvenidos!"; 
			$cuerpo = ' 
			<html> 
			<head> 
			   <title>Bienvenidos!</title> 
			</head> 
			<body> 
			
			<h1>¡Bienvenido!</h1>
<p align="justify">
Has tomado la mejor decisión en escogernos como tu agencia de viajes. Mástravel sabe perfectamente lo que se necesita para que vivas la mejor experiencia de tu vida viajando con nosotros. A partir de este momento, nos convertimos en tus cómplices de viaje acompañándote a los mejores lugares y fiestas del destino que seleccionaste.
</p>
<p align="justify">
Tenemos un compromiso contigo de lograr superar tus expectativas con nuestro servicio de calidad, dada nuestra experiencia en turismo y entretenimiento.
</p>
<p align="justify">
Para facilitarte el proceso y que estés enterado de todo, creamos un sistema donde encontrarás toda la información necesaria para tu viaje
</p><br>
<p align="justify">Para poder accesar, tu usuario es:'.$email.' <br>
			Y tu contraseña es: '.$cel.' </p>
			<br>
<p align="justify">Esta contraseña la podrás cambiar una vez que entres al portal, sin embargo te pedimos siempre conserves esta en un lugar seguro. </p><br>
<p align="justify">Esperamos que disfrutes al máximo de tu viaje, ya que será único e inolvidable, ayúdanos para que podamos servirte mejor no excediéndote en el consumo de alcohol durante todo tu viaje y guardando respeto para todos tus compañeros y demás huéspedes del hotel.</p><br>

<p align="justify">Queremos informarte que para nosotros es un honor tenerte ahora como uno de nuestros clientes y por lo tanto, queremos darte la siguiente información importante:</p><br>
			
<h3>Pagos</h3>

<p align="justify">Para tu comodidad, el pago de tu apartado o anticipo debes realizarlo en efectivo con tu coordinador de viaje directamente en tú preparatoria o universidad por la cantidad de $500 o $1000 pesos dependiendo el viaje al cual te inscribiste, recuerda que debes llevar impreso tu ANEXO I que podrás encontrar en la pestaña de ANEXO I en tu panel de la página. Ese mismo día, llegará a tu correo electrónico un comprobante de pago en efectivo.</p>

Todos los pagos siguientes debes realizarlos por depósito bancario a la siguiente cuenta:<br>

Cuenta Coordinador General Zona Centro
<br>
Banco: Santander

No. De Cuenta: 60575408831
<br>
CLABE para transferencia:

014680605754088312
<br>
Nombre:

Sergio Alejandro Hernández Austria

<p align="justify">En tu contrato se establece las fechas límites de pago de tus quincenas, por lo que en cualquier momento puedes realizar tu pago días antes a la fecha límite.</p>
<br>
<p align="justify">Una vez realizado tu pago, debes ingresar a la página con tus datos de acceso, ingresar a la pestaña “Registrar Pago” y seguir las instrucciones en pantalla. Tienes hasta las 23:59 horas para registrar tu pago el mismo día que lo realizaste, de lo contrario, deberás pagar la cantidad establecida en el Anexo I por concepto de Pago Tardío.</p>
<br>
<p align="justify">El último día para liquidar tu viaje es el 10 DE JUNIO DE 2016, para el caso de que por algún motivo no pudieras realizar el pago, deberás pagar la cantidad de $ 1,000.00 (MIL PESOS) por concepto de penalización y tendrás dos días naturales para hacerlo, quedando sujeto a aumento de tarifas y revisión de disponibilidad en espacios en caso de confirmarse la reservación.</p>
<br>
<h3>Seguro AXA</h3>

Deberás enviar la siguiente documentación vía correo electrónico, escaneada, máximo EL DÍA 10 DE JUNIO DE 2016 al correo hola@mastravel.mx, el asunto del correo deberá decir DOCUMENTOSAXA_NombreCompleto
<br>
<ul>
<li>Acta de nacimiento</li>

<li>Comprobante de Domicilio no mayor a 3 meses</li>

<li>Identificación Oficial</li>
</ul>

<p align="justify">Todos los documentos completos en un mismo correo en formato .jpg como ARCHIVOS ADJUNTOS SEPARADOS y no como contenido del correo, con resolución mínima de 200 pps, si no envías la documentación no podremos tramitar tu seguro con AXA.</p>

Los nombres de tus archivos deben ser los siguientes:
<br>
Acta_NombreCompleto
<br>
Domicilio_NombreCompleto
<br>
ID_NombreCompleto
<br>
<h3>Hotel Plaza Pelicanos</h3>

<p align="justify">Debes mostrar que eres un estudiante de bachillerato o carrera profesional, y no romper las políticas del hotel en cuanto a orden y seguridad se refieren ya que de no hacerlo el hotel tomará medidas drásticas cancelando automáticamente todos tus servicios incluyendo el hospedaje sin derecho a reembolso.</p>

Horarios de entrada y salida:<br>

El programa todo incluido inicia a las 12:00 horas del día de llegada (entrega de brazaletes) y finaliza a las 11:00 horas del día de salida.
<br>
La hora de salida del Hotel es a las 11:00 horas (entrega de habitaciones y brazaletes).

Incluye:<br>
<ul>

<li>Desayuno (07:00 - 11:30 horas), Comida (13:00 - 17:00 horas) y Cena (18:00 - 23:00 horas) tipo buffet en el restaurante "El Huerto"</li>

<li>Cena a la carta en nuestros restaurantes de especialidades "Carusso" (Italiano) y "Temaki" (Oriental) de 18:00 - 22:00 horas. Se requiere previa reservación con el Staff de Mástravel **Una cena por estancia de 1 a 3 noches**</li>

<li>Snacks de 12:00 - 18:00 horas</li>

<li>Snacks de media noche de 23:00 - 01:00 horas</li>

<li>Bebidas nacionales ilimitadas de 10:00 - 01:00 horas</li>

<li>Alberca climatizada con pool bar y chapoteadero</li>

<li>Club de playa con camas pérgola, alberca con pool bar, snacks y servicio de meseros</li>

<li>Karaoke Bar de 22:45 - 01:00 horas (domingos de 21:00 - 22:30 horas)</li>

<li>Sport Bar</li>

<li>Actividades en playa y alberca</li>

<li>Entretenimiento nocturno (sujeto a condiciones climatológicas)</li>

<li>Deportes acuáticos no motorizados</li>

<li>Cancha de tenis</li>

<li>Room service con desayuno continental de 07:00 - 09:00 horas (previa solicitud un día antes)</li>

<li>Habitación con vista jardín, calle o alberca, TV con cable, aire acondicionado, caja de seguridad, baño equipado con tina y ducha de mármol, amenidades como botellas de agua, shampoo, crema y toalla facial.</li>

<li>De haber habitaciones vacías y limpias a la llegada del grupo, se asignarán de inmediato; de lo contrario se entregarán en el horario oficial.</li>

<li>A cada uno de los participantes del grupo se le abrirá una cuenta, en la cual serán cargados los consumos individuales que no estén especificados en el programa todo incluido, como lo son: lavandería, llamadas telefónicas locales y larga distancia, internet, etc. que serán liquidados antes de su salida.</li>

<li>El día de salida los botones podrán guardar el equipaje hasta que lo requieras.</li>
</ul>
<h3>Habitaciones</h3>

<p align="justify">El registro de habitaciones puedes realizarlo en la pestaña de habitaciones una vez que hayas liquidado tu viaje. Favor de respetar el acomodo que tiene el hotel y si requieres algún cambio será después del registro, al llegar al hotel.</p>

(Las personas registradas en cada habitación son las responsables de la misma)
<br>
CUALQUIER SITUACIÓN QUE NO TE PAREZCA CON EL PERSONAL DEL HOTEL, ANTRO, BARCO, ETC, AVISA AL STAFF Mástravel Y NOSOTROS AYUDAREMOS A RESOLVERLO.
<br>
<br>
<h3>CÓDIGO DE VESTIMENTA OBLIGATORIO</h3>
<br>
<b>Mandala Mardi Gras</b> (Casual): Prepara tu ropa más colorida, ¡estilo libre!
<br>
<ul>
<li><b>Hombres:</b> Camisa / Playera – Zapatos / Tennis (no deportivos) – Pantalón de Vestir / Mezclilla</li>
<li><b>Mujeres:</b> Vestido – Blusa – Falda – Short – Zapatillas – Sandalias</li>
</ul>
<br>
<b>La Santa White Party</b> (Semi-Formal): Solo prendas de vestir color blanco (toda la vestimenta de color blanco a excepción del calzado que podrá ser de cualquier color para hombres o para mujeres)
<br>
<ul>
<li>Hombres: Camisa – Zapatos – Pantalón blanco de Mezclilla, lino, etc.</li>
<li>Mujeres: Vestido – Blusa – Falda – Short – Zapatillas</li>
</ul>
<br>
<b>Xtine Garden Glow PARTY</b> (Semi-Formal): Solo prendas de vestir color fluorescente (toda la vestimenta de color fluorescente a excepción del calzado que podrá ser de cualquier color para hombres o para mujeres) *Mástravel recomienda zapatos de color que combinen con tu outfit
<br>
<ul>
<li>Hombres: Camisa – Zapatos – Pantalón de Vestir</li>
<li>Mujeres: Vestido – Blusa – Falda – Short – Zapatillas</li>
</ul>
<br>
<b>La Vaquita Traffic Light Party</b> (Casual): Solo prendas de vestir de los siguientes colores: Verde = Disponible; Amarillo = Tal vez; Rojo = Ni lo intentes (Mástravel recomienda la parte inferior de color blanco y la superior del color de tu elección)
<br>
<ul>
<li>Hombres: Camisa / Playera – Zapatos / Tennis (no deportivos) – Pantalón de Vestir / Mezclilla</li>
<li>Mujeres: Vestido – Blusa – Falda – Short – Zapatillas – Sandalias</li>
</ul>
<br>
<b>Rock The Boat</b> (Casual): ¡Estilo libre! (Mástravel recomienda ropa de playa, traje de baño, bikini, pareo, short, bermuda, playera sin mangas, etc.
<br>
<p>Cualquier duda recuerda que estamos a tus órdenes.</p>
<br>
<h3>Equipo de Mástravel.</h3>
			</body> 
			</html> 
			'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=UTF-8\r\n"; 

			//dirección del remitente 
			$headers .= "From: Mástravel México <hola@mastravel.mx>\r\n"; 

			//dirección de respuesta, si queremos que sea distinta que la del remitente 
			//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

			//ruta del mensaje desde origen a destino 
			//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

			//direcciones que recibián copia 
			//$headers .= "Cc: is_mike@outlook.com\r\n"; 

			//direcciones que recibirán copia oculta 
			//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

			mail($destinatario,utf8_encode($asunto),$cuerpo,$headers); 

			//////////////
			header("Location: confirmedgoogle.php?mail=".$email." ");
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
<?php include('head.php'); ?>
</head>
  <body id="top" class="thebg" >
    <?php include('menu.php'); ?>
	
	
	<div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="#"></a>
			<div class="left">
				<ul class="bcrumbs">
                
                <li>/</li>
					<li><a href="evento.php?event=<?php echo $event;  ?>">Evento</a></li>
                    <li>/</li>
					<li><a href="#">Registro</a></li>
				</ul>				
			</div>
			<a class="backbtn right" href="#"></a>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-8 pagecontainer2 offset-0">

				<div class="padding30 grey">
					<span class="size16px bold dark left">Datos Personales</span>
					<div class="roundstep active right">1</div>
					<div class="clearfix"></div>
					<div class="line4"></div>
                    <?php //echo ":::Aviso de registro con exito:::";?>
                    <br/>
					<form action="registrocon.php" method="post">
                    
					<div class="col-md-4 textright">
						<!--<div class="margtop15"><span class="dark">Nombre Completo:</span><span class="red">*</span></div>-->
					</div>
					<div class="col-md-4" <?php echo !empty($nameError)?'error':'';?>>
					   <span class="size16">Nombre(s)*</span>
					      	<input name="name" type="text" class="form-control"  placeholder="" value="<?php echo !empty($name)?$name:'';?>">
					      	
					  </div>
					<div class="col-md-4 textleft margtop15">
                    <?php if (!empty($nameError)): ?>
					      		<span style="color:#F00"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					<br/>
                    <div class="col-md-4 textright">
						<!--<div class="margtop15"><span class="dark">Apellidos:</span><span class="red">*</span></div>-->
					</div>
					<div class="col-md-4" <?php echo !empty($nameError)?'error':'';?>>
						<span class="size16">Apellido Paterno*</span>
						<input type="text" name="ap" class="form-control " placeholder="" value="<?php echo !empty($ap)?$ap:'';?>">
					</div>
					<div class="col-md-4 textleft margtop15">
                     <?php if (!empty($apError)): ?>
					      		<span style="color:#F00"><?php echo $apError;?></span>
					      	<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					<br/>
                    <div class="col-md-4 textright">
						<!--<div class="margtop15"><span class="dark">Apellidos:</span><span class="red">*</span></div>-->
					</div>
					<div class="col-md-4" <?php echo !empty($amError)?'error':'';?>>
						<span class="size16">Apellido Materno*</span>
						<input type="text" name="am" class="form-control " placeholder="" value="<?php echo !empty($am)?$am:'';?>">
					</div>
					<div class="col-md-4 textleft margtop15">
                     <?php if (!empty($amError)): ?>
					      		<span style="color:#F00"><?php echo $amError;?></span>
					      	<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					<br/>
					<div class="col-md-4 textright">
						<!--<div class="margtop7"><span class="dark">Teléfonos:</span><span class="red">*</span></div>-->
					</div>
					<div class="col-md-4 textleft" <?php echo !empty($celError)?'error':'';?>>
						<span class="size16">Celular*</span><br>
						Lada:<input type="text" placeholder="" id="lada" name="lada" maxlength="4" class="form-control" value="+521" size="4">	
						<input type="text" placeholder="" id="cel" name="cel" maxlength="10" class="form-control" value="<?php echo !empty($cel)?$cel:'';?>">	
                         <?php if (!empty($celError)): ?>
					      		<span style="color:#F00"><?php echo $celError;?></span>
					      	<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					<br/>
                   	<br/>
					<span class="size16px bold dark left">Datos de usuario</span>
					<div class="roundstep right">3</div>
					<div class="clearfix"></div>
					<div class="line4"></div>	
                    Por último,ingresa tu emial para recibir los datos de acceso<br/> 
					<div class="col-md-4 textright">
						<div class="mt15"><span class="dark">Email:</span><span class="red">*</span></div>
					</div>
					<div class="col-md-4" <?php echo !empty($emailError)?'error':'';?>>
					<input type="text" name="email" class="form-control margtop10" placeholder="" value="<?php echo !empty($email)?$email:'';?>">
					</div>
					<div class="col-md-4 textleft">
                      <?php if (!empty($emailError)): ?>
					      		<span style="color:#F00"><?php echo $emailError;?></span>
					      	<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					<br/>
                   <!-- <div class="col-md-4 textright">
						<div class="mt15"><span class="dark">¿Quien es tu Coordinador?</span><span class="red">*</span></div>
					</div>
					<div class="col-md-4">
                    <select name="coord" id="coord" class="form-control mySelectBoxClass">
					<?php 
					include('connect.php');
					$query="SELECT * FROM coordinador";
					$link=mysql_connect($server,$dbuser,$dbpass);
					$result=mysql_db_query($database,$query,$link);
					while($row = mysql_fetch_array($result))
					{
						 echo '<option value='.$row['id_coord'].'>'.utf8_encode($row['nombre']).'</option>';
					}
							 mysql_free_result($result);
					mysql_close($link);   
					?>
                    </select>
					</div>
					<div class="col-md-4 textleft">
					</div>-->
					<div class="clearfix"></div>
					<br/>
                    
					<br/>
					<!--<span class="size16px bold dark left">Review and book your trip</span>-->
					<div class="roundstep right">4</div>
					<div class="clearfix"></div>
					<div class="line4"></div>		
					
					<div class="alert alert-info">
					Información importante:<br/>
					<p class="size12">• Te invitamos a revisar nuestro <a href="javascript:popup('aviso.html',500,300)" class="clblue">aviso de privacidad y control de datos</a>.</p>
					</div>
                      <input id="conditions" name="conditions" type="checkbox"> Acepto los <a href="javascript:popup('aviso.html',500,300)" class="clblue">términos y condiciones</a><br/>		
					
					<button type="submit" id="button" class="bluebtn margtop20">Registrarme</button>	
					
				</form>	
				</div>
		
			</div>
			<!-- END OF LEFT CONTENT -->	
          	
			
			<!--info congreso-->
			
			
		</div>
		
		
	</div>
	<!-- END OF CONTENT -->
	

	<?php include('footer2.php');?>
	
	
	
	<?php include('js.php');?>
<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "mastravel.mx", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=yes,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script>
<script>
$('#cel').mask('999-9999999')

addEvent(document.getElementById('tel'),'keyup',validate);
addEvent(document.getElementById('cel'),'keyup',validate);
addEvent(document.getElementById('cp'),'keyup',validate);

function validate(event){
    
    var str=this.value;
    
    var charsAllowed="0123456789";
    var allowed;
    
    for(var i=0;i<this.value.length;i++){
        
        allowed=false;
        
        for(var j=0;j<charsAllowed.length;j++){
            if( this.value.charAt(i)==charsAllowed.charAt(j) ){ allowed=true; }
        }
        
        if(allowed==false){ this.value = this.value.replace(this.value.charAt(i),""); i--; }
    }
    
    return true;
}



function addEvent(obj,type,fn) {
 
    if (obj.addEventListener) {
        obj.addEventListener(type,fn,false);
        return true;
    } else if (obj.attachEvent) {
        obj['e'+type+fn] = fn;
        obj[type+fn] = function() { obj['e'+type+fn]( window.event );}
        var r = obj.attachEvent('on'+type, obj[type+fn]);
        return r;
    } else {
        obj['on'+type] = fn;
        return true;
    }
}

</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#button').click(function(){	
		if($('input[name=conditions]').is(':checked')){
			alert('Gracias por tu preferencia.');
			document.form.submit(); 
			return true;
		}
		else{
			alert('No has aceptado las condiciones');
			return false;
		}
	});
});
</script>
  </body>
</html>
