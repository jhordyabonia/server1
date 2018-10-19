
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
	<div class="col-lg-12 col-md-12">
		<h2>Ganancias actuales</h2>
		<h1 style=" color:green; font-size: 60px;">
		<span class="fa fa-dollar"></span>
			<span id="earn" ></span>	
		</h1>
	</div>
</div>
<div class="row">
	 <div id="main" class="col-md-12 col-lg-12" style="border: solid 1px black; height: 400px;overflow-y: scroll;">
	 	<?php $earn=0; if($clicks): foreach ($clicks as $key => $click):?>
	 		<?php if($key%10==0):?> 			
	 		<div class="row" style="border-bottom: solid 1px gray;padding:2px;"><b>
		 		<?php foreach($click as $key2 => $item):?>
		 			<?php if($key2=="id"){continue;}?>
		 			<div  align= "center" class="col-md-2 col-lg-2" style="padding:2px;""><?=$key2?></div>
				 <?php endforeach;?>
			</b></div>
			<?php endif;?>			
	 		<div class="row" style="border-bottom: solid 1px lightgray;margin: 1px;">
	 		<?php foreach($click as $key2 => $item):?>
	 			<?php if($key2=="id"){continue;}else if($key2=="rate"){ $earn+=$item; ?>
	 			<div align= "center" class="col-md-2 col-lg-2" style="padding:2px;">$ <?=$item?></div>
	 		<?php } else  if($key2=="verificacion"){?>
	 			<div align= "center" class="col-md-2 col-lg-2" style="padding:2px;"><a href="<?=$item?>"><p class="elipse"><?=$item?></p></a></div>
	 		<?php } else {?>
	 			<div align= "center" class="col-md-2 col-lg-2" style="padding:2px;"><p class="elipse" title="<?=$item?>"><?=$item?></p></div>
	 		<?php }?>
			 <?php endforeach;?>		 
			</div>
	 	<?php endforeach; else:?>
	 	<center>
	 		<h3>
	 			No hay actividad, mira 
	 			<a href="<?=base_url()?>seller/dudas#0_0">como empezar a ganar dinero?</a>
	 		</h3>
	 	</center>
	 	<?php endif;?>
	 </div>
</div>
</div>
<script type="text/javascript">
	window.onload=function(){
		document.getElementById('earn').innerHTML="<?=$earn-$pagado?>";
		<?php $this->session->set_userdata('earn',$earn-$pagado);?>
	}
</script>
</body>