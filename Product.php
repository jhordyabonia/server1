<?php

function find($find,$data)
{
	$out=array();
	
	foreach($data as $key =>$value)
	{
		if($key===$find)
			$out[count($out)]=$value;
		else foreach($value as $key1 =>$value1)
		{		
			if($key1===$find)
				$out[count($out)]=$value1;
			else foreach($value1 as $key2 =>$value2)	
			{		
				if($key2===$find)
					$out[count($out)]=$value2;
				else foreach($value2 as $key3 =>$value3)	
				{		
					if($key3===$find)
						$out[count($out)]=$value3;
					else foreach($value3 as $key4 =>$value4)	
					{		
						if($key4===$find)
							$out[count($out)]=$value4;
					}
				}
			}
		}
	}
	return $out;
}


$base=$_POST['base'];
$data=$_POST['data'];
$raw=$_POST['raw'];
$data=(Object)$data[1];
$image=$base['image'];
$imageLarge=$data->LargeImage['URL'];
$imageSmall=$data->LargeImage['URL'];
$description=implode(" ",$data->ItemAttributes['Feature']); 
$ASIN=((Object)$base);
$ASIN=$ASIN->asin[0];
if(!$ASIN)
$ASIN=$data->ASIN;

$weight=1;
foreach($data->ItemAttributes['Feature'] as $d)
	$features.="<li class='puntos'> $d</li>";
	
$minImage=array();	
$maxImage=array();	
foreach($data->ImageSets['ImageSet'] as $k=>$i)
{
	$obj=(Object)$i;
	$minImage[$k]=$obj->SwatchImage['URL'];	
	$maxImage[$k]=$obj->LargeImage['URL'];
}
$color=find('Color',$raw);
$size=find('Size',$raw);
$weight=find('Weight',$raw);
$weight_t=1;
#foreach($weight as $w)
#	if($w){$weight_t=$w;break;}
#$weight=$weight_t;
/*
echo "<PRE>";
print_r($weight);
echo "</PRE>";
/*echo "<PRE>";
print_r($data);
echo "</PRE>";
#die();*/ 
?>
<html lang="es"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$base['title']?></title>
<meta name="description" content="The page you requested was not found, and we have a fine guess why.
If you typed the URL directly, please make sure the spelling is correct.
If you clicked on a link to get here, the link is outdated.
What can you do?
Have no fear, help is near! There">
<meta name="keywords" content="Magento, Varien, E-commerce">
<meta name="robots" content="INDEX,FOLLOW">
<link rel="icon" href="http://www.tushopusa.com/media/favicon/default/favicon.fw.png" type="image/x-icon">
<link rel="shortcut icon" href="http://www.tushopusa.com/media/favicon/default/favicon.fw.png" type="image/x-icon">
<!--[if lt IE 7]>
<script type="text/javascript">
//<![CDATA[
    var BLANK_URL = 'http://www.tushopusa.com/js/blank.html';
    var BLANK_IMG = 'http://www.tushopusa.com/js/spacer.gif';
//]]>
</script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/js/calendar/calendar-win2k-1.css">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/styles.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/base/default/css/widgets.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/aw_blog/css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/base/default/ajaxcart/growler.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/ajaxkit/main.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/ajaxkit/general_add_to_cart.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/ajaxkit/general_add_to_links.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/meigee.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/owl.carousel.min.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/custom.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/bootstrap.min.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/grid_responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/print.css" media="print">
<script src="https://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.es_419.AAgVfh-J7z8.O/m=auth/exm=plusone/rt=j/sv=1/d=1/ed=1/am=QQE/rs=AGLTcCPylR1_BloCWm42pVfTFShFgAwY1A/cb=gapi.loaded_1" async=""></script><script src="https://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.es_419.AAgVfh-J7z8.O/m=plusone/rt=j/sv=1/d=1/ed=1/am=QQE/rs=AGLTcCPylR1_BloCWm42pVfTFShFgAwY1A/cb=gapi.loaded_0" async=""></script><script type="text/javascript" async="" src="https://apis.google.com/js/platform.js" gapi_processed="true"></script><script id="twitter-wjs" src="//platform.twitter.com/widgets.js"></script><script id="facebook-jssdk" src="//connect.facebook.net/en_US/all.js#xfbml=1"></script><script type="text/javascript" src="http://www.tushopusa.com/js/prototype/prototype.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/lib/ccard.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/prototype/validation.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/scriptaculous/builder.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/scriptaculous/effects.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/scriptaculous/dragdrop.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/scriptaculous/controls.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/scriptaculous/slider.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/varien/js.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/varien/form.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/varien/menu.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/mage/translate.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/mage/cookies.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/meigee/ajaxkit/main.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/meigee/ajaxkit/general_add_to_cart.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/meigee/ajaxkit/general_add_to_links.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/meigee/ajaxkit/general_login.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/meigee/ajaxkit/general_toolbar.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/varien/product.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/varien/product_options.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/varien/configurable.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/calendar/calendar.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/js/calendar/calendar-setup.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/base/default/ajaxcart/growler.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/base/default/ajaxcart/ajaxcart.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/script.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/jquery.cookie.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/ekko-lightbox.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/jquery.elevatezoom.min.js"></script>
<link href="http://www.tushopusa.com/index.php/blog/rss/index/store_id/1/" title="Blog" rel="alternate" type="application/rss+xml">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/advanced_styling/lingerie.css">
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/media/advanced_styling/compo/custo.css">
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="http://www.tushopusa.com/skin/frontend/compo/default/css/styles-ie.css" media="all" />
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="http://www.tushopusa.com/skin/frontend/compo/default/js/html5.js"></script>
<![endif]-->

