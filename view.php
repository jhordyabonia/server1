<!DOCTYPE html>

<html lang="en">

<!-- To get this extension Amazon contact us = devzendcode@gmail.com -->

<!-- start of head tag -->

<head>

    <meta charset="UTF-8">

    <title>Real Estate</title>

   	<meta http-equiv="X-UA-Compatible" content="IE=Edge" >

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

	<!--[if IE]>-

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

	<![endif]-->

        <!-- Main CSS file -->

        <!--<link rel="stylesheet" href="http://tushopcolombia.com/skin/frontend/base/default/css/bootstrap.min.css" />

       

        <link rel="stylesheet" href="http://tushopcolombia.com/skin/frontend/base/default/css/font-awesome.css" />

        

        <link rel="stylesheet" href="http://tushopcolombia.com/skin/frontend/base/default/css/owl.carousel.css" />

        <link rel="stylesheet" href="http://tushopcolombia.com/skin/frontend/base/default/css/animate.css">

        <link rel="stylesheet" href="http://tushopcolombia.com/skin/frontend/base/default/css/bootstrap-select.css"> 

<!-- 		<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/media/css/2501e6afd99b49a7e8c6167c745f24eb.css" media="all">

		

<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/media/css/2501e6afd99b49a7e8c6167c745f24eb.css" media="all"> -->



<script type="text/javascript" src="http://tushopcolombia.com/skin/frontend/base/default/js/slider-1.js"></script>

<!-- Latest compiled and minified CSS -->





		

		<!--<script type="text/javascript" src="js/jquery-1.12.3.js"></script>--><!-- jQuery -->

		<script type="text/javascript" src="http://tushopcolombia.com/skin/frontend/base/default/js/jquery-1.9.1.min.js"></script>

        <script type="text/javascript" src="http://tushopcolombia.com/skin/frontend/base/default/js/bootstrap.min.js"></script><!-- Bootstrap -->

        <script type="text/javascript" src="http://tushopcolombia.com/skin/frontend/base/default/js/owl.carousel.js"></script><!-- jQuery -->



	<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/amconf/css/amconf.css" media="all">

	<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/amconf/css/lightbox.css" media="all">

	<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/amconf/css/zoomer.css" media="all">

	<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/amconf/css/tooltipster.css" media="all">

	<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/amconf/css/bubleTooltip.css" media="all">

	<link rel="stylesheet" type="text/css" href="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/plugins/fancybox/jquery.fancybox.css" media="all">

		

 <style>
            body { margin: 0; }
            #shade, #modal { display: none; }
            #shade { position: fixed; z-index: 100; top: 0; left: 0; width: 100%; height: 100%; }
            #modal { background: #fff; position: fixed; z-index: 101; top: 33%; left: 39%; width: 30%; }
            #shade { background: #364146; opacity: 0.5; filter: alpha(opacity=50); }
        </style>
</head>

<!-- end of head tag -->

<!-- starting body -->

<body>

<br>

<div id="content" style="background-color: #fff; padding-top: 10px;">

<div id="shade"></div>
        <div id="modal" class="popup-content" >
              <div class="popup-added-product-list">
                    <div style="    background-color: #5f2728; color: #fff;" class="popup-text success-msg">
        Producto Añadido al Carrito de Compras.    </div>
         <div style="text-align: center;"  role="alert">
         
         <p style="color: #000;"><span style="    color: green;" class="glyphicon glyphicon-ok"></span> Su producto fue Añadido al Carrito de compras satisfactoriamente, Actualizando....<!-- <a href="#" onClick="window.location.reload()" class="btn btn-primary type-2 AjaxKit-addtocart-link validation-passed" >
         <span class="glyphicon glyphicon-shopping-cart"></span> Continuar Comprando</a> 
         <a href="https://telocomproenusa.com/gt/index.php/checkout/cart/" class="btn btn-primary type-2 AjaxKit-addtocart-link validation-passed"><span class="glyphicon glyphicon-arrow-right"></span> Ver Total </a> --></p>
         </div>
 </div>
        </div>

<div class="container">

<div id="loading" class="form-group col-sm-12" style="display: none; position:fixed; z-index:999;">					

	<img src="" />

</div>



