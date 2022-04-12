<?php
/**
 * Environment class for seperations in design (mostly backend)
 */
class Environment
{
  private $is_production;
  private $is_development;
  private $is_localhost;

  private $production_domain_names = [
    'i-design.nu' => ['host' => 'www.i-design.nu', 'name' => 'i-design', 'color' => '#91BE1E', 'hexcolor' => '91BE1E'],
    'www.i-design.nu' => ['host' => 'i-design.nu', 'name' => 'i-design', 'color' => '#91BE1E', 'hexcolor' => '91BE1E'],
  ];

  private $development_domain_names = [
    'staging.i-design.nu' => ['host' => 'staging.i-design.nu', 'name' => 'i-design', 'color' => '#91BE1E', 'hexcolor' => '91BE1E'],
  ];

  private $localhost_domain_names = [
    'localhost' => ['host' => 'localhost', 'name' => 'i-design', 'color' => '#91BE1E', 'hexcolor' => '91BE1E'],
    'localhost:3000' => ['host' => 'localhost', 'name' => 'i-design', 'color' => '#91BE1E', 'hexcolor' => '91BE1E']
  ];

  public function is_production()
  {

    if (!!$_SERVER && key_exists('HTTP_HOST', $_SERVER) && array_key_exists( $_SERVER['HTTP_HOST'], $this->production_domain_names)) {

      $this->is_production = true;

    } else if (!!$_SERVER && key_exists('HTTP_HOST', $_SERVER) && array_key_exists( $_SERVER['HTTP_HOST'], $this->localhost_domain_names)) {

      $this->is_production = false;

    }
    return $this->is_production;
  }

  public function is_development()
  {
    if (!!$_SERVER && key_exists('HTTP_HOST', $_SERVER) && array_key_exists( $_SERVER['HTTP_HOST'], $this->development_domain_names)) {

      $this->is_development = true;

    } else {

      $this->is_development = false;

    }
    return $this->is_development;
  }

  public function is_localhost()
  {
    if (!!$_SERVER && key_exists('HTTP_HOST', $_SERVER) && array_key_exists( $_SERVER['HTTP_HOST'], $this->localhost_domain_names)) {
      $this->is_localhost = true;
    } else {
      $this->is_localhost = false;
    }
    return $this->is_localhost;
  }

  public function get_current_theme()
  {

    if ($this->is_localhost()) {

      return $this->localhost_domain_names[ $_SERVER['SERVER_NAME'] ];
      
    } else if ($this->is_development()) {

      return $this->development_domain_names[ $_SERVER['HTTP_HOST'] ];

    } else if ($this->is_production()) {

      return $this->production_domain_names[ $_SERVER['HTTP_HOST'] ];

    } else {

      return $this->localhost_domain_names[ $_SERVER['HTTP_HOST'] ];

    }
    
  }

  public function get_current_mode() {
    if ($this->is_localhost()) {
      return 'localhost';
    } elseif ($this->is_development()) {
      return 'development';
    } elseif ($this->is_production()) {
      return 'production';
    } else {
      return 'localhost';
    }
  }
}
