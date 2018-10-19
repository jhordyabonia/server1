<li class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px; max-height: 340px;display:block">
    <div class="product-item" style="box-shadow: none;">
        <a href="http://www.tushopusa.com/amazon/index/ver/?asin=<?=$_GET['asin']?>">
            <div class="img-alto">
                <img style=" margin: 0 auto; max-height: 180px" src="<?=$_GET['image']?>" class="img-responsive center-block" alt="" title="">
            </div>
            <div class="product-item-content" style="padding-bottom: 10px">
                <p style="color :#e2675c;  font-family: 'Work Sans', sans-serif;font-weight: 500; max-height: 20px;text-overflow: ellipsis;overflow: hidden;" class="item-title">
                    <a href="http://www.tushopusa.com/amazon/index/ver/?asin=<?=$_GET['asin']?>" title="<?=$_GET['nombre']?>" href="#"><?=$_GET['nombre']?></a>
                </p>
                <hr class="hr-line">
                <p class="pcontent">
                    <span class="price">COP $ <?=$_GET['price']?></span>
                    <em class="category-label label_one"></em>								
                </p>
            </div>
        </a>
    </div>
</li>