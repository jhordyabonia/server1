<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title><?=$titulo?></title>
<!-- fa icons -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Versión compilada y comprimida del CSS de Bootstrap -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

 
<!-- Tema opcional -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src = "http://www.proveedor.com.co/assets/js/jquery.js"></script>
<!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
</script>

<!--emoji facebook-->
<!--
<link rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/yr/r/zAuaiwAdxv_.css">
<link rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/yO/r/ZEz94DrT0_1.css">
<link rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/yl/r/dHDOE5G5SJA.css">
<link rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/yF/r/T-gItUoK2n5.css">
-->
<style type="text/css">
/*input:invalid {border: 1px solid red;}*/
input:valid {border: 1px solid green;}
/**
h5 {
    font-size: 14px;
    margin-top: 20px;
    margin-bottom: 10px;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
  }
  h4 {
    font-size: 18px;
}
 h3 {
    font-size: 24px;
    margin-top: 20px;
    margin-bottom: 10px;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
}
 h1 {
    font-size: 36px;
    margin-top: 20px;
    margin-bottom: 10px;
    font-family: verdana;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
    margin: .67em 0;
}*/
.data-script {
    margin: 1%;
    padding: 16%;
    border-bottom: solid 1px whitesmoke;
}
.step {
    font-weight: 600;
    border-bottom: solid 2px whitesmoke;
    padding: 5%;
    cursor: pointer;
}
.elipse 
{
    white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis; 
}
.icon{
    background-color: transparent;
    height: 34px;
}
.pack
{	
    border: solid 1px lightblue;
    background-color: whitesmoke;
    margin-bottom: 10px;
}
.btn-copy
{	
    padding: 6px;
    border: solid 1px gray;
    border-radius: 2px;
    background-color: whitesmoke;
}
.logo {
    padding: 0px 0px 5px 15px;
}
.transparent{background-color: transparent;}
.p3{padding: -3px;}
.p7{padding-top: 7px;}
.nb{color: black;border: 0;}
.l{float:right;}
.b {
    padding: 2%;
    border: solid 1px  white;
}
.chat
{
  /*background-image: url('<?=base_url()?>assets/img/chat/1.png');
  background-position: left bottom,right  top;
  background-size: contain;
  background-repeat: no-repeat, repeat;*/
  margin: 1px;
  padding: 1px;
  border-radius: 5px; 
  box-shadow: 0 2px 5px #555; 
  border: solid 1px #EEE; 
  display: inline-block;
}
.ws{background-color: whitesmoke;}
@font-face {
    font-family: "emoji";
    font-style: normal;
    font-weight: normal;
    src: local("?"), url("<?=base_url()?>assets/fonts/emoji.ttf") format("woff"), url("<?=base_url()?>assets/fonts/emoji.ttf") format("truetype");
}

::-webkit-scrollbar {
      width: 8px;
      height: 8px;
}
::-webkit-scrollbar-track {
      background-color: whitesmoke;
} 
::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.2);
} 
::-webkit-scrollbar-button {
      background-color: white;
}
::-webkit-scrollbar-corner {
      background-color: whitesmoke;
}
</style>
</head>
