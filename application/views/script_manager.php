
<body style="padding-top: 2px;">
<div class="row"  style="box-shadow: 0px 3px 10px rgba(153, 153, 153, 0.41);">
  <div class="col-md-4 col-xs-4">
  <a href="<?=base_url()?>">
    <img src="<?=base_url()?>assets/img/logo0.png" class="logo"/>
  </a>
  </div>
 <div class="col-xs-6 visible-xs">
      <span class="col-xs-12">
           <span class="l">
	           <span class="fa fa-user transparent" ></span>             
           		<?=$user?>         
	      </span>
      </span>
  </div>  
  <div class="col-md-6 col-xs-12">
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
	      <a href="<?=base_url()?>seller/anuncios">
		      <span class="col-xs-3">
           <span class="l elipse">
		               <span class="fa fa-globe transparent" ></span>   
		              Anuncios         
		      </span>
		      </span>
		      </a>
	      <a href="<?=base_url()?>seller/logout">
		      <span class="col-xs-3 elipse">
           <span class="l">
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
  <div class="col-md-2 hidden-xs">
      <span class="col-xs-12">
           <span class="l">
	           <span class="fa fa-user transparent" ></span>   
	           <?=$this->session->userdata('nombres')." ".$this->session->userdata('apellidos')?>         
	      </span>
      </span>
  </div>
</div>

<div style="padding: 0 55px 55px 55px;">
<div class="row">
	<div class="col-lg-3 col-md-3">
		<h2 class="title">Mis Anuncios </h2>
		<span class="btn" onclck="locatio.href='<?=base_url()?>/maker/a/form_maker';">Reclama tu bono de $1000,para finaciar la momision de tu primer anuncio.</span>
	</div>
	<div class="col-lg-9" align="center">
		<span id="state_bar" style="
	    background-color: greenyellow;
	    opacity: 0.67;
	    padding: 0% 2% 0% 2%;
	    border: solid 1px #a0e29f;
	    font-weight: 600;
	    display:none;
	"></span>
		<span style="float:right; margin-top: 2%;" class="btn btn-primary" onclick="location.href='<?=base_url()?>/maker/a/form_maker';">Nuevo</span>

		
	</div>
</div>
	<div class="row">
		 <div id="main" class="col-md-12 col-lg-12" style="border: solid 1px whitesmoke;min-height: 250px;padding: 2%;margin: 2%; ">
			 <div class="col-lg-2">
				 <div class="elipse step" ><b>Nombre Anuncio</b></div>
				 <div class="elipse step" ><b>Inventario</b></div>
				 <div class="elipse step" ><b>Aciones</b></div>
		 	</div>
		 	<div class="col-lg-10">
			 	<div  data-mcs-theme="dark" style="display: inline-block;width:100%;overflow-x:scroll;min-height: 250px;max-height: 400px; ">
			 	<table>	
			 	<tr> 	
			 	<?php if($scripts!=null): ?>
				 	<?php foreach($scripts as $d):?>
				 		<td style="min-width:200px;border-left: solid 1px; ">
						 <div  align="center" class="elipse step" ><?=$d->nombre?></div>
						 <div align="center" class="elipse step" >
						 <input height="2" value="1" type="number" name="inventario"/>
							<button  class=" btn btn-sm blue">
							<a style="color:black;" target="black" href='<?=base_url()?>maker/s/<?=$d->id?>'>Activar</a>
							</button>
						 </div>
						 <div align="center" class="btn step" >
						 <a style="color:black;" target="black" href='<?=base_url()?>maker/a/<?=$d->id?>'>Ver</a></div>
						 <div align="center" class="btn step" onclick="action('d','<?=$d->id?>',this)">Eliminar</div>
						 <div align="center" class=" btn step">
						 <a style="color:black;" target="black" href='<?=base_url()?>maker/e/<?=$d->id?>'>Editar</a>
						 </div>						 
					<?php endforeach;?>					
			 	<?php else:?>			 		
				 		<td style="min-width:200px;padding: 15% 10% 0% 0%;">						 
						 <h1>No tines Anuncios.</h1>
				<?php endif;?>
				<tr>
				</table>
			 	</div>
		 	</div>
		</div>
	</div>

<script type="text/javascript">
	window.onload=function(){};

    function action(a,id,obj)
   {
        var popup=new XMLHttpRequest();
        var url_popup="<?=base_url()?>maker/"+a+"/"+id;

        popup.open("GET", url_popup, true);
        popup.addEventListener('load',show,false);
        popup.send(null);

        function show()
        {
            cotizar=document.getElementById('state_bar');
            cotizar.innerHTML=popup.response;            
            cotizar.style.display='';
            if(popup.response.indexOf('OK')!=-1)
            	obj.parentElement.remove();
        }
    }
    function close()
    {
            cotizar=document.getElementById('state_bar');
            cotizar.style.display='none';
     }
</script>
</body>