<script type="text/javascript">
//<![CDATA[
Mage.Cookies.path     = '/';
Mage.Cookies.domain   = '.www.tushopusa.com';
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
optionalZipCountries = ["HK","IE","MO","PA"];
//]]>
</script>
<script type="text/javascript">//<![CDATA[
                     var AjaxKitConfig = JSON.parse('{"general_add_to_cart":{"enable_ajax_for_add_to_cart":["cms","product","category"],"add_to_cart_btn_selector":".btn-cart, #wishlist-sidebar .link-cart, #product-addtocart-button","header_selector":".header","product_image_animation":"0","enable_quick_view":"1","add_to_cart_static_block":"","remove_from_cart_static_block":""},"general_add_to_links":{"enabled_add_to_compare":"1","enabled_add_to_wishlist":"1","add_to_compare_success_message_static_block":"","add_to_wishlist_success_message_static_block":"","header_selector":".header"},"general_login":{"header_selector":".header","after_login":"reload","after_login_custom_url":"","after_login_magento_pages":"no_redirection","after_login_static_pages":"","after_logout":"reload","after_logout_custom_url":"","after_logout_magento_pages":"no_redirection","after_logout_static_pages":"","after_registration":"reload","after_registration_custom_url":"","after_registration_magento_pages":"no_redirection","after_registration_static_pages":"","after_forgot_password":"reload","after_forgot_password_custom_url":"","after_forgot_password_magento_pages":"no_redirection","after_forgot_password_static_pages":""},"general_toolbar":{"enable_ajax_toolbar":"1","enable_ajax_layered_navigation":"1","enable_ajax_infinite_scroll":"1","infinite_scroll_buffer":"20","infinite_scroll_threshold":"3"},"main":{"url":"http:\/\/www.tushopusa.com\/index.php\/ajaxKit\/","uenc":"aHR0cDovL3R1c2hvcGNvbG9tYmlhLmNvbS9pbmRleC5waHAvbWktcHJvZHVjdC1hLmh0bWw,","parent":{"module":"catalog","controller":"product"},"js_css":{"head_html":"","head_js_css":[{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/prototype\/prototype.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/lib\/ccard.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/prototype\/validation.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/scriptaculous\/builder.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/scriptaculous\/effects.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/scriptaculous\/dragdrop.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/scriptaculous\/controls.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/scriptaculous\/slider.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/varien\/js.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/varien\/form.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/varien\/menu.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/mage\/translate.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/mage\/cookies.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/styles.css"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/base\/default\/css\/widgets.css"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/print.css"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/aw_blog\/css\/style.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/base\/default\/ajaxcart\/growler.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/base\/default\/ajaxcart\/growler.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/base\/default\/ajaxcart\/ajaxcart.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/meigee\/ajaxkit\/main.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/ajaxkit\/main.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/meigee\/ajaxkit\/general_add_to_cart.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/ajaxkit\/general_add_to_cart.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/meigee\/ajaxkit\/general_add_to_links.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/ajaxkit\/general_add_to_links.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/meigee\/ajaxkit\/general_login.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/meigee\/ajaxkit\/general_toolbar.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/meigee.css"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/owl.carousel.min.css"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/custom.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/jquery-1.11.2.min.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/bootstrap.min.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/bootstrap-select.min.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/script.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/jquery.cookie.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/ekko-lightbox.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/bootstrap.min.css"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/css\/grid_responsive.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/owl.carousel.min.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/varien\/product.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/varien\/product_options.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/varien\/configurable.js"}},{"name":"link","attributes":{"href":"http:\/\/www.tushopusa.com\/js\/calendar\/calendar-win2k-1.css"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/calendar\/calendar.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/js\/calendar\/calendar-setup.js"}},{"name":"script","attributes":{"src":"http:\/\/www.tushopusa.com\/skin\/frontend\/compo\/default\/js\/jquery.elevatezoom.min.js"}}]}}}');
                // ]]></script>
                <script type="text/javascript">//<![CDATA[
                     GeneralAddToCart.thisPage = "product"
                // ]]></script>
                <script type="text/javascript">//<![CDATA[
                     AjaxKitMain.initSubmodules();
                // ]]></script>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"><link href="//fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css"><link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet" type="text/css">    <style type="text/css">
		body.boxed-header .header-wrapper .container,
		body.boxed-breadcrumbs .breadcrumbs-wrapper .container,
        body.boxed-content .content-wrapper .container,
		body.boxed-footer #footer .container,
        body .container {max-width: 1272px; width: 100%;}
    </style>
<link href="//fonts.googleapis.com/css?family=Noto+Sans:100,200,300,400,500,600,700,800" rel="stylesheet" type="text/css"><link href="//fonts.googleapis.com/css?family=Playfair+Display:100,200,300,400,500,600,700,800" rel="stylesheet" type="text/css"><script type="text/javascript">//<![CDATA[
        var Translator = new Translate({"Please select an option.":"Por favor seleccione una opci\u00f3n.","This is a required field.":"Este es un campo obligatorio.","Please enter a valid number in this field.":"Por favor, introduzca un n\u00famero v\u00e1lido en este campo.","Please use letters only (a-z or A-Z) in this field.":"Usar \u00fanicamente letras (a-z o A-Z) en este campo por favor.","Please use only letters (a-z), numbers (0-9) or underscore(_) in this field, first character should be a letter.":"Por favor, use solo letras (a-z), n\u00fameros (0-9) o gui\u00f3n bajo (_) en este campo, el primer car\u00e1cter debe ser una letra.","Please enter a valid phone number. For example (123) 456-7890 or 123-456-7890.":"Por favor, introduzca un n\u00famero de tel\u00e9fono v\u00e1lido. Por ejemplo (123) 456-7890 o 123-456-7890.","Please enter a valid date.":"Por favor, introduzca una fecha v\u00e1lida.","Please enter a valid email address. For example johndoe@domain.com.":"Por favor, introduzca un Email v\u00e1lido. Por ejemplo juanperez@dominio.com.","Please make sure your passwords match.":"Por favor, aseg\u00farese de que sus contrase\u00f1as coinciden.","Please enter a valid URL. For example http:\/\/www.example.com or www.example.com":"Por favor, introduzca una URL v\u00e1lida. Por ejemplo http:\/\/www.example.com o www.example.com","Please enter a valid social security number. For example 123-45-6789.":"Por favor, introduzca un n\u00famero de seguro social v\u00e1lido. Por ejemplo 123-45-6789.","Please enter a valid zip code. For example 90602 or 90602-1234.":"Por favor, introduzca un c\u00f3digo postal v\u00e1lido. Por ejemplo 90602 o 90602-1234.","Please enter a valid zip code.":"Por favor, introduzca un c\u00f3digo postal v\u00e1lido.","Please use this date format: dd\/mm\/yyyy. For example 17\/03\/2006 for the 17th of March, 2006.":"Por favor, use este formato de fecha: dd\/mm\/aaaa. Por ejemplo 17\/03\/2006 para el 17 de marzo de 2006.","Please enter a valid $ amount. For example $100.00.":"Por favor, introduzca una cantidad en $ v\u00e1lida. Por ejemplo: $ 100.00.","Please select one of the above options.":"Por favor, elija una de las opciones de arriba.","Please select one of the options.":"Por favor, elija una de las opciones.","Please select State\/Province.":"Por favor, elija Estado\/Provincia.","Please enter a number greater than 0 in this field.":"Por favor, introduzca un n\u00famero superior a 0 en este campo.","Please enter a valid credit card number.":"Por favor, introduzca un n\u00famero de tarjeta de cr\u00e9dito v\u00e1lido.","Please wait, loading...":" Por favor, espere, cargando ...","Complete":"Completo","Add Products":"A\u00f1adir Productos","Please choose to register or to checkout as a guest":"Escoja registrarse o como invitado para realizar su pago por favor","Please specify shipping method.":"Especifique m\u00e9todo de env\u00edo por favor.","Please specify payment method.":"Especifique m\u00e9todo de pago por favor.","Add to Cart":"A\u00f1adir al carrito","In Stock":"En existencia","Out of Stock":"Agotado"});
        //]]></script>	<script type="text/javascript" charset="utf-8" async="" src="https://platform.twitter.com/js/button.bf357a6ba1a5f1fa0ddb61377ae3add5.js"></script><style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_loader{background-color:#f6f7f9;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{width:auto;height:auto;min-height:initial;min-width:initial;background:none}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{color:#fff;display:block;padding-top:20px;clear:both;font-size:18px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;bottom:0;left:0;right:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #29487d;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f9;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-repeat:no-repeat;background-position:50% 50%;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}