<?php $restults =null;// $this->getProductInfo(); 

		if(!empty($restults)) {

		foreach($restults as $product) {	

	    //Mage::log("product:".print_r($product,true));

	?>

	<input type="hidden" id="parent_asin" value="<?php echo $product['asin'] ?>" />

	<input type="hidden" id="variation_asin" name="" />

	<input type="hidden" id="variation_price" name="" />

	<div class="product-img-box col-xs-12  col-lg-5 col-sm-5">

                <div style="display: none;" class="product-name">

                    <h1><?php echo $product['title'] ?></h1>

                </div>

<!-- custom slider -->



<div class="product-img-box">

<script type="text/javascript" src="http://tushopcolombia.com/skin/frontend/base/default/js/amasty/amconf/zoomer.js"></script>

<div class="product-image" style="     min-height: 400px;">

<img id="amasty_zoom" class="img-responsive" src="<?php echo $product['image'] ?>" data-zoom-image="<?php echo $product['image'] ?>" alt=<?php echo $product['title'] ?> title=<?php echo $product['title'] ?> zoom-alt=<?php echo $product['title'] ?>style="max-height: 500px;    margin: 0 auto;" ></div>



<br/>



<div class="more-views">



<div style="position: relative;">

<div class="caroufredsel_wrapper" id="amasty_gallery" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 172px; height: 75px; margin: 0px; overflow: hidden; cursor: move;"><!--<div id="amasty_gallery" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; z-index: auto; width: 10224px; height: 21px;"> -->



<?php foreach($product['variations'] as $variations){ ?>	

<a id="varimg_<?php echo $variations['asin'] ?>" rel="group" title="" data-image="<?php echo $variations[image] ?>" data-zoom-image="<?php echo $variations[image] ?>" style="">

<img src="<?php echo $variations[image] ?>" alt="" title="" width="52" height="52">

</a>

<?php }?>



<?php if(isset($product['gal_imgs'])){ ?>

	<?php foreach($product['gal_imgs'] as $galimg) { ?>

		<a id="gallary_<?php echo $variations['asin'] ?>" rel="group" title="" data-image="<?php echo $galimg ?>" data-zoom-image="<?php echo $galimg ?>" style="">

		<img src="<?php echo $galimg ?>" alt="" title="" width="72" height="72">

		</a>

	<?php } ?>

<?php } ?>



</div>

<div id="prevGallery" style="top: 19px; display: block;" class="MagicScrollArrows MagicScrollArrowPrev"></div>

<div id="nextGallery" style="top: 19px; display: block;" class="MagicScrollArrows MagicScrollArrowNext"></div>

<div id="ampagination" style="margin-top: 10px; display: block;" class=""><a href="#"><span>1</span></a><a href="#"><span>2</span></a><a href="#" class=""><span>3</span></a><a href="#" class=""><span>4</span></a><a href="#" class=""><span>5</span></a></div>

</div>

</div>

<script type="text/javascript">

try {

AmZoomerObj = new AmZoomer({"general":{"zoom_enable":"1","lightbox_enable":"1","carousel_enable":"1","change_image":"mouseover touchstart","thumbnail_lignhtbox":"0"},"zoom":{"zoomType":"lens","responsive":true,"preloading":"1","loadingIcon":"https:\/\/tiendanuestra.com\/desarrollo\/skin\/frontend\/base\/default\/js\/amasty\/amconf\/images\/preloader.gif","labelDisplay":false,"lensShape":"round","lensSize":"200","borderSize":1,"zoomWindowFadeIn":500,"zoomWindowFadeOut":500,"lensFadeIn":630,"easing":true,"scrollZoom":true,"gallery":"amasty_gallery","cursor":"pointer","galleryActiveClass":"active","imageCrossfade":false},"lightbox":{"loop":1,"prevEffect":"fade","nextEffect":"fade","helpers":{"title":{"type":"float"},"thumbs":{"width":50,"height":50}}},"carousel":{"items":3,"circular":true,"height":72,"prev":{"button":"#prevGallery","key":"left"},"next":{"button":"#nextGallery","key":"right"},"auto":true,"swipe":{"onTouch":true,"onMouse":true},"pagination":"#ampagination","responsive":false,"infinite":false}});

AmZoomerObj.loadCarousel();

}

catch(ex){console.debug(ex);}

</script>                                </div>	

		

<!-- custom slider -->	

	

    </div>	 

    <div class="product-name secondary" itemprop="name">

	                    <h3><?php echo $product['title'] ?></h3>

	                </div>

	                <hr>	<!-- HR despues del titulo-->
	<div class="col-xs-12 col-lg-4 col-sm-4">

	            <div class="product-shop">



	          <?php 

$comillas = "'";

 $revision = '<div style="display:table-cell"> | <a href="#" class="ajaxkit-login-submit-form btn btn-primary type-2" style="color: #000; padding: 5px; margin-bottom: 5px;
    background-color: #fff;" onClick="MyWindow=window.open('.$comillas.$product['revision'].$comillas.','.$comillas.'MyWindow'.$comillas.',width=600,height=300); return false;"><span class="glyphicon glyphicon-ok"></span> Ver Opiniones de producto.</a></div>';

 ?>

	                
	                <span><div class="ratings clearfix" style="    display: table-cell;vertical-align: middle;" >
<div class="rating-box" style="width:<?php $estrellas = rand(70,100); echo $estrellas;?>px;">
<i class="star">★</i><i class="star">★</i><i class="star">★</i><i class="star">★</i><i class="star">★</i>

<div class="rating" style="width:<?php $estrellas = rand(70,100); echo $estrellas;?>px;">
<i class="star">★</i><i class="star">★</i><i class="star">★</i><i class="star">★</i><i class="star">★</i>
</div></div></div>  <?php echo  $revision;  ?></span> <br>

	                <?php 

//  if ($product['prime'] == '1') {

//                			$prime = '<span style="font-weight: 400; color: #0365b2;    padding: 10px;"><img src="http://tushopcolombia.com/skin/frontend/puntero.png" alt=""> Este Producto demora en llegar a Guatemala 5 días habiles.</span>';
//                			$xpress = '<img class="prime" src="https://telocomproenusa.com/images/quick.png" alt="">';

//                			$notice = " ";
//                  			echo $prime;

//                 			 }
//                  			 else{

//                 				echo  $prime = '<span style="font-weight: 400; color: #025a02;    padding: 10px;"> <span class="glyphicon glyphicon-send"></span> Este Producto demora en llegar a Guatemala 15 - 20 días.</span >';
//                 				$xpress = " ";
//                 				$notice = '<div class="alert alert-warning">
//   <strong style="color:red">ESTE PRODUCTO TIENE UNA DEMORA APROXIMADA DE 20 A 25 DÍAS HÁBILES Y NO TIENE DEVOLUCIÓN!</strong>
// </div>';
//                  			 } 

	                 ?>

	                 <?php echo $var ?>

	                

 <?php echo $xpress; ?> <p class="availability in-stock"><span itemprop="availability">En existencia</span></p>

                <div class="clear"></div>

				<?php 

					if(isset($product['no_var_attr']))

					$product['no_var_attr'] = $product['no_var_attr'];

					else

					$product['no_var_attr'] = 0;

				?>

				<?php $keys = array_keys($product['variartion_attributes']) ?>

				<?php $index=0; foreach($keys as $key){ ?>



					<div class="product-options" id="product-options-wrapper">

						<dl class="last">

							<dt style="    padding: 0;"><label id="<?php echo $key ?>" class="required"><em>*</em><?php echo $key ?></label></dt>

							<dd class="last">

								<div class="input-box">

									<select style="color: #0a4894;" name="<?php echo strtolower($key) ?>" id="myattribute_<?php echo strtolower($key) ?>" class="required-entry super-attribute-select dropdown form-control" onchange="attributeValues(<?php echo $index ?>,<?php echo $product['no_var_attr'] ?>)" >

									<option value="">Escoge una opción...</option>

									<?php foreach($product['variartion_attributes'][$key] as $variation){ ?>

									<option class="" value="<?php echo $variation ?>" price="0" data-label="blue"><?php echo $variation ?></option><?php } ?></select>

								</div>

							</dd>

						</dl>

					</div>

				<?php $index++; }?>

	<div class="descripcion ">
<?php 
//$asin = $product['asin'];
echo '<span><b>SKU : '.$product['asin'].'</b></span><br><br>'; ?>
<?php
$api_key = 'AIzaSyDKqtlwUKnn7kJeTZrDfOc63EU6OTYLyiU';
$text = $product['shortdesc'];
$source="en";
$target="es";
$url = 'https://www.googleapis.com/language/translate/v2?key=' . $api_key . '&q=' . rawurlencode($text);
$url .= '&target='.$target;
$url .= '&source='.$source;
 
$response = file_get_contents($url);
$obj =json_decode($response,true); //true converts stdClass to associative array.
if($obj != null)
{
    if(isset($obj['error']))
    {
        echo "Error is : ".$obj['error']['message'];
    }
    else
    {
        echo '<span style="    font-size: 20px!important;color:#000!important;" class="titulo"> Descripción Rápida: </span>'.$obj['data']['translations'][0]['translatedText'];
    }
}
else
    echo $product['shortdesc'];
		  //echo "<br>".$revision;
?>	

					</div>	</div>		</div>
<div class="clearfix visible-xs"></div>
				<div class="col-lg-3 col-sm-3 col-xs-12 box">
				<!--<img class="img-responsive" src="http://tushopcolombia.com/payment.png" alt="">-->
				<div class="pricingTable">
				<div class="pricingTable-header">
				<span class="heading">
                                           
                   
	                <?php if ($product['price'] == 0){ 

	                //	if ($product['weight']== 0){

	               // 	if (empty($product['weight'])){
	                	?>

	                <style>

	                .bcheck{

	                	display: none;

	                } 



	                </style>	


	                <?php }//}} 

		// $vpeso = $product['weight'] ;
		// $rnopeso =  " ";

		// 		if (empty($vpeso)){ ?>
			                <?php if ($product['offer_price'] == 0){ 

	                //	if ($product['weight']== 0){

	               // 	if (empty($product['weight'])){
	                	?>

	                <style>

	                .bcheck{

	                	display: none;

	                } 



	                </style>	


	                <?php }//}} 

		// $vpeso = $product['weight'] ;
		// $rnopeso =  " ";

		// 		if (empty($vpeso)){ ?>
             	
     

				   <?php 

		// 			   $rnopeso = "Lo sentimos, peso no disponible";

		// 			    }  ?>




                    <div class="price-info" itemprop="price">

						<div class="price-box">

                                <span class="regular-price" id="product-price-23">

								<span style="display: none" id="regpricerate" class="price" ></span>

	<?php 

								 $currencies = Mage::app()->getLocale()->currency(Mage::app()->getStore()->getCurrentCurrencyCode())->getSymbol();



								 $local = Mage::app()->getStore()->getCurrentCurrencyRate();

								 ?>

                                <span class="price" ><strong> <h4 style="margin: 0; font-size: 22px">Precio:</h4> <?php echo  $currencies; ?></strong> <span id="pricerate"><?php echo number_format($product['price']*$local, 0, ',', '.');  ?></span></span></span>            

						</div>	                    

	                </div>  
</span></div>
				 <div class="pricingContent">

				
<ul>
<li id="pesonodis"><?php echo $rnopeso; ?></li>
<li style="display: none">
<?php $per = $product['price']*$local ?>
	Impuesto USA 7%: <span style="color: #880d0b" id="gadmin"> <?php echo  $currencies; ?><?php echo number_format($per*7/100,2,',','.') ?> </span>
</li>
<li style="display: none">
<?php 
$cp = $product['weight']*$local;

 ?>
	Envio a Guatemala: <span id="peso"><?php echo  $currencies; ?><?php echo number_format($cp*6,2,',','.'); ?></span>
</li>	
		<li style=" display: none;">

				<!--	<div class="price-box">

							<span class="regular-price" id="product-price-23_clone">

							<span class="price">Price: $<?php //echo $product['price'] ?><!--</span></span>

										

					</div>-->



					<div class="add-to-cart">

					<div style="    text-align: center; " class="qty-wrapper">



							<label style="    color: black;" for="qty">Cantidad:</label>

							<input pattern="\d*" name="qty" id="textbox_id" id="qty" maxlength="12" value="<?php echo $product['qty'] ?>" title="Qty" class="form-control qty" type="number">

							<?php // echo '<span>SKU : '.$asin.'</span>'; ?>

						</div></li>	<br>

						<?php if($keys) {  

						//Mage::log("variation addtocart checking...");?>
						<div class="add-to-cart-buttons">

							<!--<button type="button" title="Add to Cart" class="button btn-cart" onclick="productAddToCartForm.submit(this)"><span><span>Add to Cart</span></span></button>-->

							<div id="mjscart" class="alert alert-info">

							  <strong>Por favor </strong>selección su opción!

							</div>

							<button id="addtocart" style="display:none; width:100% ;      text-transform: capitalize;   border-radius: 5px;   color: #fff;   background-color:#f2766b; font-size: 22px; " type="button" class="btn btn-primary"  title="Continuar" onclick="variationAddtoCart()"><i class="icon-basket" title="Shopping Cart"></i>Comprar Ahora</button> 
								<hr>
							<button id="addtocart2" style="display:none; width:100% ;     text-transform: capitalize;   color: #fff; border-radius: 5px;  background-color:#333; font-size: 22px;" type="button" class="btn btn-primary "  title="Añadir al Carrito" onclick="vAddtoCart()">Añadir Carrito</button> 

						</div>

						<?php } else {  ?>

						<div class="add-to-cart-buttons">

							<!--<button type="button" title="Add to Cart" class="button btn-cart" onclick="productAddToCartForm.submit(this)"><span><span>Add to Cart</span></span></button>-->



							<button type="button" id="bcheck" class="btn btn-lg " style=" width:100% ;      border-radius: 5px;  color: #fff;   background-color: #f2766b;font-size: 22px;    text-transform: capitalize;" title="Comprar Ahora" onclick="productAddtoCart('<?php echo $product['asin'] ?>','<?php echo $product['price'] ?>')"></span>Comprar Ahora</button> 
						<hr>    
							<button type="button" id="bcheck" style="width:100% ;     text-transform: capitalize;background-color: #333; color: #fff"; class="btn btn-lg btn-block2 bcheck" title="Añadir al Carrito" onclick="pAddtoCart('<?php echo $product['asin'] ?>','<?php echo $product['price'] ?>')"></span>Añadir al Carrito</button> 

						</div>												

						<?php  } ?>

					</div>
	
</ul>


				</div>

<?php echo $notice; ?>
	                

	            </div></div>



	            <div class="add-to-cart-wrapper">

	            </div>



	            <div class="clear"></div>

				



			<script type="text/javascript">



				var variations = JSON.parse('<?php echo json_encode($product["variations"]) ?>');

				var var_attri = JSON.parse('<?php echo json_encode($product["var_attri"]) ?>');

				var var_titles = JSON.parse('<?php echo json_encode($keys) ?>');

				//alert(JSON.stringify(variations));

				//alert(JSON.stringify(var_attri));

				//alert(JSON.stringify(var_attri[var_titles[0]]["Toddler Girls"]["3T"][0]));

				//alert(JSON.stringify(Object.keys(var_attri[var_titles[0]]["Toddler Girls"])));



				function attributeValues(index,no_of_dropdwns) {

					

					//alert("index ..."+index);

					//alert("no_of_dropdwns ..."+no_of_dropdwns);

					

					document.getElementById('addtocart').style.display = "none";
					document.getElementById('addtocart2').style.display = "none";

					document.getElementById("regpricerate").style.display = "none";

					var selectdropdowns = document.getElementsByClassName("super-attribute-select");

					var selectdropdownslength = selectdropdowns.length;

					//alert(variations.length);

					

					var x;

					for (x = 0; x < selectdropdowns.length; x++) {

						var element = selectdropdowns[x];

						var name = element.name;

						name = name.toLowerCase();

						var selectvalue = element.value;

						

						if(no_of_dropdwns == 2){

							if(index == 0){

								//alert("values ..."+var_attri[var_titles[0]][selectvalue]);

								if(var_attri[var_titles[0]][selectvalue]){

									var options = '';

									options +='<option value="">'+'Escoge una opción...'+'</option>';

									for(var opn=0;opn<var_attri[var_titles[0]][selectvalue].length;opn++) {

										options +='<option value="'+var_attri[var_titles[0]][selectvalue][opn]+'">'+var_attri[var_titles[0]][selectvalue][opn]+'</option>';

									}

									document.getElementById('myattribute_'+var_titles[1].toLowerCase()).innerHTML = options;

								}

							}

						}

						if(no_of_dropdwns == 3){

							if(index == 0){

								if(var_attri[var_titles[0]][selectvalue]){

									var sec_dd_vals = Object.keys(var_attri[var_titles[0]][selectvalue]);

									//alert("sec_dd_vals"+sec_dd_vals);

									var options = '';

									options +='<option value="">'+'Escoge una opción...'+'</option>';

									for(var opn=0;opn<sec_dd_vals.length;opn++) {

										options +='<option value="'+sec_dd_vals[opn]+'">'+sec_dd_vals[opn]+'</option>';

									}

									document.getElementById('myattribute_'+var_titles[1].toLowerCase()).innerHTML = options;

								}

							}

							if(index == 1){

								var first_dd_slctval = selectdropdowns[0].value;

								var second_dd_slctval = selectdropdowns[1].value;

								var third_dd_vals = var_attri[var_titles[0]][first_dd_slctval][second_dd_slctval][0];

								//alert("3rd dd ...:"+JSON.stringify(third_dd_vals));

								if(third_dd_vals){

									var options = '';

									options +='<option value="">'+'Escoge una opción ...'+'</option>';

									for(var opn=0;opn<third_dd_vals.length;opn++) {

										options +='<option value="'+third_dd_vals[opn]+'">'+third_dd_vals[opn]+'param</option>';

									}

									document.getElementById('myattribute_'+var_titles[2].toLowerCase()).innerHTML = options;

									

								}

							}

							if(index == 2){

								//alert("index in loop"+index);

							}

						}

						

						

					}

					

					for(var i=0;i<variations.length;i++) {

						

						var variation = variations[i];

						//alert(JSON.stringify(variation));

						var found = true;

						for(key in variation) {

								

								var j;

								for (j = 0; j < selectdropdowns.length; j++) {

									var element = selectdropdowns[j];

									//alert(element.name);

									//alert(element.value);

									var name = element.name;

									name = name.toLowerCase();

									

									if(key == name) {

									

										var selectvalue = element.value;

										var variantionvalue = variation[key];

										

										//alert('variantionvalue:' + variantionvalue);

										//alert('selectvalue:' + selectvalue);

										if(variantionvalue != selectvalue) {

										

											found = false;

											break;

										} else {

											//alert('Yes matched one');

										}

									}

									

								}

								if(!found) {								

								

									break;

								}

								

						}	

						//alert("look completed");
						function number_format(number, decimals, decPoint, thousandsSep){
	decimals = decimals || 0;
	number = parseFloat(number);

	if(!decPoint || !thousandsSep){
		decPoint = '.';
		thousandsSep = '.';
	}

	var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
	var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
	var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
	var formattedNumber = "";

	while(numbersString.length > 3){
		formattedNumber += thousandsSep + numbersString.slice(-3)
		numbersString = numbersString.slice(0,-3);
	}

	return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
}

						if(found) {								

							var price = parseFloat(variation['price']);

							var offer_price = parseFloat(variation['offer_price']);

								var conv = <?php echo $local ?>; 
							var weight = parseFloat(variation['weight']);

							//var weight = weight*6;
							//var weight = weight*conv;
							var testingg =  offer_price*conv;



							if(!offer_price){
							var conv = <?php echo $local ?>; 

							document.getElementById('addtocart').style.display = "none";
							document.getElementById('addtocart2').style.display = "none";

							document.getElementById('pricerate').innerHTML = '<br><span style="font-size:12px;">Producto no disponible en Stock</span>';

								document.getElementById('variation_price').value = '<br><span style="font-size:12px;">Producto no disponible en Stock</span>';

							

							}



							else if(offer_price < price){

								var gadmin = (price*7)/100;
								var gadmin = gadmin*conv;
								document.getElementById('gadmin').innerHTML = '<span><?php echo  $currencies; ?>'+gadmin.toFixed(0)+'</span>';	
								document.getElementById('addtocart').style.display = "block";
								document.getElementById('addtocart2').style.display = "block";

								document.getElementById('mjscart').style.display = "none";
								document.getElementById('peso').innerHTML = '<span><?php echo  $currencies; ?>'+weight.toFixed(0)+'</span>';	

								document.getElementById("regpricerate").style.display = "block";

								var regprice = '';

								var testintach =  price*conv;

								regprice = '<span style="color: #880d0b; font-size: 16px;">Precio Regular:<strike><?php echo $currencies; ?>'+number_format(testintach)+'</strike></span>';

								document.getElementById('regpricerate').innerHTML = regprice;


								document.getElementById('pricerate').innerHTML = number_format(testingg);

								//document.getElementById('pricerate').innerHTML = offer_price;

								document.getElementById('variation_price').value = offer_price;	

							}else{
										var gadmin = (price*7)/100;
										var gadmin = gadmin*conv;

							//	document.getElementById('gadmin').innerHTML = '<span><?php echo  $currencies; ?>'+gadmin.toFixed(2)+'</span>';	

								document.getElementById('gadmin').innerHTML = '<span><?php echo  $currencies; ?>'+gadmin.toFixed(2)+'</span>';	
								document.getElementById('addtocart').style.display = "block";
								document.getElementById('addtocart2').style.display = "block";
								document.getElementById('peso').innerHTML = '<span><?php echo  $currencies; ?>'+weight.toFixed(2)+'</span>';	

								document.getElementById('addtocart').style.display = "block";

								document.getElementById('mjscart').style.display = "none";

																var testingg =  offer_price*conv;

								document.getElementById("regpricerate").style.display = "none";

								//document.getElementById('pricerate').innerHTML = offer_price;

								document.getElementById('pricerate').innerHTML = number_format(testingg);

								document.getElementById('variation_price').value = offer_price;

							}

							

							

							var image = variation['image'];

							//alert('Price:'+price);

							//alert('Image:'+image);

									

							var asin = variation['asin'];

							

							//amazon.com/dp/asin

							//alert('asin:'+asin);	

							//document.getElementById('amasty_zoom').src = image;

							//document.getElementById('amasty_zoom').data-zoom-image = image;

							//$(amasty_zoom).attr('data-zoom-image',image);	amasty_zoom_2	

							//document.getElementById('amasty_zoom').setAttribute('data-zoom-image', image);

							

							var zooimg = document.getElementById('amasty_zoom').getAttribute('data-zoom-image');

							var shownimg = document.getElementById('amasty_zoom').getAttribute('src');

							//alert("zooimg ..."+zooimg);

							//alert("shownimg ..."+shownimg);

							//alert('click variation'+asin);

							document.getElementById('varimg_'+asin).click();

							

							document.getElementById('variation_asin').value = asin;	

							if( weight == 0 ) {
							document.getElementById('addtocart').style.display = "none";
							document.getElementById('addtocart2').style.display = "none";
								document.getElementById('pricerate').innerHTML = '<br><span style="font-size:12px;">Peso no disponible</span>';
							}

							break;

						}else{



							document.getElementById('pricerate').innerHTML = '<br><span style="font-size:12px;">Todos los campos son requeridos</span>';

							document.getElementById('variation_price').value = '<br><span style="font-size:12px;">Todos los campos son requeridos</span>';

							

							var image = variation['image'];

							var asin = variation['asin'];

							

							//document.getElementById('amasty_zoom').src = image;

							//document.getElementById('amasty_zoom').setAttribute('data-zoom-image', image);

							

							var zooimg = document.getElementById('amasty_zoom').getAttribute('data-zoom-image');

							var shownimg = document.getElementById('amasty_zoom').getAttribute('src');

							

							document.getElementById('variation_asin').value = asin;	

							

						}		

					}				

				} 

				

			</script>				

	

	    </div>

	<div class="clearfix"></div><br>	

<div style="    color: #000;  line-height: 2; background-color: #fff; padding-left: 15px; padding-right: 5px; padding-top: 10px;    padding-top: 10px;
    font-size: 14px;
    font-weight: 400;
    line-height: 27px;
   
    text-align: justify;" class="col-lg-24">
	<h2>Ver mas del Producto</h2>
<hr>
<?php
$api_key2 = 'AIzaSyDKqtlwUKnn7kJeTZrDfOc63EU6OTYLyiU';
$text2 = $product['description'];
$source2="en";
$target2="es";
$url2 = 'https://www.googleapis.com/language/translate/v2?key=' . $api_key2 . '&q=' . rawurlencode($text2);
$url2 .= '&target='.$target2;
$url2 .= '&source='.$source2;
 
$response2 = file_get_contents($url2);
$obj2 =json_decode($response2,true); //true converts stdClass to associative array.
if($obj2 != null)
{
    if(isset($obj2['error']))
    {
        echo "Error is : ".$obj2['error']['message'];
    }
    else
    {
        echo '<span style="    font-size: 20px!important;color:#000!important;" class="titulo"> Descripcion del Producto : </span>'.$obj2['data']['translations'][0]['translatedText'];
    }
}
else?>

<?php
    echo $product['description'];
		  //echo "<br>".$revision;
?>	
	<?php // echo $product['description']; ?>

</div>



	    	    <div class="col-lg-12 col-xs-12" style="background-color: #fff;">

	      <hr><br>

	      <p  class="titulo"> Los clientes que compraron este artículo también compraron:</p>

	   <br>

<?php



// Your AWS Access Key ID, as taken from the AWS Your Account page

$aws_access_key_id = "AKIAJ5VXW6MOWVWC5SBA";



// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page

$aws_secret_key = "oI4oPfxx5ewGjBN6wbbERDb+43xtd/MFw/1N8Pox";



// The region you are interested in

$endpoint = "webservices.amazon.com";



$uri = "/onca/xml";



$params = array(

    "Service" => "AWSECommerceService",

    "Operation" => "SimilarityLookup",

    "AWSAccessKeyId" => "AKIAJ5VXW6MOWVWC5SBA",

    "AssociateTag" => "karenrivera-20",

    "ItemId" => $product['asin'],

    "MerchantId" => "Amazon",

    "ResponseGroup" => "Images,ItemAttributes,Large,Offers,Similarities,Small"

);



// Set current timestamp if not set

if (!isset($params["Timestamp"])) {

    $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');

}



// Sort the parameters by key

ksort($params);



$pairs = array();



foreach ($params as $key => $value) {

    array_push($pairs, rawurlencode($key)."=".rawurlencode($value));

}



// Generate the canonical query

$canonical_query_string = join("&", $pairs);



// Generate the string to be signed

$string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;



// Generate the signature required by the Product Advertising API

$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));



