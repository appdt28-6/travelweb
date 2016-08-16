<?php 
	//$event=$_GET['event'];
	$mail=$_GET['mail'];
	include('connect.php');
$query = "SELECT * FROM Clientes where email='$mail'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$id=$row['id_cliente'];
}
mysql_free_result($result);
mysql_close($link);
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
					<span class="size16px bold dark left">¡Casi Listo!</span>
					<div class="clearfix"></div>
					<div class="line4"></div>
					<div class="alert alert-info">
					<h1>Gracias, estas a solo un paso de vivir esta gran experiencia.</h1><br/>
					<p>Llena este formulario y LISTO!</p>
					<p class="size12">• No te olvides de leer nuestro <a href="javascript:popup('aviso.html',500,300)" target="_blank" class="clblue">aviso de privacidad y control de datos</a>.</p>
					</div>
					<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSffAFIamSkYFcxfNtf9CtRntjnNMhkuiY4-Xe-8FRrceJ8oEg/formResponse" width="100%" height="600px"></iframe>

                    <br/>
                    <br/>
                    <iframe src="contrato.php?event=<?php echo $event; ?>&&mail=<?php echo $mail;?>" width="100%" height="400px"></iframe>
					<br>
                    <br>
                    <form method="post" action="aceptacontrato.php?event=<?php echo $event; ?>&&id=<?php echo $id;?>">
					<input type="checkbox" name="conditions" id="conditions" /> Acepto<br/>
					<input type="submit" name="Enviar" id="button" value="Continuar" />
					</form>
                    
				</div>
		
			</div>
			<!-- END OF LEFT CONTENT -->	
          	
			
			<!-- RIGHT CONTENT -->
			
			
			
		</div>
		
		
	</div>
	<!-- END OF CONTENT -->
	

	<?php include('footer2.php');?>
	
	
	
	<?php include('js.php');?>
<script type="text/javascript">
$(document).ready(function(){
	$('#button').click(function(){	
		if($('input[name=conditions]').is(':checked')){
			alert('Gracias por tu preferencia.');
			document.form.submit(); 
			return true;
		}
		else{
			alert('No has aceptado el contrato');
			return false;
		}
	});
});
</script>
  </body>
</html>
