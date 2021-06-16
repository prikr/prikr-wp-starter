<?php
/**
 * Environment class for seperations in design (mostly backend)
 */
class Environment
{
  private $is_production;
  
  function is_production() {
    if ($_SERVER['SERVER_NAME'] == 'prikr.nl') {
      // Production environment
      $this->is_production = true;
    } else if($_SERVER['SERVER_NAME'] == 'prikr.dev') {
      // Development environment
      $this->is_production = true;
    } else if ($_SERVER['SERVER_NAME'] != 'prikr.dev' && $_SERVER['SERVER_NAME'] != 'prikr.nl') {
      // Local environment
      $this->is_production = false;
    }
    return $this->is_production;
  }
}