// Generate the signed URL

$request_url = 'https://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);



//foreach($params as $si){

$resp_data  = simplexml_load_file($request_url);

$s= 1;

foreach($resp_data->Items->Item as $asi) {

if ($s>6) {

	break;

}

$s++;

$titi = (string)$asi->ItemAttributes->Title;

$imgs = $asi->MediumImage->URL;

$sasin = $asi->ASIN;

?>



<div class="col-lg-2 col-xs-12">

<a style="color: #0066c0" href="http://tushopcolombia.com/amazon/index/ver/?asin=<?php echo $sasin;  ?>">

<div style="    min-height: 180px;">

	<img style=" max-height: 180px;" class="img-responsive center-block" src="<?php echo $imgs; ?>" alt="">

</div>

	<p><?php echo substr($titi,0,50); ?>...</p>

</div>

</a>





<?php } ?>

		<?php }

			

		} ?>



</div>



</div>	



<script type="text/javascript">



	function variationAddtoCart() {



	  //alert("productAddtoCart checking...");	

	  //alert('Asin:'+asinvalue);

	 // alert('Price:'+price);

	 // var url = "<?php echo Mage::getUrl("amazonsearch/index/cart"); ?>";

	 document.getElementById('loading').style.display = "block";

	 var variation_asin='';

	 if(document.getElementById('variation_asin')){

		variation_asin = document.getElementById('variation_asin').value;

	 }

	 //alert('variation_asin:'+variation_asin);

	 var parent_asin='';

	if(document.getElementById('parent_asin')){

		parent_asin = document.getElementById('parent_asin').value;

	}

	 //alert('parent_asin:'+parent_asin);

	var variation_price='';

	if(document.getElementById('parent_asin')){

		variation_price = document.getElementById('variation_price').value;

	}

	//alert('variation_price:'+variation_price);

	var variation_color='';

	if(document.getElementById('myattribute_color')){

		variation_color = document.getElementById('myattribute_color').value;

	}

	var variation_size='';

	if(document.getElementById('myattribute_size')){

		variation_size = document.getElementById('myattribute_size').value;

	}

	if(variation_price == "Product Not Available"){

		document.getElementById('loading').style.display = "none";

		return (alert(variation_price));

	}

	

	var url = "<?php echo Mage::getUrl("amazonsearch/index/variationcart"); ?>";

	 // alert(url);

	  new Ajax.Request(url, {

	   method: "get",

	   parameters: { "parent_asin":parent_asin,

					 "variation_asin":variation_asin,

					"variation_price":variation_price,

					"variation_size":variation_size,

					"variation_color":variation_color },

	   onSuccess: function(transport){



     		var data = transport.responseText.evalJSON();

                if(data.success == "Success") {

				    //alert("success");

					productId = data.productId;

					//alert(productId);

                                        new Ajax.Request("http://tushopcolombia.com/checkout/cart/add", {
                                           method: "get",

					   parameters: { "qty":document.getElementById('textbox_id').value,

							 "isAjax":1,

							 "product":productId},

					   onSuccess: function(transport){

					     window.location.href = "http://tushopcolombia.com/checkout/cart";

						//document.getElementById('loading').style.display = "none";  
						//document.getElementById('modal').style.display = "block";  
						//document.getElementById('shade').style.display = "block";

					   },

					   onFailure :function(){

						  alert("failed");

					  	  }

					    });

                                        

                                        }

					//window.location.href = "http://tushopcolombia.com/checkout/cart/add?qty=1&product="+productId;

					

                

		  

	   },

	   onFailure :function(){

		  alert("failed");

	  	  }

	    });



	}



