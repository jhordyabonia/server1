<script src="http://123seller.azurewebsites.net/assets/js/form.js"></script>
<?php if($id_script=="Seller1"){?>
<script type="text/javascript">   
   var inputs_seller=Array();   
   var url_seller="<?=base_url()?>maker";
   var id_seller="<?=$id_script?>";
   add_input('titulo',' Base de datos de Compradodres recurrentes');
   add_input('subtitulo','Quiero comprar el acceso a la base de datos de compradores');
   add_input('encabezado','Para adquirir la base de datos de compradores con información de contacto, diligencie el siguiente formulario y será contactado por uno de nuestros asesores.');
   add_input('titulo_submit','SOLICITAR AHORA!');
   add_input('logo','http://www.proveedor.com.co/assets/img/index/logo_proveedor.png');
   add_input('footer','');
   //add_input('url','<?=base_url()?>maker/i');// http://192.168.33.10/proveedor/solicitarMembresia/');
   add_input('inputs','titulo%=%Nombre%=%nombre%=%nombres%=%valor%=%%=%tipo%=%');
   add_input('inputs','titulo%=%Empresa%=%nombre%=%empresa%=%valor%=%%=%tipo%=%');
   add_input('inputs','titulo%=%E-mail%=%nombre%=%email%=%valor%=%%=%tipo%=%email');
   add_input('inputs','titulo%=%Teléfono%=%nombre%=%telefono%=%valor%=%%=%tipo%=%');
   //add_input('inputs','titulo%=%%=%nombre%=%id_seller%=%valor%=%%=%tipo%=%');
   getForm();
 </script>
<div id="popup_seller"></div>
<?php } else if($id_script=="marcela"){?>
   <script type="text/javascript">   
   var inputs_seller=Array();   
   var url_seller="<?=base_url()?>maker";
   var id_seller="<?=$id_script?>";
   add_input('titulo',' A la venta lentes para halloween');
   add_input('subtitulo','Primeros pedidos le obsequiamos el estuche y el liquido para mantenimiento.');
   add_input('encabezado','');
   add_input('titulo_submit','SOLICITAR AHORA!');
   add_input('logo','http://www.proveedor.com.co/assets/img/index/logo_proveedor.png');
   add_input('footer','');
   //add_input('url','<?=base_url()?>maker/i');// http://192.168.33.10/proveedor/solicitarMembresia/');
   add_input('inputs','titulo%=%Nombre%=%nombre%=%nombres%=%valor%=%%=%tipo%=%');
   add_input('inputs','titulo%=%Pedido%=%pedido%=%pedido%=%valor%=%%=%tipo%=%');
   add_input('inputs','titulo%=%E-mail%=%nombre%=%email%=%valor%=%%=%tipo%=%email');
   add_input('inputs','titulo%=%Teléfono%=%nombre%=%telefono%=%valor%=%%=%tipo%=%');
   //add_input('inputs','titulo%=%%=%nombre%=%id_seller%=%valor%=%%=%tipo%=%');
   //add_input('inputs','titulo%=%%=%nombre%=%id_seller%=%valor%=%%=%tipo%=%');
   getForm();
 </script>
<?php }?>