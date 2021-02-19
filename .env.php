<?php
/**
 * Environment class for seperations in design (mostly backend)
 */
class Environment
{
  private $is_production;
  
  function is_production() {
    if ($_SERVER['SERVER_NAME'] == 'teachdigital.nl') {
      // Production environment
      $this->is_production = true;
    } else if($_SERVER['SERVER_NAME'] == 'teachdigital.dev') {
      // Development environment
      $this->is_production = true;
    } else if ($_SERVER['SERVER_NAME'] != 'teachdigital.dev' && $_SERVER['SERVER_NAME'] != 'teachdigital.nl') {
      // Local environment
      $this->is_production = false;
    }
    return $this->is_production;
  }
}