</script>

<script type="text/javascript">



	function vAddtoCart() {



	  //alert("productAddtoCart checking...");	

	  //alert('Asin:'+asinvalue);

	 // alert('Price:'+price);

	 // var url = "<?php echo Mage::getUrl("amazonsearch/index/cart"); ?>";

	 document.getElementById('loading').style.display = "block";

	 var variation_asin='';

	 if(document.getElementById('variation_asin')){

		variation_asin = document.getElementById('variation_asin').value;

	 }

	 //alert('variation_asin:'+variation_asin);

	 var parent_asin='';

	if(document.getElementById('parent_asin')){

		parent_asin = document.getElementById('parent_asin').value;

	}

	 //alert('parent_asin:'+parent_asin);

	var variation_price='';

	if(document.getElementById('parent_asin')){

		variation_price = document.getElementById('variation_price').value;

	}

	//alert('variation_price:'+variation_price);

	var variation_color='';

	if(document.getElementById('myattribute_color')){

		variation_color = document.getElementById('myattribute_color').value;

	}

	var variation_size='';

	if(document.getElementById('myattribute_size')){

		variation_size = document.getElementById('myattribute_size').value;

	}

	if(variation_price == "Product Not Available"){

		document.getElementById('loading').style.display = "none";

		return (alert(variation_price));

	}

	

	var url = "<?php echo Mage::getUrl("amazonsearch/index/variationcart"); ?>";

	 // alert(url);

	  new Ajax.Request(url, {

	   method: "get",

	   parameters: { "parent_asin":parent_asin,

					 "variation_asin":variation_asin,

					"variation_price":variation_price,

					"variation_size":variation_size,

					"variation_color":variation_color },

	   onSuccess: function(transport){



     		var data = transport.responseText.evalJSON();

                if(data.success == "Success") {

				    //alert("success");

					productId = data.productId;

					//alert(productId);

                                        new Ajax.Request("http://tushopcolombia.com/checkout/cart/add", {
                                           method: "get",

					   parameters: { "qty":document.getElementById('textbox_id').value,

							 "isAjax":1,

							 "product":productId},

					   onSuccess: function(transport){

					   // window.location.href = "http://tushopcolombia.com/checkout/cart";

						document.getElementById('loading').style.display = "none";  
						document.getElementById('modal').style.display = "block";	
						document.getElementById('shade').style.display = "block";
						window.location.reload();

					   },

					   onFailure :function(){

						  alert("failed");

					  	  }

					    });

                                        

                                        }

					//window.location.href = "https://telocomproenusa.com/gt/checkout/cart/add?qty=1&product="+productId;

					

                

		  

	   },

	   onFailure :function(){

		  alert("failed");

	  	  }

	    });



	}



