<?php
   /*
     
   class CRUD
    {
        public function send()
        {            
            //send to data
            $data = array("user"=>"a@a.com","pass"=>"12345");
            //site
            $url = curl_init("http://hermesapi2018.azurewebsites.net/api/usuario/ValidarUsuario?user=".serialize($_GET));

            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($url, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($url);
            curl_close($url);
            if(!$response) 
                return false;
            else var_dump($response);            
        }    
    }
    #$crud = new CRUD();
    #$result = $crud ->send();
    #var_dump($result);
    */
?>

<meta charset="utf-8">
<link rel="stylesheet" href="http://saltoAfro.azurewebsites.net/assets/bootstrap/css/bootstrap.min.css">
<script type="text/javascript">
function send()
{
    URL="http://hermesapi2018.azurewebsites.net/api/usuario/ValidarUsuario";
    data="?user="+document.getElementById('user').value;
    data+="&pass="+document.getElementById('pass').value;
    var http=new XMLHttpRequest();
    http.open("GET", URL+data, true);
    http.addEventListener('load',show,false);
    http.send(null);
    function show()
    {
        result=JSON.parse(http.response);
        if(result.IdCliente==0)
            alert("Datos incorrectos");
        else alert(http.response);
        console.log(result);
    }
}
</script>
<center>
<div class="login-box-body col-md-3">
        <h2>Iniciar Sesion</h2>
        <form id="form" method="GET" action="http://hermesapi2018.azurewebsites.net/api/usuario/ValidarUsuario">
          <div class="form-group has-feedback">
            <input name="user" id="user" type="text" class="form-control" placeholder="Usuario">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="pass" id="pass" type="password" class="form-control" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div align="center" style="max-width:100px">
              <input type="button" class="btn btn-primary btn-block btn-flat" onclick="send()" value="Entrar">
            </div><!-- /.col -->
          </div>
        </form>

        <a >Olvidé la contraseña</a><br>
        <a class="text-center">Registrarme</a>

      </div>
      </center>
      
