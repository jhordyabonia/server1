<?php
	//die();
    unset($out);
    $out=intval(file_get_contents("colocar.txt"));
    $fp = fopen("colocar.txt", "w+");	
    fputs($fp,$out+1); 
    fclose($fp);
        
	$ApiKey='c05Yaz0qkPKoKWmVk90PNIn5cP';#'N5aHB8YHI9w3LbvDhYnFC615Mn';
	$merchantId='703723';#'716859';
	$accountId='706797';#'721708';
    $referenceCode=$_POST['service'];
    $referenceCode.="_".$out;
    $amount=$_POST['amount'];
    echo "$ApiKey~$merchantId~$referenceCode~$amount~USD";
	$signature=md5("$ApiKey~$merchantId~$referenceCode~$amount~USD");
	#https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/
	#https://gateway.payulatam.com/ppp-web-gateway/
	$output= "				
	
	<form method='POST' style='display:none' action='https://gateway.payulatam.com/ppp-web-gateway/'>
		<div align='center'>
			<input name='usuarioId' type='hidden' value='$merchantId'>
			<input name='description' type='hidden' value='Pago flete'>
			<input name='extra1' type='hidden' value='Colocar Courier'>
			<input name='refVenta' type='hidden' value='$referenceCode'>
			<input name='valor' type='hidden' value='$amount'>
			<input name='iva' type='hidden' value='0'>
			<input name='moneda' type='hidden' value='USD'>
			<input name='baseDevolucionIva' type='hidden' value='0'>
			<input name='firma' type='hidden' value='$signature'>
			<input name='emailComprador' type='hidden' value=''>
			<input name='telephone' type='hidden' value=''>
			<input name='prueba' type='hidden' value='0'>
			<input name='url_respuesta' type='hidden' value='http://www.colocarcourier.com/?page_id=892'>
			<input name='accountId' type='hidden' value='$accountId'>						
		</div>
		<p align='center'>
			<input type='submit' id='pay_payu' name='muestra2' value='PAGAR AHORA'>
		</p>
	</form>
	
	";
	echo $output;
