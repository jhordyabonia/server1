<?php
	echo "<PRE>";
	print_r($_GET);
	echo "</PRE>";
?>
<center>
<img style="cursor: pointer;" src="http://www.colocarcourier.com/wp-content/uploads/2017/08/Logo-Colocar.png">
<br>  
<h1>Información de pago</h1>
<p align="justify">
	Acontinuación se detallan los datos de la tranferencia;
	por favor guarde esta informacion para futuros reclamos.
</p>
<table width="400" border="1">
	<tbody><tr>
		<td><div align="right">Numero de guía</div></td>
		<td><div align="right" id="referenceCode"></div></td>
	</tr>
	<tr>
	</tr><tr>
		<td><div align="right">Monto pagado</div></td>
		<td><div align="right" id="TX_VALUE"></div></td>
	</tr>
	<tr>
		<td><div align="right">Id de transación</div></td>
		<td><div align="right" id="transactionId"></div></td>
	</tr>
	<tr>
		<td><div align="right">Metodo de pago</div></td>
		<td><div align="right" id="lapPaymentMethod"></div></td>
	</tr>
	</tbody>
	</table>
<br>
	<a href="http://www.colocarcourier.com">Regresar a la pagina principal</a>
</center>

<script type="text/javascript">
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
function set(id,field)
{document.getElementById(id).innerHTML=field;}

window.onload=function(e)
{
	set('referenceCode',getParameterByName('referenceCode'));
	set('TX_VALUE',"$"+getParameterByName('TX_VALUE'));
	set('transactionId',getParameterByName('transactionId'));
	set('lapPaymentMethod',getParameterByName('lapPaymentMethod'));
}
</script>