.fb_customer_chat_bounce_in{animation-duration:250ms;animation-name:fb_bounce_in}.fb_customer_chat_bounce_out{animation-duration:250ms;animation-name:fb_fade_out}.fb_customer_chat_bubble_pop_in{animation-duration:250ms;animation-name:fb_customer_chat_bubble_bounce_in_animation}.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}.fb_mobile_overlay_active{background-color:#fff;height:100%;overflow:hidden;position:fixed;visibility:hidden;width:100%}@keyframes fb_fade_out{from{opacity:1}to{opacity:0}}@keyframes fb_bounce_in{0%{opacity:0;transform:scale(.8, .8);transform-origin:100% 100%}10%{opacity:.1}20%{opacity:.2}30%{opacity:.3}40%{opacity:.4}50%{opacity:.5}60%{opacity:.6}70%{opacity:.7}80%{opacity:.8;transform:scale(1.03, 1.03)}90{opacity:.9}100%{opacity:1;transform:scale(1, 1)}}@keyframes fb_customer_chat_bubble_bounce_in_animation{0%{bottom:6pt;opacity:0;transform:scale(0, 0);transform-origin:center}70%{bottom:18pt;opacity:1;transform:scale(1.2, 1.2)}100%{transform:scale(1, 1)}}</style></head>
	<body class="catalog-product-view wide-header header-layout-4 wide-breadcrumbs wide-content wide-footer totop-button breadcrumbs-type-3 catalog-product-view product-mi-product-a custom-scrolling">
				    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong><br />
                    You must have JavaScript enabled in your browser to utilize the functionality of this website.                </p>
            </div>
        </div>
    </noscript>
		<div class="header-breadcrumbs-wrapper with-breadcrumbs">
			<div class="header-wrapper">
	<div class="checkpoint-wrapper">
        <div id="checkpoint-1"></div>
    </div>
	<header id="header" class="header header-4">
		<div class="top-block">
			<div class="container">
				<p class="welcome-msg">Bienvenidos a TuShop </p>
				<div class="right-block clearfix">
					<div class="header-custom-links">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".header-links">
			<i class="meigee-options-vertical"></i>
		</button>
	</div>
	<ul class="header-links collapse navbar-collapse">
		<li><a href="http://www.tushopusa.com/index.php/about-us/">Acerca de</a></li>
		<li><a href="http://www.tushopusa.com/index.php/#/"><i class="meigee-fa-map-marker"></i>Donde estamos</a></li>
	</ul>
</div>
										<div class="header-social-link">
	<a href="#" title="Instagram"><i class="meigee-fa-instagram"></i>@tushop</a>
<a href="#" title="Instagram"><i class="meigee-fa-facebook"></i>tushop</a>
</div>
					<div class="mobile-links">
												<a href="http://www.tushopusa.com/index.php/mi-product-a.htmlcustomer/account/login/" title="Login" class="top-link-login"><i class="meigee-user"></i></a>
											</div>
				</div>
			</div>
		</div>
		<div class="middle-block" id="checkpoint-0">
			<div class="container">
                <div class="checkpoint-wrapper">
                    <div class="checkpoint-button"></div>
                </div>
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<ul class="header-text-blocks clearfix">
	<li class="item first">
		<a href="#" title="">
			<span class="compo-icon open"></span>
			<span class="title">Lun - Sab 8.00 - 18.00<br><strong>Domingo CERRADO</strong></span>
		</a>
	</li>
	<li class="item last">
		<a href="#" title="">
			<span class="compo-icon ellipse"></span>
			<span class="title">Tiene Consultas?<br> Llamar: <span class="phone">1-800-496-1779</span></span>
		</a>
	</li>
</ul>					</div>
					<div class="col-sm-6 col-md-4 logo-wrapper text-center">
												<h2 class="logo">
							<strong>Compo</strong>
							<a href="http://www.tushopusa.com/index.php/" title="Compo">
								<img src="http://www.tushopusa.com/media/Logo-Giros-y-Finanzas.jpg" alt="Compo">
							</a>
						</h2>
					</div>
					<div class="col-sm-6 col-md-4 right-block">
						
<form name="myform" id="amazonsearch" method="" class="search-mini-form">
    <div class="form-search ">
		<div class="search-button">
			<i class="icon-magnifier" title="Buscar"></i><span>Buscar</span>
		</div>
		<div class="indent">
			<div style="border-radius: 77px;
    background: #fff;" class="inner">
				<div class="input-wrapper">
					<label for="search_608">Search:</label>
					<div class="input-group">
						<span class="top-search-icon"><i class="icon-magnifier"></i></span>
						<input name="keyword" id="keyword" placeholder="Busca tu producto o pega link de amazon" value="" class="form-control" maxlength="128">
						<span class="input-group-btn">
							<button action="submit" title="Buscar" onclick="carga();" class="btn btn-default"><span>Buscar</span></button>
						</span>
					</div>
					<div id="search_autocomplete_608" class="search-autocomplete"></div>
					<script type="text/javascript">
						//<![CDATA[
						var searchForm = new Varien.searchForm('search_mini_form_608', 'search_608', 'Buscar aquí en toda la tienda...');
						searchForm.initAutocomplete('http://www.tushopusa.com/index.php/catalogsearch/ajax/suggest/', 'search_autocomplete_608');
						//]]>
					</script>
				</div>
			</div>
		</div>
    </div>
</form>
  <script>
  // Shorthand for $(document).ready();
  var $j = jQuery.noConflict();
  $j(function() {
   $j('#amazonsearch').submit(function(){
   	 var keyword = $j('#keyword').val();
   	if (keyword.substr(0, 5) == "https" ) {    
     var asin = keyword.match("/([a-zA-Z0-9]{10})(?:[/?]|$)");
     $j(this).attr("method", "post");
     $j(this).attr('action', "http://www.tushopusa.com/amazon/index/ver/?asin=" + asin[1] + " ")
     }
      
     
else{
	$j(this).attr("method", "get");
     $j(this).attr('action', "http://www.tushopusa.com/amazon/index/");

}
   });
  });

      function carga() 
    {
        document.getElementById('toolbar-loading').style.display = "block";  
    }

 </script>						<ul class="links">
                        <li class="first"><a href="http://www.tushopusa.com/index.php/customer/account/" title="Mi cuenta" class="top-link-account">Mi cuenta</a></li>
                                <li><a href="http://www.tushopusa.com/index.php/wishlist/" title="Mi Lista de Deseos" class="top-link-wishlist">Mi Lista de Deseos</a></li>
                                <li><a href="http://www.tushopusa.com/index.php/checkout/" title="Ir a pagar" class="top-link-checkout">Ir a pagar</a></li>
                                <li class=" last"><a href="http://www.tushopusa.com/index.php/customer/account/login/" title="Iniciar Sesión" class="top-link-login AjaxKit-Singlton-Click" onclick="return false;">Iniciar Sesión</a></li>
            </ul>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-block clearfix">
			<div class="container">
				<div class="bottom-block-inner clearfix">
					<div class="mobile-menu-wrapper">
	<button class="menu-button" type="button"><i class="meigee-menu"></i> <span>Menu</span></button>
	<div class="mobile-menu-inner">
		<ul class="menu-tabs clearfix" role="tablist">
			<li class="menu-item-title active" role="presentation">
				<a href="#mobile-menu" aria-controls="mobile-menu" role="tab" data-toggle="tab">Menu</a>
			</li>
			<li class="menu-item-title" role="presentation">
				<a href="#mobile-account" aria-controls="mobile-account" role="tab" data-toggle="tab">Account</a>
			</li>
			<li class="menu-item-title" role="presentation">
				<a href="#mobile-settings" aria-controls="mobile-settings" role="tab" data-toggle="tab">Configuración</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="menu-item-content fade active in" role="tabpanel" id="mobile-menu">
				<nav class="navbar navbar-default in-mobile">
	<div class="topmenu">
	<ul class="nav nav-wide topmenu navbar-nav" style="">
			<li class="level0 nav-1 first level-top"><a href="http://www.tushopusa.com/index.php/" class="level-top"><span>Inicio</span></a></li><li class="level0 nav-2 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Mens" class="level-top"><span>Moda Masculina</span></a></li><li class="level0 nav-3 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Clothing" class="level-top"><span>Moda Femenina</span></a></li><li class="level0 nav-4 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Babies" class="level-top"><span>Moda Infantil</span></a></li><li class="level0 nav-5 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Electronics" class="level-top"><span>Electronica</span></a></li><li class="level0 nav-6 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=unlock%20cellphone" class="level-top"><span>Moviles</span></a></li><li class="level0 nav-7 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Sports" class="level-top"><span>Deporte y Ocio</span></a></li><li class="level0 nav-8 last level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=maternity" class="level-top"><span>Mamá y Bebés</span></a></li>		</ul>
	</div>
</nav>
			</div>
			<div class="menu-item-content fade" role="tabpanel" id="mobile-account">
				<ul class="links default-links clearfix">
                        <li class="first"><a href="http://www.tushopusa.com/index.php/customer/account/" title="Mi cuenta" class="top-link-account">Mi cuenta</a></li>
                                <li><a href="http://www.tushopusa.com/index.php/wishlist/" title="Mi Lista de Deseos" class="top-link-wishlist">Mi Lista de Deseos</a></li>
                                <li class=" last"><a href="http://www.tushopusa.com/index.php/checkout/" title="Ir a pagar" class="top-link-checkout">Ir a pagar</a></li>
            </ul>
			</div>
			<div class="menu-item-content fade" role="tabpanel" id="mobile-settings">
											</div>
		</div>
	</div>
</div>
					<nav class="navbar navbar-default">
	<div class="navbar-header">
		<button class="navbar-toggle menu-button" type="button">
			<i class="meigee-menu"></i>
			<span>Menu</span>
		</button>
	</div>
	<div class="collapse topmenu navbar-collapse">
	<ul class="nav nav-wide topmenu navbar-nav" style="">
			<li class="level0 nav-1 first level-top"><a href="http://www.tushopusa.com/index.php/" class="level-top"><span>Inicio</span></a></li><li class="level0 nav-2 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Mens" class="level-top"><span>Moda Masculina</span></a></li><li class="level0 nav-3 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Clothing" class="level-top"><span>Moda Femenina</span></a></li><li class="level0 nav-4 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Babies" class="level-top"><span>Moda Infantil</span></a></li><li class="level0 nav-5 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Electronics" class="level-top"><span>Electronica</span></a></li><li class="level0 nav-6 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=unlock%20cellphone" class="level-top"><span>Moviles</span></a></li><li class="level0 nav-7 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Sports" class="level-top"><span>Deporte y Ocio</span></a></li><li class="level0 nav-8 last level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=maternity" class="level-top"><span>Mamá y Bebés</span></a></li>		</ul></div>
</nav>
					<div class="top-cart top-link-cart dropdown long-cart">
		<div class="block-title no-items  cart-button">
		<a class="cartHeader" href="javascript:void(0);">
			<span class="title-cart clearfix">
					<span class="top-cart-icon">
					<span class="cart-full-indicator"></span><span class="cart-indicator"></span><i class="meigee-bag" title="Carrito de compra"></i>					</span>
					<span class="cart-right-items"><span class="cart-qty">0 / </span><span class="subtotal"><span class="price">USD0.00</span></span><i class="caret"></i></span>			</span>
		</a>
	</div>
	<div class="block block-content topCartContent" style="display:none;">
		<div class="inner-wrapper">							<p class="cart-empty">
				<i class="meigee-fa-shopping-cart"></i>
				<span>No tiene artículos en su carrito de compras.</span>
				<span class="small-label">Añadir algunos al carrito o <a href="http://www.tushopusa.com/index.php/customer/account/login/?___SID=U" class="link-login">login</a></span>
			</p>
				

	<script type="text/javascript" ajaxkit-singlton="1">
		/* Top Cart */

            	topCart();		jQuery('.mini-cart li:nth-child(2)').addClass('second');
		jQuery('.mini-cart li:nth-child(3)').addClass('last');

            if(typeof GeneralAddToCart != "undefined")
            {
		var sFunc = function(json)
		{
		    GeneralAddToCart.updateCartHtml();
		    AjaxKitMain.addHtmlPopup(json.popup_html);
		}
		AjaxKitMain.resetSidebarBlocks('block-content', false, sFunc, GeneralAddToCart);
            }
	</script>
	</div>

	</div>
</div>
 				</div>
			</div>
		</div>
	</header>
	<header id="sticky-header" class="header" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 clearfix">
				<div class="pull-left">
											<h2 class="small-logo pull-left">
							<strong>TuShop</strong>
							<a href="http://www.tushopusa.com/index.php/" title="Compo" class="logo">
								<img src="http://www.tushopusa.com/media/logo-tushop-136px.jpg" alt="Compo">
							</a>
						</h2>
										<div class="pull-left">
						<nav class="navbar navbar-default">
	<div class="navbar-header">
		<button class="navbar-toggle menu-button" type="button">
			<i class="meigee-menu"></i>
			<span>Menu</span>
		</button>
	</div>
	<div class="collapse topmenu navbar-collapse">
	<ul class="nav nav-wide topmenu navbar-nav" style="">
			<li class="level0 nav-1 first level-top"><a href="http://www.tushopusa.com/index.php/" class="level-top"><span>Inicio</span></a></li><li class="level0 nav-2 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Mens" class="level-top"><span>Moda Masculina</span></a></li><li class="level0 nav-3 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Clothing" class="level-top"><span>Moda Femenina</span></a></li><li class="level0 nav-4 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Babies" class="level-top"><span>Moda Infantil</span></a></li><li class="level0 nav-5 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Electronics" class="level-top"><span>Electronica</span></a></li><li class="level0 nav-6 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=unlock%20cellphone" class="level-top"><span>Moviles</span></a></li><li class="level0 nav-7 level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=Sports" class="level-top"><span>Deporte y Ocio</span></a></li><li class="level0 nav-8 last level-top"><a href="http://www.tushopusa.com/amazon/index/?keyword=maternity" class="level-top"><span>Mamá y Bebés</span></a></li>		</ul></div>
</nav>
					</div>
				</div>
				<div class="quick-access pull-right">
					<div class="pull-right">
						<div class="top-cart top-link-cart dropdown long-cart">
		<div class="block-title no-items  cart-button">
		<a class="cartHeader" href="javascript:void(0);">
			<span class="title-cart clearfix">
					<span class="top-cart-icon">
					<span class="cart-full-indicator"></span><span class="cart-indicator"></span><i class="meigee-bag" title="Carrito de compra"></i>					</span>
					<span class="cart-right-items"><span class="cart-qty">0 / </span><span class="subtotal"><span class="price">USD0.00</span></span><i class="caret"></i></span>			</span>
		</a>
	</div>
	<div class="block block-content topCartContent" style="display:none;">
		<div class="inner-wrapper">							<p class="cart-empty">
				<i class="meigee-fa-shopping-cart"></i>
				<span>No tiene artículos en su carrito de compras.</span>
				<span class="small-label">Añadir algunos al carrito o <a href="http://www.tushopusa.com/index.php/customer/account/login/?___SID=U" class="link-login">login</a></span>
			</p>
				

	<script type="text/javascript" ajaxkit-singlton="1">
		/* Top Cart */

            	topCart();		jQuery('.mini-cart li:nth-child(2)').addClass('second');
		jQuery('.mini-cart li:nth-child(3)').addClass('last');

            if(typeof GeneralAddToCart != "undefined")
            {
		var sFunc = function(json)
		{
		    GeneralAddToCart.updateCartHtml();
		    AjaxKitMain.addHtmlPopup(json.popup_html);
		}
		AjaxKitMain.resetSidebarBlocks('block-content', false, sFunc, GeneralAddToCart);
            }
	</script>
	</div>

	</div>
</div>
 					</div>
					<div class="pull-right">
											</div>
				</div>
			</div>
		</div>
	</div>
</header>
			</div>
								<div class="breadcrumbs-wrapper  type-3">
		<div class="container">
			<div class="breadcrumbs-inner clearfix">
									<header class="page-title">
																															<h1><?=$base['title']?></h1>
													</header>
								<ul class="breadcrumb">
											<li class="home" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
													<a href="http://www.tushopusa.com/index.php/" title="Inicio" itemprop="url"><span itemprop="title">Inicio</span></a>
												</li>
											<li class="product">
													<strong><?=$base['title']?></strong>
												</li>
									</ul>
			</div>
		</div>
	</div>
					</div>
		<div class="content-wrapper">
			<div class="container">
				<div class="main-container col1-layout">
					<div class="row">
						<div class="col-main col-xs-12">
														<script type="text/javascript">
    var optionsPrice = new Product.OptionsPrice([]);
</script>
<div id="messages_product_view"></div>
<div class="product-view" itemscope="" itemtype="http://schema.org/Product">
			<meta itemprop="name" content="<?=$base['title']?>">
				<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
		<div class="product-essential">
		<div class="row clearfix with-sidebar">
						<div class="col-sm-9">
				<div class="row top-wrapper">
					<div class="product-img-box col-sm-5 large-layout">
							<div class="product-image-gallery clearfix">
				<div class="product-image product-image-zoom inner " style="height: 671px;">
							<a href="&#10;&#9;&#9;&#9;&#9;&#9;&#9;&#9;<?=$imageLarge?>" data-toggle="lightbox" data-gallery="navigateTo" data-footer="<?=$base['title']?>" class="lightbox-button active">
							<i class="meigee-magnifier"></i>
							</a>
						<img src="<?=$image[0]?>" class="gallery-image visible ajax_image_loader" alt="" title="" id="image" data-zoom-image="<?=$imageLarge?>" style="opacity: 1;">		<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;height:671px;width:378px;"><div class="zoomWindowContainer" style="width: 400px;"><div style="z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: -36px -48.9531px; width: 378px; height: 671px; float: left; cursor: crosshair; background-repeat: no-repeat; position: absolute; background-image: url(&quot;http://www.tushopusa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/_/h/_historico_de_servicios.jpg&quot;); top: 0px; left: 0px; display: none;" class="zoomWindow">&nbsp;</div></div></div></div>
	</div>
	<div class="more-views">
		<h3>Más Vistas</h3>
					<div class="more-views-inner clearfix">
						<?foreach($minImage as $k=> $img):?>
							<div class="item">
								<a href="javascript:void(0);" title="" data-bigimg="<?=$maxImage[$k]?>" data-zoomimg="<?=$maxImage[$k]?>">
									<img src=" <?=$img?>">					
								</a>
							</div>
						<? endforeach;?>
					</div><br>
			</div>
	<script type="text/javascript">
		jQuery(window).load(function(){
			if(jQuery('.more-views').length){
				var thisItem;
				var image = jQuery('#image');
				jQuery('.more-views').on('click', '.item a', function(){
					var thisItem = jQuery(this);
					bigImgUrl = thisItem.data('bigimg');
					zoomImgUrl = thisItem.data('zoomimg');
					jQuery.removeData(image, 'elevateZoom'); //remove zoom instance from image
					jQuery('.zoomContainer').remove(); // remove zoom container from DOM
					zoomImg = new Image;
					bigImg = new Image;
					zoomImg.src = zoomImgUrl;
					bigImg.src = bigImgUrl;
					zoomLoaded = false;
					bigLoaded = false;
					function loader(){
						zoomImgWidth = zoomImg.width;
						imgWidth = bigImg.width;
						mainImg = jQuery('#image');
						mainImg.attr('src', bigImgUrl).data('zoomImage', zoomImgUrl);
						productImageSize();
						if(jQuery('.product-image').width() < zoomImgWidth){
							if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))){
								mainImg.elevateZoom({ zoomType: "inner", cursor: "crosshair" });
							}
						}
					}
					zoomImg.onload = function(){
						zoomLoaded = true;
						if(zoomLoaded && bigLoaded){
							loader();
						}
					}
					bigImg.onload = function(){
						bigLoaded = true;
						if(zoomLoaded && bigLoaded){
							loader();
						}
					}

					productImageSize();
					itemIndex = thisItem.parents('.more-views').find('.item').index(thisItem.parent());
					jQuery('.product-view .product-image a.lightbox-button').removeClass('active').eq(itemIndex).addClass('active');

				});
				bigImgUrl = jQuery('#image').data('zoomImage');
				jQuery('.more-views .item a').each(function(index){
					if(jQuery(this).data('zoomimg').indexOf(bigImgUrl) !=-1){
						jQuery('.product-view .product-image a.lightbox-button').eq(index).addClass('active');
					}
				});
			}
		});
		jQuery(document).ready(function(){
			if(jQuery('#more-views-slider').length){
				moreViewsSlider = jQuery('#more-views-slider .more-views-inner');
				moreViewsSlider.owlCarousel({
					margin: 0,
					nav:true,
					responsive:{
						0:{
							items:4
						},
						767:{
							items:4
						},
						1007:{
							items:4
						},
						1331:{
							items:4
						}
					},
					dots: false,
					lazyLoad: false,
					navContainer: '#more-views-slider .owl-buttons',
					navText: ['<i class="meigee-arrow-left"></i>','<i class="meigee-arrow-right"></i>']
				});
			}
		});
	</script>
