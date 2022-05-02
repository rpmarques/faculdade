<?php

class Semestre
{
   // Atributo para conexão com o banco de dados   
   private $pdo = null;
   // Atributo estático para instância da própria classe    
   private static $semestre = null;

   private function __construct($conexao)
   {
      $this->pdo = $conexao;
   }

   public static function getInstance($conexao)
   {
      if (!isset(self::$semestre)) :
         self::$semestre = new Semestre($conexao);
      endif;
      return self::$semestre;
   }

   public function insert($rAno, $rSemestre, $rUsuarioID)
   {
      try {
         $rSql = "INSERT INTO  semestre  (ano,semestre,usuario_id) VALUES (:ano,:semestre,:usuario_id);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':ano', $rAno);
         $stm->bindValue(':semestre', $rSemestre);
         $stm->bindValue(':usuario_id', $rUsuarioID);
         $stm->execute();
         LoggerSQL($rSql);
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU SEMESTRE');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function update($rAno, $rSemestre, $rID, $rUsuarioID)
   {
      try {
         $sql = "UPDATE semestre SET ano=:ano,semestre=:semestre WHERE id = :id AND usuario_id=:usuario_id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':ano', $rAno);
         $stm->bindValue(':semestre', $rSemestre);
         $stm->bindValue(':id', $rID);
         $stm->bindValue(':usuario_id', $rUsuarioID);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU SEMESTRE - ID:[' . $rID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage() . ']');
      }
   }
   public function delete($rID, $rUsuarioID)
   {
      if (!empty($rID)) :
         try {
            $sql = "DELETE FROM semestre WHERE id=:id AND usuario_id=:usuario_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rID);
            $stm->bindValue(':usuario_id', $rUsuarioID);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU SEMESTRE - ID:[' . $rID . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
         }
      endif;
   }

   public function select($rUsuarioID, $rWhere = "")
   {
      try {
         if (!empty($rWhere)) {
            $rWhere .= " AND $rWhere";
         }
         $sql = "SELECT * FROM semestre WHERE usuario_id=$rUsuarioID $rWhere ";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function selectUM($rWhere)
   {
      try {
         $sql = "SELECT * FROM base_categoria " . $rWhere;
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function montaSelect($rNome = 'categoria_id', $rSelecionado = null)
   {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias->select();
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..."  style="width: 100%;">'
            . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
               $sAdd = 'selected';
            } else {
               $sAdd = '';
            }
            $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome . '</option>';
         }
         $select .= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function montaSelect2($rNome = 'categoria_id', $rSelecionado = null)
   {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias->select(" ORDER BY nome");
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..." style="width: 100%;">'
            . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
               $sAdd = 'selected';
            } else {
               $sAdd = '';
            }
            $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome . '</option>';
         }
         $select .= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function contaSemestres($rUsuarioID, $rCondicao = "")
   {
      try {
         $waux = "";
         if (!empty($rCondicao)) {
            $waux = " AND $rCondicao  ";
         }
         $sql = "SELECT count(id) AS total FROM semestre WHERE usuario_id=$rUsuarioID  $waux ";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados->total;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function pegaSemestre($rID, $rUsuarioID)
   {
      try {
         $sql = "SELECT * FROM semestre WHERE id=$rID AND usuario_id=$rUsuarioID";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
      }
   }
}