</script>

<script type="text/javascript">



	function productAddtoCart(asinvalue,price) {



	  //alert("productAddtoCart checking...");	

	  //alert('Asin:'+asinvalue);

	 //alert('Price:'+price);

	document.getElementById('loading').style.display = "block";

	 var url = "<?php echo Mage::getUrl("amazonsearch/index/cart"); ?>";

	 // alert(url);

	  new Ajax.Request(url, {

	   method: "get",

	   parameters: { "asin":asinvalue,

					 "price":price},

	   onSuccess: function(transport){



     		var data = transport.responseText.evalJSON();

                if(data.success == "Success") {

				    //alert("success");

					productId = data.productId;

					//alert(productId);

                                        new Ajax.Request("http://tushopcolombia.com/checkout/cart/add", {

                                        

                                           method: "get",

					   parameters: { "qty":document.getElementById('textbox_id').value,

							 "isAjax":1,

							 "product":productId},

					   onSuccess: function(transport){

					      window.location.href = "http://tushopcolombia.com/checkout/cart";

						document.getElementById('loading').style.display = "none";  
						//document.getElementById('modal').style.display = "block";  
						//document.getElementById('shade').style.display = "block";
						//window.location.reload();

					   },

					   onFailure :function(){

						  alert("failed");

					  	  }

					    });

                                        

                                        }

					//window.location.href = "http://tushopcolombia.com/checkout/cart/add?qty=1&product="+productId;



	   },

	   onFailure :function(){

		  alert("failed");

	  	  }

	    });



	}



