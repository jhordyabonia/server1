<body style="padding-top: 8px;overflow-x:hidden">
<form method="post" action="<?=base_url()?>seller/sigin">
<div class="row"  style="border-bottom: solid 1px lightgray; width 100%; padding-bottom:2px" >
  <div align="center" class="col-md-1 col-xs-12">
  <a href="<?=base_url()?>">
    <img src="<?=base_url()?>/assets/img/logo0.png" class="logo"/>
    </a>
  </div>
  <div class="col-md-5 col-lg-5 hidden-xs">
    <p style="
    margin: 0;
    padding: 8% 0% 0% 1%;
    height: 50px;
    font-weight: 600;
    font-size: small;
    color: saddlebrown;
">Online</p>
  </div>
  <div class="col-md-6">
    <div class="row" style="padding-top: 8px;padding-left: 3px;padding-right: 3px;">
      <span class="col-md-2 col-lg-2 col-xs-4 p7">
            <label for="correo">
               <span class="fa fa-user transparent" ></span>
                Correo:
            </label>
      </span>

      <span class="col-md-3 col-xs-8 col-lg-3 p3">
            <input type="email" class="form-control input-msj transparent nb" placeholder="Ingrese su correo electronico " min='5' name="correo" value="" required>
      </span>
      <span class="col-md-2  col-lg-2 col-xs-4 p7" >
            <label for="clave1">
                <span class="fa  fa-key transparent" ></span>
                Clave:
            </label>
      </span>

      <span class="col-md-3 col-xs-8 col-lg-3 p3">
            <input type="password" id="c1" class="form-control input-msj transparent nb" placeholder="Ingrese su clave" required min='6' max='15' name="clave" value="" required>
      </span>
      <span align="center" class="col-md-2 col-xs-12 col-lg-2 p3">
            <button type="submit" class="btn btn-default ">Entrar</button>  
      </span>
   </div><!--row-->
    <div class="row">
      <div class="col-md-12 col-xs-12 col-lg-12 " style="color: red;"><?=$err?></div>
    </div>
 </div> 
  </div>
</div>
</form>

