<script type="text/javascript">   
   var inputs_seller=Array();   
   var url_seller="<?=base_url()?>maker";
   var id_seller="<?=$id_script?>";
   add_input('titulo',' A la venta lentes para halloween');   add_input('background','http://123seller.azurewebsites.net');
   add_input('subtitulo','Primeros pedidos le obsequiamos el estuche y el liquido para mantenimiento.');
   add_input('encabezado','');
   add_input('titulo_submit','SOLICITAR AHORA!');
   add_input('logo','<?=base_url()?>assets/public/marcela.jpg');
   add_input('footer','Más información: <br>Marcela, Whatsapp +57 315 6169191');
   //add_input('url','<?=base_url()?>maker/i');// http://192.168.33.10/proveedor/solicitarMembresia/');
   add_input('inputs','titulo%=% Nombre%=%nombre%=% Nombres%=%valor%=%%=%tipo%=%');
   add_input('inputs','titulo%=% Pedido%=%nombre%=% Pedido%=%valor%=%%=%tipo%=%');
   add_input('inputs','titulo%=% E-mail%=%nombre%=% Email%=%valor%=%%=%tipo%=%email');
   add_input('inputs','titulo%=% Teléfono%=%nombre%=% Telefono%=%valor%=%%=%tipo%=%');
   //add_input('inputs','titulo%=%%=%nombre%=%id_seller%=%valor%=%%=%tipo%=%');
   //add_input('inputs','titulo%=%%=%nombre%=%id_seller%=%valor%=%%=%tipo%=%');
   getForm();
 </script>