</script>


<script type="text/javascript">



	function pAddtoCart(asinvalue,price) {

	  //alert("productAddtoCart checking...");	

	  //alert('Asin:'+asinvalue);

	 //alert('Price:'+price);

	document.getElementById('loading').style.display = "block";

	 var url = "<?php echo Mage::getUrl("amazonsearch/index/cart"); ?>";

	 // alert(url);

	  new Ajax.Request(url, {

	   method: "get",

	   parameters: { "asin":asinvalue,

					 "price":price},

	   onSuccess: function(transport){



     		var data = transport.responseText.evalJSON();

                if(data.success == "Success") {

				    //alert("success");

					productId = data.productId;

					//alert(productId);

                                        new Ajax.Request("http://tushopcolombia.com/checkout/cart/add", {

                                        

                                           method: "get",

					   parameters: { "qty":document.getElementById('textbox_id').value,

							 "isAjax":1,

							 "product":productId},

					   onSuccess: function(transport){

				//   window.location.href = "http://tushopcolombia.com/checkout/cart";

					//	document.getElementById('loading').style.display = "none";  
					//	document.getElementById('modal').style.display = "block";  
					//	document.getElementById('shade').style.display = "block";
						window.location.reload();

					   },

					   onFailure :function(){

						  alert("failed");

					  	  }

					    });

                                        

                                        }

					//window.location.href = "https://telocomproenusa.com/gt/checkout/cart/add?qty=1&product="+productId;



	   },

	   onFailure :function(){

		  alert("failed");

	  	  }

	    });



	}



