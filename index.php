<?php

   $site = "http://explosivefish.com/national_legal/";
   $section = $_GET['section'];
   $page = $_GET['page'];

   function includeFile($file,$type){
      if(file_exists($file)){
         include $file;
      }
      else{
         if($type == 'content'){
            include 'content/404.php';
         }
         elseif($type == 'head'){
            include 'content/default_head.php';
         }
      }
   }

   if(isset($_POST['submit']))
   {
   	echo 'hello';
   }

   class Info {
      public $site;
      private $section;
      private $page;

      function __construct() {
         $this->site = "http://explosivefish.com/national_legal/";
         $this->section = $_GET['section'];
         $this->page = $_GET['page'];
      }

      function getHeader() {

      }

      function getContent() {

      }

      function buildHTML() {
         include 'views/default.php';
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