<?php

class Conexao
{
   //Atributo estático para instância do PDO   
   private static $pdo;
   // Escondendo o construtor da classe      
   private function __construct()
   {
      //   
   }

   public static function getInstance()
   {
      if (!isset(self::$pdo)) {
         try {
            $PU_ambiente = "L"; // L=>LOCALHOST, W=>WEB
            if ($PU_ambiente == 'W') {
               $servername = "sql105.epizy.com";
               $database = "epiz_30837212_faculdade";
               $charset = "utf8";
               $username = "epiz_30837212";
               $password = "E7FGwTDaQv0";
            } else {
               $servername = "localhost";
               $database = "faculdade";
               $charset = "utf8";
               $username = "root";
               $password = "";
            }

            self::$pdo = new  PDO("mysql:host=$servername;dbname=$database;charset=$charset", $username, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
            print "Erro: " . $e->getMessage();
         }
      }
      return self::$pdo;
   }
}