<script type="text/javascript">
	jQuery(window).ready(function() {
		if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))){
			imgUrl = jQuery('#image').data('zoomImage');
			zoomImg = new Image;
			zoomImg.src = imgUrl;
			var func = function() {
				var zoomImgWidth = zoomImg.width;
				var imgWidth = jQuery('#image').width();
				if(imgWidth < zoomImgWidth) {
					jQuery("#image").elevateZoom({ zoomType: "inner", cursor: "crosshair", easing : true });
					setTimeout(function(){
						jQuery('.hide-overlay').removeClass('hide-overlay');
					}, 1000);
				}
				productImageSize();
			}
			if (zoomImg.complete) {
				func();
			} else {
				zoomImg.onload=func;
				zoomImg.onerror=func;
			}
			
			mainImg = jQuery('#image');
			mainImg.each(function(){
				if(!this.complete){ /* img is not loaded yet */
					jQuery(this).load(function(){
						setTimeout(function(){
							productImageSize();
						}, 1000);
					});
				}else{ /* img already loaded */
					setTimeout(function(){
						productImageSize();
					}, 1000);
				}
			});
		}
	});
</script>
					</div>
										<div class="product-shop col-sm-7 large-layout">
						<div class="product-shop-inner">
															<div class="product-name">
									<h1 itemprop="name"><?=$base['title']?></h1>
								</div>
														<div class="product-buttons default clearfix">
	</div>
							<div class="price-availability-block clearfix">
								<div class="top-block clearfix">
									
                            <div class="price-box">
                                                                <span class="regular-price" id="product-price-7">
																		<span itemprop="priceCurrency" class="price-currency" content="COP">COP </span>$ <span class="price" itemprop="price"><?=$base['price']?></span>						                    					<span class="price-label">Precio:</span>
                </span>
                                </div>
																														<p class="availability in-stock"><span itemprop="availability">En existencia</span></p>
																																						<div class="sku">No. Ref. (SKU): <span> <?=$ASIN?></span></div>
																	</div>
								<div class="bottom-block clearfix">
																		</div>
							</div>
															<div class="short-description">
									<h5>Vista Rápida:</h5>
									<div class="std" itemprop="description"><ul><?=$features?></ul></div>
									<? if(!empty($color)):?>
									<dl class="last">
									<dt style="    padding: 0;"><label id="Color" class="required"><em>*</em>Color</label></dt>
										<dd class="last">
											<div class="input-box">
												<select style="color: #0a4894;" name="color" id="myattribute_color" class="required-entry super-attribute-select dropdown form-control" onchange="attributeValues(0,1)">
												<option value="">Escoge una opción...</option>
												<? foreach($color as $c):?> 
												<option value="<?=$c?>" price="0" data-label="blue"><?=$c?></option>
												<? endforeach;?>
												</select>
											</div>
										</dd>
									</dl>
									<?endif;?>
									<? if(!empty($size)):?>
									<dl class="last">
									<dt style="    padding: 0;"><label id="Color" class="required"><em>*</em>Talla</label></dt>
										<dd class="last">
											<div class="input-box">
												<select style="color: #0a4894;" name="talla" id="myattribute_color" class="required-entry super-attribute-select dropdown form-control" onchange="attributeValues(0,1)">
												<option value="">Escoge una opción...</option>
												<? foreach($size as $c):?> 
												<option value="<?=$c?>" price="0" data-label="blue"><?=$c?></option>
												<? endforeach;?>
												</select>
											</div>
										</dd>
									</dl>
									<?endif;?>
									
																													
																						<div class="add-to-box">
									                            <div class="price-box">
                                                                <span class="regular-price" id="product-price-7_clone">
																		<span class="price">$<?=$base['price']?></span>		COP				                    					<span class="price-label">Precio:</span>
                </span>
                                </div>
																						<div class="add-to-cart">
							<div class="quantity-wrapper clearfix">
					<label for="qty">Cant:</label>
					<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Cant." class="form-control qty">
					<div class="btn-qty-wrapper">
						<div class="quantity-increase btn-qty" onclick="qtyUp()"><i class="meigee-arrow-up"></i></div>
						<div class="quantity-decrease btn-qty" onclick="qtyDown()"><i class="meigee-arrow-down"></i></div>
					</div>
				</div>
						<button type="subnmit" title="Añadir al carrito" onclick="add_cart()" class="btn btn-primary type-2 AjaxKit-addtocart-link"><span><span>Añadir al carrito</span></span></button>
					</div>
			<script type="text/javascript">
			var qty_el = document.getElementById('qty');
			var qty = qty_el.value;
			if(qty < 2){
				jQuery('.quantity_box_button_down').css({
				'visibility' : 'hidden'
				});
			}
			function qtyDown(){
				var qty_el = document.getElementById('qty');
				var qty = qty_el.value;
				if( qty == 2) {
				jQuery('.quantity_box_button_down').css({
					'visibility' : 'hidden'
				});
				}
				if( !isNaN( qty ) && qty > 0 ){
				qty_el.value--;
				}
				return false;
			}

			function qtyUp(){
				var qty_el = document.getElementById('qty');
				var qty = qty_el.value;
				if( !isNaN( qty )) {
				qty_el.value++;
				}
				jQuery('.quantity_box_button_down').css({
				'visibility' : 'visible'
				});
				return false;
			}
		</script>
																			

