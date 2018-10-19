<body style="overflow-x:hidden">

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
	      <a href="<?=base_url()?>seller/anuncios">
		      <span class="col-xs-3">
           <span class="l elipse">
		               <span class="fa fa-globe transparent" ></span>   
		              Anuncios         
		      </span>
		      </span>
		      </a>
	      <a href="<?=base_url()?>seller/tablero_usuario">
		      <span class="col-xs-3">
           <span class="l elipse">
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
</div>
<div style="
    background-color: whitesmoke;
    width: 90%;
    height:80%;
    margin: 3% 5% 0% 5%;
">
<div class="row">
 <div class="col-md-4 col-lg-4 col-xs-12 b">
       <span class="elipse">
           <span class="fa fa-user transparent"></span>   
           <?=$user?>         
      </span>
     <span class="l" data-toggle="modal" data-target="#f" style="cursor: pointer;">
           <span class="fa fa-edit transparent"></span>Nueva</span>
  </div>
   <div class="col-md-8 col-lg-8 col-xs-12 b">
       <span class="">
           <span class="fa fa-question transparent"></span>
           <span id="n_duda">¿Como empezar?</span>
           </span>
  </div>

</div>
<div class="row">
	<div class="col-xs-12 col-lg-4 col-md-4 b" style="max-height: 450px;overflow-y: scroll;">
		<div class="col-xs-12 col-lg-12 col-md-12" style="border-bottom: solid 1px lightgrey;">
			  <div class="col-md-12 col-xs-12 col-lg-12" style="margin:2%;background-color:white;border: solid 1px lightblue;">  
	            <span class="col-xs-1 col-md-1 col-lg-1 p7">
	                  <label for="search">
	                     <span class="fa fa-search transparent" ></span>
	                  </label>
	            </span>
	            <span class="col-md-10 col-xs-10 col-lg-10 p3">
	                  <input name="search" id="buscar-pal" class="form-control" placeholder="buscar" onkeyup="autocompletado()" style="border:0" title="Busca, antes de preguntar...">
	            </span>
	          </div>  

			    <div>
			          <ul id="result_s"></ul>
			    </div>
		</div>
		<?php $respuestas=array();foreach ($dudas as $key => $duda):?>
		<?php 
		$respuestas[$key]=explode("%=%", $duda->respuestas);
		foreach ( $respuestas[$key] as $key2 => $value) 
		{					
			$a=explode("%::%",$value);
			if(count($a)<2)continue;
			$a=array('fecha' =>$a[1] ,'user' =>$a[0] ,'msj' =>$a[2] , );
			$respuestas[$key][$key2]=$a;
		}
		?>
			<a name="#<?=$key?>_0" onclick="sett(this,'<?=$duda->duda?>');" class="col-xs-12 col-lg-12 col-md-12 ask" style="padding:3%; border-bottom: solid 1px lightgrey; cursor: pointer;">
				<b class="elipse"><?=$duda->duda?></b>
				<br><i class="elipse">
				<?php echo substr($respuestas[$key][0]['msj'],0,100);?></i>
			</a>
		<?php endforeach;?>
	</div>
	<div class="col-xs-12 col-lg-8 col-md-8 b" style="max-height: 450px;">
	<div class="col-xs-12 col-lg-12 col-md-12" style="overflow-y: scroll;max-height: 360px;">
	<?php  foreach ($respuestas as $dude=> $todas)
			{
				foreach ($todas as $key => $respuesta):?>
		<div class="col-md-12 col-xs-12 col-lg-12" id="<?=$dude.'_'.$key?>">
			<div class="col-xs-12 col-lg-12 col-md-12" style="
	    background-color: white;
	    border-radius: 10px;
	">
				<b class="elipse"><?=$respuesta['user']?> </b> 
				<i class="elipse" style="float:right;"> <?=$respuesta['fecha']?></i>
				<p class="elipse" > dice: <?=$respuesta['msj']?></p>
			</div>		
				<span style="color:white;margin-bottom:-5%;" class="fa fa-comment"></span>
			</div>
		<?php endforeach;}?>
		</div>
			 <div style="display:none;padding:2%;margin:0px;width:100%;overflow-x: hidden;background-color:whitesmoke;"">  
	            <span style="width: 5%">
	                  <label for="res">
	                     <span class="fa fa-send transparent" ></span>
	                  </label>
	            </span>
	            <input name="res" id="buscar-pal" style="border:0; height: 30px; width:95%;float:right;">
		</div>
	</div>


</div>


<form method="post" action="<?=base_url()?>seller/rec_duda">
     <div class="modal fade" id="f" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="background-color: white;">
              <div class="modal-header encabezado">
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
              </div>
                <div class="modal-body contenido_popup">         
 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-3 p7">
                  <label for="duda">
                     <span class="fa fa-question transparent" ></span>
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3">
                  <input min='5' class="form-control input-msj transparent nb" placeholder="¿Como invitar amigos?" title="No eres tonto por preguntar" name="duda" value="" required>
            </span>
          </div>  
 <!--pack input-->                 

          <div class="row"  style="padding-top:15px;">            
            <div class="col-md-6 col-xs-12 col-lg-6"  style="padding-top:15px;"> 
               <button class="btn btn-xs"><big>Preguntar!</big></button>
             </div>
          </div>
                  
              <!--<button class="btn btn-primary btn_acceder bg-blue"><big>SOLICITAR AHORA!</big></button>-->
          </div>                
          </div>
        </div>
 </form>
 <script type="text/javascript">
 	function sett_(i)
 	{
 		document.getElementById('n_duda').innerHTML=i;
 	}
 	function sett(b,i)
 	{
 		sett_(i);
 		a= document.createElement('a');
 		a.href=b.name;
 		a.click();
 	}
 	function autocompletado () {
            document.getElementById("result_s").innerHTML = '';

            var ask= document.getElementsByClassName('ask');
            var pal = document.getElementById("buscar-pal").value;
            pal=pal.toLowerCase();
            var tam = pal.length;
            if(tam>5)
            for(indice in ask){
                var nombre = ask[indice].innerText.toLowerCase();
                 if (typeof nombre == 'undefined')continue;
                var str = nombre.substring(0,tam);
                //if(pal.length <= nombre.length && pal.length != 0 && nombre.length != 0){
                if(nombre.indexOf(pal)>=0){ 
                    //if(pal.toLowerCase() == str.toLowerCase()){
                        var node = document.createElement("LI");
                        var a = document.createElement("a");
                        a.href=ask[indice].name;
                        var textnode = document.createTextNode(nombre.substring(0,15));
                        a.appendChild(textnode);
                        node.appendChild(a);
                        document.getElementById("result_s").appendChild(node);
                   // } else {
           // console.log('no')
         // }
                }
            }
        }
 </script>