<div style="width: 100%;">
<form method="post" action="<?=base_url()?>seller/i">
     <div class="modal fade" id="f" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="background-color: white;">
              <div class="modal-header encabezado">
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                <h4 class="modal-title text-center titulo_popup">
                <i class="fa fa-money"></i>Registro</h4>
              </div>
                <div class="modal-body contenido_popup">
              <center>
                <p  class="contenedor_candado">                
                  <img src="<?=base_url()?>assets/img/logo0.png" class="logo"/>
                </p>
                <h3 aling="center">
                 Quiero ganar dinero por usar mis redes sociales
                </h3>
                <h5>Para ganar dinero solo, diligencie el siguiente formulario y comparte</h5>
               </center>
              <div class="background_img col-md-push-4">
          </div>
         
 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-3 p7">
                  <label for="cc">
                     <span class="fa fa-creative-commons transparent" ></span>
                      Documento:
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3">
                  <input type="number" min='5' class="form-control input-msj transparent nb" placeholder="Ingrese su número de Documento (solo números)" title="Solo números!" name="cc" value="<?=$cc?>" required>
            </span>
          </div>  
 <!--pack input-->                 

 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-3 p7">
                  <label for="nombres">
                     <span class="fa fa-user transparent" ></span>
                      Nombres:
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3" >
                  <input type="text" class="form-control input-msj transparent nb" placeholder="Ingrese sus Nombres " min='3' name="nombres" value="<?=$nombres?>" required>
            </span>
          </div>  
 <!--pack input-->                 

 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-3 p7">
                  <label for="apellidos">
                     <span class="fa fa-user transparent" ></span>
                      Apellidos:
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3" >
                  <input type="text" class="form-control input-msj transparent nb" placeholder="Ingrese sus Apellidos " min='3' name="apellidos" value="<?=$apellidos?>" required>
            </span>
          </div>  
 <!--pack input-->         
 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-3 p7">
                  <label for="correo">
                     <span class="fa fa-at transparent" ></span>
                      Correo:
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3">
                  <input type="email" class="form-control input-msj transparent nb" placeholder="Ingrese su correo electronico " min='5' name="correo" value="<?=$correo?>" required>
            </span>
          </div>  
 <!--pack input--> 
 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-3 p7">
                  <label for="cel">
                     <span class="fa fa-mobile-phone transparent" ></span>
                      Celular:
                  </label>
            </span>

            <span class="col-md-9 col-xs-11 col-lg-9 p3">
                  <input type="text" class="form-control input-msj transparent nb" placeholder="Ingrese su numero celular " name="cel" value="<?=$cel?>" required>
            </span>
          </div>  
 <!--pack input-->  


 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-4 p7" >
                  <label for="clave1">
                     <span class="fa  fa-key transparent" ></span>
                      Clave:
                  </label>
            </span>

            <span class="col-md-8 col-xs-12 col-lg-8 p3">
                  <input type="password"  onchange="return equals();" id="key" class="form-control input-msj transparent nb" placeholder="Ingrese nuevamente su clave" required min='6' max='15' name="clave1" value="" required>
            </span>
          </div>  
 <!--pack input--> 


 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12 pack" >  
            <span class="col-md-4 p7">
                  <label for="clave">
                     <i class="fa fa-rotate-righ"></i>
                      Verifique su clave:
                  </label>
            </span>

            <span class="col-md-8 col-xs-11 col-lg-8 p3">
                  <input type="password" class="form-control input-msj transparent nb" placeholder="Ingrese nuevamente su clave" id="cr" onchange="return equals();" value="" required>
                  <input type="hidden" id="c0" name="clave" required> 
                  <input type="hidden" name="cuv" value="<?=$cuv?>">
            </span>
          </div>  
 <!--pack input-->
                  

 <!--pack input-->         
          <div class="col-md-12 col-xs-12 col-lg-12" >  
           <div style="color: red;" id="err" align="center">             
           </div>
          </div> 
 <!--pack input-->
                  


          <div class="row"  style="padding-top:15px;"> 
            <div class="col-md-6 col-xs-12 col-lg-6">
            Enviando el formulario, se entiende, acepta nuestros <a href="<?=base_url()?>seller/terminos">Terminos y condiciones</a> de uso 
            </div> 
            <div class="col-md-6 col-xs-12 col-lg-6"  style="padding-top:15px;"> 
               <button class="btn btn-primary btn_acceder bg-blue"><big>SOLICITAR AHORA!</big></button>
             </div>
          </div>
                  
              <!--<button class="btn btn-primary btn_acceder bg-blue"><big>SOLICITAR AHORA!</big></button>-->
          </div>                
          </div>
        </div>
 </form>
 <script type="text/javascript">
   function equals()
   {
    i=document.getElementById('cr').value;
    if(i=="")return;
    err=document.getElementById('err');
    err.innerHTML="";
    if(i.length<5)
      { 
        err.innerHTML="<br>Clave muy corta. debe tener mínimo 6 caracteres.";
        return;
      }
    
    if(document.getElementById('key').value==i)
      {document.getElementById('c0').value=i; return;}
    else 
      {
        document.getElementById('c0').value='';
        err.innerHTML+="<br>Las claves no coinciden";
     }
   }
 </script>

 <div align="center" class="row" style="padding-top: 15px; height: 750px;">
   <div align="left" class="col-md-12 col-lg-12 col-xs-12" style="padding-left:2%;" >
     <div align="left" class="col-md-4 col-lg-4 col-xs-12" >
       <h1 class="title">Pasos a Seguir:</h1>
     </div>
    <div class="col-md-8 col-lg-8 col-xs-12 " >
    <img class="hidden-xs" src="<?=base_url()?>assets/img/chat/1.png" style="
    margin-top: -1%;
">

<!--Requiere ccs facebook, pero desajustan otros diseños-->
<!-- <span class="chat">
        ¿ <span aria-hidden="true" class="emoticon emoticon_unsure"></span><b> Seller Online?</b>
      </span>
        <span class="chat ws">
      Sí <a href="javascript:void()">Seller Online:</a><span> </span>La plataforma que te paga por usar tus redes sociales.... 
      </span>
        <span class="chat">
        <span aria-hidden="true" class="emoticon emoticon_squint"></span>'Ta raro 
        </span>
        <span class="chat ws">
      <span aria-hidden="true" class="emoticon emoticon_pacman"></span>
      <span aria-hidden="true" class="emoticon emoticon_pacman"></span>
      <span aria-hidden="true" class="emoticon emoticon_pacman"></span> jajaja... 
      </span>
      <span class="chat ws">
      <span aria-hidden="true" class="emoticon emoticon_smile"></span>si verdad?
      </span>
        <span class="chat ws">
        <span aria-hidden="true" class="emoticon emoticon_angel"></span>nada raro,</span>
        <span class="chat ws">
      solo es ganar algo de dinero,</span>
        <span class="chat ws"> por compartir contenido y noticias, de empresas, </span>
        <span class="chat ws">que te dan una comisión, si venden algo,</span>
        <span class="chat ws"> por  medio del enlace que tu compartiste. </span>
      </span>
        <span class="chat">    
      <span aria-hidden="true" class="emoticon emoticon_gasp"></span>hoooo genial.
     </span>
        <span class="chat">     
      <span aria-hidden="true" class="emoticon emoticon_grin"></span>como me registro?
      </span>
        <span class="chat ws">    
      <span aria-hidden="true" class="emoticon emoticon_tongue"></span>es broma verdad?</span> 
      </span>
  -->
    </div>
   </div>
 <!--side bar-->  
