<body style="padding-top: 8px;overflow-x:hidden">
<?php if(isset($background)):?>
<iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; overflow-y:scroll; top: 0px; width: 100%; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 1500px" tabindex="0" vspace="0" width="100%" src="<?=$background?>"></iframe>
<?php endif;?>
<div style="width: 100%;">

<form method="post" action="<?=$url?>">
     <div class="modal fade" id="<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="background-color: white;">
              <div class="modal-header encabezado">
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                <h4 class="modal-title text-center titulo_popup">
                <i class="fa fa-money"></i><?=$titulo?></h4>
              </div>
                <div class="modal-body contenido_popup">
              <center>
                <p  class="contenedor_candado">                
                  <img src="<?=$logo?>" style="max-width: 50%;background-color: whitesmoke;"/>
                </p>
                <h3 aling="center">
                <?=$encabezado?>
                </h3>
                <h5><?=$subtitulo?></h5>
               </center>
              <div class="background_img col-md-push-4">
          </div>

<?php foreach($inputs as $input):?>
 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack">  
            <span class="col-lg-3 col-md-3 p7">
                  <label for="<?=$input['nombre']?>">
                     <i class="fa fa-rotate-righ"></i>
                     <?=$input['titulo']?>
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3">
               <input type="<?=$input['tipo']?>" class="form-control input-msj transparent nb" name="<?=$input['nombre']?>" value="<?=$input['valor']?>" required>
            </span>
          </div>  
 <!--pack input-->
 <?php endforeach;?>   

 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12" >  
           <div style="color: red;" id="err" align="center">             
           </div>
          </div> 
 <!--pack input-->                  


          <div class="row"  style="padding-top:15px;"> 
            <div class="col-md-6 col-xs-12 col-lg-6">
             <?=$footer?>
             <input type="hidden" name="id" value="<?=$id?>">
            </div> 
            <div class="col-md-6 col-xs-12 col-lg-6"  style="padding-top:15px;"> 
               <button class="btn btn-primary btn_acceder bg-blue"><big><?=$titulo_submit?></big></button>
             </div>
            <a href="<?=base_url()?>">
               <span  class="col-md-6 col-xs-12 col-lg-6" style="color:lightgrey; font-size: 70%">
                Powered by Selle Online
               </span>
             </a>
          </div>
                  
              <!--<button class="btn btn-primary btn_acceder bg-blue"><big>SOLICITAR AHORA!</big></button>-->
          </div>                
          </div>
        </div>
 </form>
 </div>
 <div data-toggle="modal" id="l_<?=$id?>" data-target="#<?=$id?>"></div>
<script type="text/javascript">  
  document.getElementById('l_<?=$id?>').click();
</script>