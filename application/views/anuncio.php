<script type="text/javascript">
 	var ready=5;
 	window.setInterval(loader, 3*500);
	function loader ()
	{
		document.getElementById('count').innerHTML=ready;
		if(ready--<=0)
			location.href="<?=$url?>";
	}
</script>
<center>
	<img src="<?=base_url()?>assets/img/logo.png" style="padding-top: 24%;" />	
	<br>
	<span>
		Cargando... 
		<span id="count"></span>
	</span>
</center>