</script>


<style>

	.titulo{

		display: block;

    color: #000;

    font-size: 18px;

    line-height: 25px;

    margin: 0px;

    text-transform: capitalize;

  

    font-weight: 400;

	}



	.price2{

		    font-weight: normal;

    font-size: 18px;

    color: #b12704!important;

 



	}

	.price3{

		    font-weight: normal;

    font-size: 14px;

    color: #555!important

  

	}

	hr{

		    margin-top: 5px;

    margin-bottom: 5px;

	}

	.puntos{

		margin: 0;

    font-size: 14px;

    font-weight: 400;

    line-height: 27px;

    color: #000;

    list-style-type: disc;

    
	}

.btn-sample { 

  color: #111; 

  background-color: #F0C14B; 

     border-color: #f5a43c;

    border-radius: 5px;

} 

 

.btn-sample:hover, 

.btn-sample:focus, 

.btn-sample:active, 

.btn-sample.active, 

.open .dropdown-toggle.btn-sample { 

  color: #111; 

  background-color: #FFB700; 

  border-color: #9C7E31; 

} 

 

.btn-sample:active, 

.btn-sample.active, 

.open .dropdown-toggle.btn-sample { 

  background-image: none; 

} 

 

.btn-sample.disabled, 

.btn-sample[disabled], 

fieldset[disabled] .btn-sample, 

.btn-sample.disabled:hover, 

.btn-sample[disabled]:hover, 

fieldset[disabled] .btn-sample:hover, 

.btn-sample.disabled:focus, 

.btn-sample[disabled]:focus, 

fieldset[disabled] .btn-sample:focus, 

.btn-sample.disabled:active, 

.btn-sample[disabled]:active, 

fieldset[disabled] .btn-sample:active, 

.btn-sample.disabled.active, 

.btn-sample[disabled].active, 

fieldset[disabled] .btn-sample.active { 

  background-color: #F0C14B; 

  border-color: #9C7E31; 

} 

 

