
<body style="padding-top: 8px;">
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="row"  style="box-shadow: 0px 3px 10px rgba(153, 153, 153, 0.41);">
  <div class="col-md-4">
  <a href="<?=base_url()?>">
    <img src="<?=base_url()?>assets/img/logo0.png" class="logo"/>
  </a>
  </div>
  <div class="col-md-6">
    <div class="row">
	   <div class="col-lg-12 col-md-12">
	      <a href="">
		      <span class="col-xs-3">
           <span class="l elipse">
	              <span class="fa fa-dollar transparent" ></span>   
	              Cobrar         
		      </span>
		      </span>
		      </a>
	      <a href="<?=base_url()?>seller/dudas">
		      <span class="col-xs-3">
           <span class="l elipse">
		               <span class="fa fa-question transparent" ></span>   
		              Dudas         
		      </span>
		      </span>
		      </a>
	      <a href="<?=base_url()?>seller/tablero_usuario">
		      <span class="col-xs-3">
           <span class="l">
		               <span class="fa  fa-keyboard-o transparent" ></span>   
		              Inicio         
		      </span>
		      </span>
		      </a>
	      <a href="<?=base_url()?>seller/logout">
		      <span class="col-xs-3">
           <span class="l elipse">
		               <span class="fa fa-close transparent" ></span>   
		              Salir         
		      </span>
		      </span>
	      </a>
      </div>
   </div><!--row-->
    <div class="row">
      <div class="col-md-12 col-xs-12 col-lg-12 " style="color: red;"><?=$err?></div>
    </div>
 </div> 
  <div class="col-md-2">
      <span class="col-xs-12">
           <span class="l">
	           <span class="fa fa-user transparent" ></span>   
	          	<?=$user?>        
	      </span>
      </span>
  </div>
</div>
<br>
<br>
<br>
<div align="center" class="row"><h2>Anuncios</h2></div>
<br>
<br>
<?php if($num<0):?>	

 <div class="modal fade" id="Cargando" tabindex="-1" role="dialog" aria-hidden="true">
 <div onclcik="ft();">
    <div class="modal-dialog  modal-sm" style="background-color: white;">
      <div class="modal-header encabezado">
        <button id="ccaragando" type="button" class="close" data-dismiss="modal">
         </button>
        <h4 class="modal-title text-center titulo_popup">
        <i class="fa fa-money"></i>Cargando... por favor espera.</h4>
    </div>             
  </div>
 </div>
 </div>

 <div data-toggle="modal" id="lcargando" data-target="#Cargando"></div>
 <script type="text/javascript">  
 function ft()
 {document.getElementById('lcargando').click();}
 ft();
 </script>

<div style="padding:55px;">
<div class="row">
	 <div id="main" class="col-md-12 col-lg-12">
	 	<?php foreach ($anuncios as $key => $anuncio):?>
	 		<?php $_url=base_url()."seller/anuncio/".$id."/".$anuncio->id;?>
	 		<div class="row" style="border-bottom: solid 1px gray;margin-bottom: 100px;">
		 		<div id="main" class="col-md-6 col-lg-6">
		 			<div class="col-lg-12 col-md-12">
		 			<h3 class="elipse">
				 		<a  target="black" href="<?=$anuncio->url?>">
				 		<b><?=$anuncio->nombre?></b>
				 		</a>
				 	</h3>
			 		<iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 450px; margin: 0px; border-style: none; left: 0px; visibility: visible;" tabindex="0" vspace="0" width="100%" src="<?=$anuncio->url?>"></iframe>			 		
				 	<p class="hidden-xs">
				 		<a >
				 		<span class="btn-copy">
				 			<i class="fa fa-files-o" aria-hidden="true"></i>
				 		</span>
				 		<input  size="60" value="<?=$_url?>" style="margin:5px;padding: 5px; border-radius: 3px;">
				 		</a>
			 		</p>
			 		</div>
		 		</div>
		 		<div class="col-lg-2 col-md-2 col-xs-12">
		 		<h3 class="titulos col-lg-12 col-md-12"><i class="fa fa-info-circle"></i>Inf.. </h3>
			 		<div class="col-lg-12 col-md-12"><i class="fa fa-dollar"></i><b>Venta</b></div>
			 		<div class="col-lg-12 col-md-12">$<?=$anuncio->venta?></div>
			 		<div class="col-lg-12 col-md-12"><i class="fa fa-money"></i><b>Comision</b></div>
			 		<div class="col-lg-12 col-md-12"><?=$anuncio->comision?>%</div>
				</div>
		 		<div class="col-lg-4 col-md-4 col-xs-12">
				        <h3 class="titulos col-lg-12 col-md-12">Compartir <i class="fa  fa-users"></i></h3>
				            <div class="col-lg-12 col-md-12 col-xs-12 step">

<div class="fb-share-button" data-href="<?=$_url?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.proveedor.com.co%2F&amp;src=sdkpreparse"><i class="fa fa-facebook fa-fw"></i></a></div>
				            </div>
				           
				            <div class="col-lg-12 col-md-12 col-xs-12 step">
				            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$_url?>" data-via="" data-size="large" data-dnt="true">Tweet</a> 
							
				            </div>
				            <div class="col-lg-12 col-md-12 col-xs-12 step">
				               <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-url="<?=$_url?>" data-counter="right"></script>
				            </div>
				            <div class="visible-xs col-xs-12 step">
				                <a href="whatsapp://send?text= <?=$_url?>" data-action="share/whatsapp/share" style="color: green;">
				                <i class="fa fa-whatsapp fa-fw"></i>
				                </a>
				            </div>
				            <div class="col-lg-12 col-md-12 col-xs-12 step">
				                <a href="mailto:?subject='Esto puede interesarte..'&body='<?=$_url?>'">
				                    <i class="fa fa-envelope fa-fw"></i>Compartir
				                </a>
				            </div>
				             <div class="col-lg-12 col-md-12 col-xs-12 step">
						 <!-- Inserta esta etiqueta en la sección "head" o justo antes de la etiqueta "body" de cierre. -->
							<script src="https://apis.google.com/js/platform.js" async defer data-href="<?=$_url?>/3">
								  {lang: 'es'}
								</script>

								<!-- Inserta esta etiqueta donde quieras que aparezca Botón Compartir. -->
								<div data-href="<?=$_url?>" class="g-plus" data-action="share" data-height="24"></div>
				            </div>
				    </div>			 		
		 		</div>
		 	</div>
		<?php endforeach;?>	
	 </div>
</div>
</div>
<script type="text/javascript">  
  window.onload=function(){document.getElementById('ccaragando').click();}
 </script>
<?php else:?>
<div align="center" class="row" style="padding:5%;">
 <div class="col-md-12 col-xs-12 col-lg-12" "> 
 <h3>Para activar los anuncios, pulsa el botón ACTIVAR, hasta que su marcador muestre cero.</h3>
 <p><i style="color:whitesmoke;">Este proceso se llevará a cabo solo una vez, por semana, por ip de conexión</i></p>
		<form method="post" action="<?=base_url()?>seller/activar">
		 <input type="hidden" name="activador" value="<?=$activar?>">
		   <a target="black" id="ls" href="<?=$activar?>" ></a>
		   <button type="submit" onclick="document.getElementById('ls').click();" class="btn btn-primary btn_acceder">
		   <big>ACTIVAR <?=$num+1?></big>
		   </button>
		</form>
 </div>
</div>
<?php endif;?>