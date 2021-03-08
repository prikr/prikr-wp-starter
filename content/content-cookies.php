<?php
/**
 * Content for cookie noticer
 * Author: Jasper van Doorn
 */
 
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="cookieconsent cookieconsent__open" id="cookie_consent">
  <div class="cookieconsent__wrapper">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex align-items-center">
          <p class="text">Deze website maakt gebruikt van cookies!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center justify-content-sm-start">
          <button id="declineCookies" class="btn btn--small btn-link fw-bold ps-0 cookieBar" data-accept="false">Weigeren</button>
          <button id="acceptCookies" class="btn btn--small btn-secondary cookieBar" data-accept="true">Accepteren</button>
        </div>
      </div>
    </div>
  </div>
</div>
