<?php
namespace Controllers;

abstract class Controller {
  protected $model;
  public function __construct()
  {
    $this->model =  new \Models\Comment();
  }
}