.btn-sample .badge { 

  color: #F0C14B; 

  background-color: #111; 

}

#pricerate{

	color: #dc4535

}
  .pricingTable{
    text-align: center;
}
.pricingTable .pricingTable-header{
    border-radius: 5px 5px 0px 0px;
    color: #feffff;
   /* background: #0a4894;*/
}
.pricingTable .heading{
    display: block;
    padding-top: 14px;
}
.pricingTable .heading:after{
    content: "";
    border-top: 1px solid rgba(255, 255, 255 ,0.4);
    width: 85%;
}
.pricingTable .heading > h3{

    margin: 0;
    text-transform: capitalize;
    font-size: 20px;
}
.pricingTable .heading > span{
    text-transform: capitalize;
    font-size: 13px;
    margin-top: 5px;
    display: block;
}
.pricingTable .pricerate{
    padding-bottom: 25px;
    display: block;
    font-size: 34px;
}
.pricingTable .btn-block2{
    /*width: 40%; */
    margin: 0 auto;
    background: #0d4b88;
    color:#fff;
    text-transform: capitalize;
    border: 0px none;
    padding: 10px;
    border-radius: 3px;
    font-size: 17px;
    transition:all 0.5s ease 0s;
    letter-spacing: 1px;
}
.pricingTable .btn-block:hover{
    border-radius: 5px;
}
.pricingTable .btn-block2:hover{
    border-radius: 5px;
}
.pricingTable .btn-block2:before{
 /*   content: "\f067";
    font-family: 'FontAwesome';*/
    margin-right: 10px;
}
.pricingTable-header > .pricerate > .month{
    font-size: 14px;
    display: inline-block;
    text-transform: uppercase;
}
.pricingTable .pricerate > span{
    display: block;
    font-size: 14px;
    line-height: 20px;
}
.pricingTable .pricingContent{
	    border-radius: 0px 0px 5px 5px;
    text-transform: capitalize;
  /*  background: #151515;
    color:#fefeff;
/*    background: rgba(10,72,148,1);
background: -moz-linear-gradient(top, rgba(10,72,148,1) 0%, rgba(32,124,229,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(10,72,148,1)), color-stop(100%, rgba(32,124,229,1)));
background: -webkit-linear-gradient(top, rgba(10,72,148,1) 0%, rgba(32,124,229,1) 100%);
background: -o-linear-gradient(top, rgba(10,72,148,1) 0%, rgba(32,124,229,1) 100%);
background: -ms-linear-gradient(top, rgba(10,72,148,1) 0%, rgba(32,124,229,1) 100%);
background: linear-gradient(to bottom, rgba(10,72,148,1) 0%, rgba(32,124,229,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0a4894', endColorstr='#207ce5', GradientType=0 );*/
/*background: #b21f2f; */
    line-height: 1.3;
    font-size: 14px;
    color: #ffffff;
   
}
.pricingTable .pricingContent > i{
    font-size: 60px;
    margin-top: 20px;
}
.pricingTable .pricingContent ul{
    list-style: none;
    padding: 0;
    margin-bottom: 0;
    text-align: left;
}
.pricingTable .pricingContent ul li{
	    letter-spacing: 0.2px;
    padding: 12px 0;
       border-bottom: 1px solid #880d0b;
   /* border-top: 1px solid #333;*/
    width: 85%;
    margin: 0 auto;
}
.pricingTable .pricingContent ul li:first-child{
    border-top: 0px none;
}
.pricingTable .pricingContent ul li:last-child{
    border-bottom: 0px none;
}
.pricingTable .pricingContent ul li:before{
   /* content: "\f00c";*/
    /*font-family: 'FontAwesome';
    margin-right: 10px;
    transition:all 0.5s ease 0s;*/
}
.pricingTable .pricingContent ul li:hover:before{
    margin-right: 20px;
}
.pricingTable .pricingTable-sign-up{
    padding: 20px 0;
    background: #151515;
    color:#fff;
    text-transform: capitalize;
}
.pricingTable .pricingTable-sign-up > span{
    margin-top: 10px;
    display: block;
}
.pricingTable .btn-block{
    /*width: 40%; */
    margin: 0 auto;
    background: #db2a3a;
    color:#fff;
    text-transform: capitalize;
    border: 0px none;
    padding: 10px;
    border-radius: 3px;
    font-size: 17px;
    transition:all 0.5s ease 0s;
    letter-spacing: 1px;
}
.pricingTable .btn-block:hover{
    border-radius: 12px;
}
.pricingTable .btn-block:before{
    /*content: "\f07a";
    font-family: 'FontAwesome';*/
    margin-right: 10px;
}
.pricingTable.pink .pricingTable-header{
    background: #ed687c;
}
.pricingTable.orange .pricingTable-header{
    background: #e67e22;
}
.pricingTable.green .pricingTable-header{
    background: #008b8b;
}
.price-currency, .price {
	color: #dc4535;
    font-weight: 500;
    font-size: 26px;
    letter-spacing: -.6px;
}
@media screen and (max-width: 990px){
    .pricingTable{
        margin-bottom: 20px;
    }
}
.add-to-cart label[for="qty"] {
    display: inline-block;
}
input.qty, input[id*="qty"] {
    margin: 0;
    padding: 0;
    width: 30px;
    height: 3 v0px;
    line-height: 40px;
    text-align: center;
    color: #880d0b;
    font-size: 12px;
    border: solid 1px #880d0b;
    background-color: white;
    border-radius: 4px;
    display: inline-block;
    vertical-align: middle;
}
.add-to-cart label {
    float: none;
    margin-right: 5px;
}

   .product-image {
	   	min-height: 500px;
	   	}
	   	   @media only screen and (max-width: 600px) {
     .product-image 
{
    /* Full background image */
     	min-height: 250px;

}}

.content-wrapper:before {
    background: #f6f6f6;
   
}

.content-wrapper{

    background: #f6f6f6


}

.aplus {
    font-size: 14px;
}

body .btn-primary.type-2:hover {background-color: #000; border-color: #fb6f62; color: #fff;}
.rating-box {
    margin-right: 5px;
}

</style>





</body>

<!-- end of body -->

</html>


