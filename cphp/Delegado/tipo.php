<?php session_start(); ?>
<?php
  include("../Seguridad/seguridadModulos.php");
  seguridadDelegado(false);
?>
<!DOCTYPE html>
  <html  style="height: 100%;">
  <?php include 'modeloPagina/head.php';
   ?>
<body ontouchstart="" style="position: relative; min-height: 100%; top: 0px;">
      <div class="modalMsgWrapper" >
        <div id="container">
          <div id="header">
            <div class="wrap cf" style="position:relative;">
              <h2 class="logo cf"><a href="/../../">4Ecuador</a></h2>
               <div id="logged_in_info" class="">
                <div id="notloggedin_wrapper" class="show">
                  <div id="notloggedin" class="prelogin">
                    <ul id="login_signup">
                    <li id="loginTabWrap" class="gbtnTertiary rightBtn"><div  onClick="location.href='../../cphp/Login/logout.php'" id="headerlogin_tab"> Salir</div></li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

  <div class="signupLayoutA ">
    <div id="chooseYourPlan">
      <div id="circleSpaceHeader">
        <div id="circlePlanTitle" style="font-weight:300;margin:-15px 0 30px;"> Envia tu petición responsablemente</div>
      </div>
        <div id="planFree" class="planChoice ">
          <div class="planTitle">Peticiones Ordinarias</div>
          <div class="planIllustration"></div>
              <p class="planDesc" style="position:relative;">Agua, Enlatados, <br> </p>
                <div onClick="location.href='user.php'" class="gbtnTertiary chooseFreeBtn">Solicitar</div>
        </div>

        <div id="planPro" class="planChoice ">
          <div class="planTitle">Peticiones Extraordinarias</div>
          <div class="planIllustration"></div>
                <p class="planDesc"> Colchones, <br></p>
          <div  onClick="location.href='producto.php'" class="gbtnTertiary chooseProBtn">Solicitar</div>
         </div>

    </div>

  </div>

</body>
</html>