<ul class="add-to-links clearfix">
		<form action='../add' method='POST' style="display:none" id="add_cart">
			<input type="hidden" name='nombre' value="<?=$base['title']?>">
			<input type="hidden" name='image' value="<?=$imageSmall|$imageLarge?>">
			<input type="hidden" name='price'  value="<?=$base['price']?>">
			<input type="hidden" name='weight'  value="<?=$weight?>">
			<input type="hidden" name='sku'  value="<?=$ASIN?>">
			<input type="hidden" name='description'  value="<?=$description?>">
			<input type="hidden" name='short_description'  value="<?=$description?>">
			<li><button href="javascript:add_cart()"  class="link-wishlist AjaxKit-Singlton-Click" title="Add to wishlist"><i class="meigee-fa-heart"></i></button></li>
			<li><button href="javascript:add_cart();"  class="link-compare AjaxKit-Singlton-Click" title="Add to compare"><i class="meigee-fa-exchange"></i></button></li>
            <li class="email-friend"><a href="javascript:void();"><i class="meigee-fa-envelope-o"></i></a></li>
    	</form>
</ul>
								</div>
																																				<div class="product-custom">
<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/EIL5DcDc3Zh.js?version=42#channel=f2f2d67f770e8f4&amp;origin=http%3A%2F%2Fwww.tushopusa.com" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/EIL5DcDc3Zh.js?version=42#channel=f2f2d67f770e8f4&amp;origin=http%3A%2F%2Fwww.tushopusa.com" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-like fb_iframe_widget" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=517&amp;href=http%3A%2F%2Fwww.tushopusa.com%2Findex.php%2Fmi-product-a.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=450"><span style="vertical-align: bottom; width: 62px; height: 20px;"><iframe name="f139a34071ef82" width="450px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FEIL5DcDc3Zh.js%3Fversion%3D42%23cb%3Dfd858e1fcdbb1c%26domain%3Dwww.tushopusa.com%26origin%3Dhttp%253A%252F%252Fwww.tushopusa.com%252Ff2f2d67f770e8f4%26relation%3Dparent.parent&amp;container_width=517&amp;href=http%3A%2F%2Fwww.tushopusa.com%2Findex.php%2Fmi-product-a.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=450" style="border: none; visibility: visible; width: 62px; height: 20px;" class=""></iframe></span></div>
<iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 70px; height: 20px;" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.c535a95e8a24202b16a5c12c5085d8db.es.html#dnt=false&amp;id=twitter-widget-0&amp;lang=es&amp;original_referer=http%3A%2F%2Fwww.tushopusa.com%2Findex.php%2Fmi-product-a.html&amp;size=m&amp;text=mi%20product%20a&amp;time=1528411585511&amp;type=share&amp;url=http%3A%2F%2Fwww.tushopusa.com%2Findex.php%2Fmi-product-a.html&amp;via=meigeeteam"></iframe>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<div style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;" id="___plusone_0"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1528411585468" name="I0_1528411585468" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Fwww.tushopusa.com&amp;url=http%3A%2F%2Fwww.tushopusa.com%2Findex.php%2Fmi-product-a.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.es_419.AAgVfh-J7z8.O%2Fm%3D__features__%2Fam%3DQQE%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPylR1_BloCWm42pVfTFShFgAwY1A#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1528411585468&amp;_gfid=I0_1528411585468&amp;parent=http%3A%2F%2Fwww.tushopusa.com&amp;pfname=&amp;rpctoken=10997834" data-gapiattached="true" title="G+"></iframe></div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>															
							
												</div>
					</div>
									</div>

			</div>
							<div class="product-sidebar sidebar col-sm-3">
					<div class="sidebar-inner">
											</div>
				</div>
					</div>
		    <script type="text/javascript">
    //<![CDATA[
        var productAddToCartForm = new VarienForm('product_addtocart_form');
        productAddToCartForm.submit = function(button, url) {
            if (this.validator.validate()) {
                var form = this.form;
                var oldUrl = form.action;
                if (url) {
                   form.action = url;
                }
                var e = null;
                try {
                    this.form.submit();
                } catch (e) {
                }
                this.form.action = oldUrl;
                if (e) {
                    throw e;
                }
                if (button && button != 'undefined') {
                    button.disabled = true;
                }
            }
        }.bind(productAddToCartForm);
        productAddToCartForm.submitLight = function(button, url){
            if(this.validator) {
                var nv = Validation.methods;
                delete Validation.methods['required-entry'];
                delete Validation.methods['validate-one-required'];
                delete Validation.methods['validate-one-required-by-name'];
                // Remove custom datetime validators
                for (var methodName in Validation.methods) {
                    if (methodName.match(/^validate-datetime-.*/i)) {
                        delete Validation.methods[methodName];
                    }
                }
                if (this.validator.validate()) {
                    if (url) {
                        this.form.action = url;
                    }
                    this.form.submit();
                }
                Object.extend(Validation.methods, nv);
            }
        }.bind(productAddToCartForm);
    //]]>
    </script>
    </div>
				<div class="product-collateral">
				<div id="tabs" role="tabpanel">
	<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class=" active first"><a href="#product_tabs_description" aria-controls="product_tabs_description" role="tab" data-toggle="tab">Descripción</a></li>
													<li role="presentation" class=""><a href="#product_tabs_product_tags" aria-controls="product_tabs_product_tags" role="tab" data-toggle="tab">Etiquetas de Producto</a></li>
								</ul>
	<div class="tab-content">
						<div class="tab-pane fade active first in" id="product_tabs_description" role="tabpanel">    <h2>Detalles</h2>
    <div class="std"><?=$description?></div>