<div class="col-lg-4 col-lg-4">
  <div data-target="#carouselInicio active" data-slide-to="0" class="step" align="left">1) Registrarse</div>
  <div data-target="#carouselInicio" data-slide-to="1" class="step" align="left">2) Activar Anuncios</div>
  <div data-target="#carouselInicio" data-slide-to="2" class="step" align="left">3) Compartir</div>
  <div data-target="#carouselInicio" data-slide-to="3" class="step" align="left">4) Esperar...</div>
  <div data-target="#carouselInicio" data-slide-to="4" class="step" align="left">5) Cobrar</div>
  
  </div> 
<!--content banner-->
  <div class="col-lg-6 col-lg-6"  data-toggle="modal" data-target="#f" style="padding-top: 1%;">
  
    <script type="text/javascript">
    $(document).ready(function(){
    $('#carouselInicio').carousel({interval: 5000});
    });
    </script>



    <div class="imagen_principal">
    <div class="container_imagen" >
    <div class="row" id="banner" >
    <!-- Seccion de Carousel -->
    <div class="row" id="foto_principal" style="max-height: 385px; overflow:hidden; ">
    <!-- Carousel-->
    <div id="carouselInicio" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="
    top: 20px;
">
     <?foreach ($banners as $i => $banner): ?>
      <?php if ($banner == "") {break;}    ?>
      <li data-target="#carouselInicio" data-slide-to="<?=$i;?>"
      class="<?php if ($i == 0) {echo 'active';}?>"></li>
      <?php endforeach?>
    </ol>
    <div class="carousel-inner"  data-toggle="modal" data-target="#f">
    <?php foreach ($banners as $i => $banner): ?>
    <?php if ($banner == "") {break;}?>
      <div style="" class="item anti-active <?php if ($i == 0) {echo 'active';}?>">
      <center>
        <img style="width: 100%" src="<?=base_url()?>assets/img/bg/<?=$banner?>" class="img-responsive banner">
      </center>
    </div>
    <?php endforeach?>
    </div>
    </div>
    </div>
    </div>


 </div>
 </div>

</div> 
  <div class="col-lg-2 col-lg-2" style="padding-top:1%;">

  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <div class="col-lg-12 col-md-12 col-xs-12 step">
      <a class="btn btn-primary"  data-toggle="modal" data-target="#f">
          <i class="fa fa-edit transparent"></i> Registrarme.
      </a>
  </div>


    <div class="col-lg-12 col-md-12 col-xs-12">

  <div class="col-lg-12 col-md-12 col-xs-12 step">
<div class="fb-share-button" data-href="<?=base_url()?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.proveedor.com.co%2F&amp;src=sdkpreparse"><i class="fa fa-facebook fa-fw"></i></a></div>
                    </div>
                   
                    <div class="col-lg-12 col-md-12 col-xs-12 step">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=base_url()?>" data-via="" data-size="large" data-dnt="true">Tweet</a> 
              
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 step">
                       <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-url="<?=base_url()?>" data-counter="right"></script>
                    </div>
                    <div class="visible-xs col-xs-12 step">
                        <a href="whatsapp://send?text= http://www.tuweb.es/urlquequierescompartir/" data-action="share/whatsapp/share" style="color: green;">
                        <i class="fa fa-whatsapp fa-fw"></i>
                        </a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 step">
                        <a href="mailto:?subject='Esto puede interesarte..'&body='<?=base_url()?>'">
                            <i class="fa fa-envelope fa-fw"></i>Compartir
                        </a>
                    </div>
                     <div class="col-lg-12 col-md-12 col-xs-12 step">
             <!-- Inserta esta etiqueta en la sección "head" o justo antes de la etiqueta "body" de cierre. -->
              <script src="https://apis.google.com/js/platform.js" async defer data-href="<?=base_url()?>/3">
                  {lang: 'es'}
                </script>

                <!-- Inserta esta etiqueta donde quieras que aparezca Botón Compartir. -->
                <div data-href="<?=base_url()?>" class="g-plus" data-action="share" data-height="24"></div>
                    </div>
            </div>       
  </div>
