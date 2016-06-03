<?php

   $site = "http://nationallegal.com/";
   $version = "v2";
   $resource = $version . "/";
   $section = $_GET['section'];
   $page = $_GET['page'];

   function includeFile($file,$type){
      if(file_exists($file)){
         include $file;
      }
      else{
         if($type == 'content'){
            // resource may need to be updated to use class Info version/resource
            include $resource . 'content/404.php';
         }
         elseif($type == 'head'){
            // resource may need to be updated to use class Info version/resource
            include $resource . 'content/default_head.php';
         }
      }
   }
   
   /*
   if(isset($_POST['submit']))
   {
   	echo 'hello';
   }
   */

   class Info {
      public $site;
      private $section;
      private $page;

      function __construct() {
         $this->site = "http://nationallegal.com/";
         $this->version = "v2";
         $this->resource = $this->version . '/';
         $this->section = $_GET['section'];
         $this->page = $_GET['page'];
      }

      function getHeader() {

      }

      function getContent() {

      }

      function buildHTML() {
         include $this->resource . 'views/default.php';
      }

      function checkActiveTab($tab){
         if($tab == $this->section){
             return 'active';
         }
      }

   }

   $Info = new Info();
   $Info->buildHTML();
?>