</div>
													<div class="tab-pane fade" id="product_tabs_product_tags" role="tabpanel"><div class="box-collateral box-tags">
    <h2>Etiquetas de Producto</h2>
            <form id="addTagForm" action="http://www.tushopusa.com/index.php/tag/index/save/product/7/uenc/aHR0cDovL3R1c2hvcGNvbG9tYmlhLmNvbS9pbmRleC5waHAvbWktcHJvZHVjdC1hLmh0bWw,/" method="get">
        <div class="form-add">
            <label for="productTagName">Agregar Tus Etiquetas:</label>
            <div class="input-box input-group">
                <input type="text" class="form-control required-entry" name="productTagName" id="productTagName">
                <span class="input-group-btn">
                    <button type="button" title="Agregar Etiquetas" class="btn btn-default" onclick="submitTagForm()">
                        <span>
                            <span>Agregar Etiquetas</span>
                        </span>
                    </button>
                </span>
            </div>
        </div>
    </form>
    <p class="note">Use espacios para separar las etiquetas. Use comillas simples (') por frase.</p>
    <script type="text/javascript">
    //<![CDATA[
        var addTagFormJs = new VarienForm('addTagForm');
        function submitTagForm(){
            if(addTagFormJs.validator.validate()) {
                addTagFormJs.form.submit();
            }
        }
    //]]>
    </script>
</div>
</div>
								</div>
</div>
			</div>
				<div id="reviews-link"></div>

				<div class="box-collateral box-reviews row clearfix" id="customer-reviews">
    	<div class="col-md-4 pull-left">
		<div class="form-add">
	<div class="block-title">
		<h2>Comentarios</h2>
	</div>
		<form action="http://www.tushopusa.com/index.php/review/product/post/id/7/" method="post" id="review-form">
		<input name="form_key" type="hidden" value="epvJnHVqaAwxeyyA">
		<fieldset>
			<div class="rating-block">
				<div class="top-block">
					<h2>Escribe tu propia reseña</h2>
										<h3>You're reviewing: <span><?=$base['title']?></span></h3>
									</div>
												</div>
			<div class="rating-inputs">
                <ul class="form-list">
                    <li>
						<label for="nickname_field" class="required"><em>*</em>Apodo</label>
						<div class="input-box">
							<input type="text" name="nickname" id="nickname_field" class="form-control required-entry" value="Nombre" onblur="if (this.value=='') this.value = 'Nombre'" onfocus="if (this.value=='Nombre') this.value = ''">
						</div>
                    </li>
					<li>
						<label for="summary_field" class="required"><em>*</em>Resumen de su reseña</label>
						<div class="input-box">
							<input type="text" name="title" id="summary_field" class="form-control required-entry" value="Summary" onblur="if (this.value=='') this.value = 'Summary'" onfocus="if (this.value=='Summary') this.value = ''">
						</div>
					</li>
                    <li>
                        <label for="review_field" class="required"><em>*</em>Reseña</label>
                        <div class="input-box">
                            <textarea name="detail" id="review_field" cols="5" rows="3" class="required-entry form-control" onblur="if (this.value=='') this.value = 'Reseña'" onfocus="if (this.value=='Reseña') this.value = ''">Reseña</textarea>
                        </div>
                    </li>
                </ul>
				 <div class="buttons-set">
					<button type="submit" title="Enviar reseña" class="btn btn-default"><span><span>Enviar reseña</span></span></button>
				</div>
			</div>
            </fieldset>
    </form>
    <script type="text/javascript">
    //<![CDATA[
        var dataForm = new VarienForm('review-form');
        Validation.addAllThese(
        [
               ['validate-rating', 'Por favor seleccione una por una de las calificaciones de arriba', function(v) {
                    var trs = $('product-review-table').select('div.stars-wrapper');
                    var inputs;
                    var error = 1;
                    for( var j=0; j < trs.length; j++ ) {
                        var tr = trs[j];
                        if( j > 0 ) {
                            inputs = tr.select('input');
                            for( i in inputs ) {
                                if( inputs[i].checked == true ) {
                                    error = 0;
                                }
                            }

                            if( error == 1 ) {
                                return false;
                            } else {
                                error = 1;
                            }
                        }
                    }
                    return true;
                }]
        ]
        );
    //]]>

		function reviewMouse(){
			jQuery('#product-review-table .value i').on('mouseover, mouseout', function(){
				thisElement = jQuery(this);
				if(thisElement.parents('.stars-wrapper').find('i.checked').length == 0){
					thisElement.parents('.stars-wrapper').find('i').removeClass('active');
				} else {
					thisElement.parents('.stars-wrapper').find('i.checked').parent().prevAll().children('i').addClass('active');
					thisElement.parents('.stars-wrapper').find('i.checked').parent().nextAll().children('i').removeClass('active');
				}
			});
		}
		jQuery('#product-review-table .value i').hover(
			function(){
				reviewMouse();
				thisElement = jQuery(this);
				thisElement.addClass('active')
				.parents('.value').prevAll('.value').children('i').addClass('active');
			},
			function(){
				reviewMouse();
				thisElement = jQuery(this);
				thisElement.removeClass('active')
				.parents('.value').nextAll('.value').children('i').removeClass('active');
			}
		);
		jQuery('#product-review-table .value i').on('click', function(){
			jQuery(this).parents('.stars-wrapper').find('input.radio').attr('checked', false);
			jQuery(this).parents('.stars-wrapper').find('i').removeClass('checked');
			jQuery(this).addClass('checked').next('input.radio').prop('checked', true)
			.parent().prevAll().children('i').addClass('active');
            thisIndex = jQuery(this).data('index');
			jQuery(this).parents('.item').find('.rating-values span').text(thisIndex);
		});
		jQuery('#product-review-table .stars-wrapper').on('mouseout', function(){
			thisElement = jQuery(this);
			thisElement.find('i.checked').addClass('active').parent().prevAll().children('i').addClass('active');
		});
    </script>
    </div>
	</div>
</div>
			</div>
	</div>

<script type="text/javascript">
    var lifetime = 3600;
    var expireAt = Mage.Cookies.expires;
    if (lifetime > 0) {
        expireAt = new Date();
        expireAt.setTime(expireAt.getTime() + lifetime * 1000);
    }
    Mage.Cookies.set('external_no_cache', 1, expireAt);
</script>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer id="footer">
	<div class="footer-top">
	<div class="container">
		<div class="footer-text-block-wrapper">
			<div class="text-block">
				<div class="media-left"><span class="compo-icon rectangle"></span></div>
				<div class="media-body">
					<p>Aceptamos todas<br>Tarjetas de Crédito/Débito</p>
				</div>
			</div>
			<hr class="indent-18 white-space visible-xs">
			<div class="text-block">
				<div class="media-left"><span class="compo-icon open"></span></div>
				<div class="media-body">
					<p>Lun - Sab 8.00 - 18.00<br><span class="closed">Dominfo CERRADO</span></p>
				</div>
			</div>
			<hr class="indent-18 white-space visible-xs">
			<div class="text-block">
				<div class="media-left"><span class="compo-icon ellipse"></span></div>
				<div class="media-body">
					<p>Tiene Consultas?<br>Llamar: <a href="skype:18004961779?chat" class="skincolor">1-800-496-1779</a></p>
				</div>
			</div>
			<hr class="indent-18 white-space visible-xs">
			<div class="text-block">
				<div class="media-left"><span class="compo-icon change"></span></div>
				<div class="media-body">
					<p>Ahorre su dinero con<br>Ofertas Semanales</p>
				</div>
			</div>
			<hr class="indent-18 white-space visible-xs">
			<div class="text-block">
				<div class="media-left"><span class="compo-icon bag"></span></div>
				<div class="media-body">
					<p>Su Productos con<br>hasta su manos</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-bottom">
	<div class="container">
		<div class="footer-links-wrapper">
			<ul class="horizontal-links clearfix">
				<li><a href="http://www.tushopusa.com/index.php/somos/">Somos</a></li>
				<li><a href="http://www.tushopusa.com/index.php/customer-service/">Servico al Cliente</a></li>
				<li><a href="http://www.tushopusa.com/index.php/politicas-privacidad/">Políticas de Privacidad</a></li>
				<li><a href="http://www.tushopusa.com/index.php/catalog/seo_sitemap/category/">Site Map </a></li>
				<li><a href="http://www.tushopusa.com/index.php/checkout/">Carrito</a></li>
				<li><a href="http://www.tushopusa.com/index.php/contacts/">Contáctenos</a></li>
			</ul>
		</div>
		<hr class="indent-9 white-space">
		<div class="copyrights-block clearfix">
			<div class="copyright">
				<address>@Todos los Derechos Reservado a TuShop 2018</address>
			</div>
			<hr class="indent-18 white-space visible-xs">
			<div class="store-switcher-wrapper text-right">
				
			</div>
		</div>
	</div>
</div>
</footer>
		<div id="toolbar-loading">
	<div class="spinner">
		<div class="spinner-container container1">
			<div class="circle1"></div>
			<div class="circle2"></div>
			<div class="circle3"></div>
			<div class="circle4"></div>
		</div>
		<div class="spinner-container container2">
			<div class="circle1"></div>
			<div class="circle2"></div>
			<div class="circle3"></div>
			<div class="circle4"></div>
		</div>
		<div class="spinner-container container3">
			<div class="circle1"></div>
			<div class="circle2"></div>
			<div class="circle3"></div>
			<div class="circle4"></div>
		</div>
	</div>
</div>
			

<div class="Growler" id="Growler" style="position: fixed; padding: 10px; width: 250px; z-index: 50000; top: 0px; right: 0px;"></div>
<iframe scrolling="no" frameborder="0" allowtransparency="true" src="https://platform.twitter.com/widgets/widget_iframe.c535a95e8a24202b16a5c12c5085d8db.html?origin=http%3A%2F%2Fwww.tushopusa.com&amp;settingsEndpoint=https%3A%2F%2Fsyndication.twitter.com%2Fsettings" title="Twitter settings iframe" style="display: none;"></iframe>
<iframe name="oauth2relay570578401" id="oauth2relay570578401" src="https://accounts.google.com/o/oauth2/postmessageRelay?parent=http%3A%2F%2Fwww.tushopusa.com&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.es_419.AAgVfh-J7z8.O%2Fm%3D__features__%2Fam%3DQQE%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPylR1_BloCWm42pVfTFShFgAwY1A#rpctoken=738028234&amp;forcesecure=1" tabindex="-1" aria-hidden="true" style="width: 1px; height: 1px; position: absolute; top: -100px;"></iframe><iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;" title="Twitter analytics iframe"></iframe>
<a href="#" id="toTop" style="display: none;"><span id="toTopHover"><i class="meigee-arrow-up"></i></span></a>
</body>


<script>
function add_cart()
{
    document.getElementById('toolbar-loading').style.display = "block";
	var http=new XMLHttpRequest();

	http.open("POST", "http://www.tushopusa.com/amazon/index/add", true);
	http.addEventListener('load',show,false);
	
	var data=new FormData();
	data_in=document.getElementById('add_cart');
	if(data_in!=null)
		for(var t=0;t<data_in.elements.length;t++)		
			data.append(data_in.elements[t].name, data_in.elements[t].value);
	http.send(data);        
	function show()
	{go_cart(http.response);}
}

function go_cart(url)
{
	var http=new XMLHttpRequest();

	http.open("GET", url, true);
	http.addEventListener('load',show,false);
	http.send();        
	function show()
	{	location.href="http://www.tushopusa.com/index.php/checkout/cart/";}
}
</script>
</html>


