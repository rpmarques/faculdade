<?php

class Tarefa
{
   // Atributo para conexão com o banco de dados   
   private $pdo = null;
   // Atributo estático para instância da própria classe    
   private static $tarefa = null;

   private function __construct($conexao)
   {
      $this->pdo = $conexao;
   }

   public static function getInstance($conexao)
   {
      if (!isset(self::$tarefa)) :
         self::$tarefa = new Tarefa($conexao);
      endif;
      return self::$tarefa;
   }

   public function insert($rSemenstreId, $rMateriaId, $rDataC, $rDataVenc, $rTipoAtividadeId, $rGabarito, $rFinalizado, $rObservacao, $rUsuarioID, $rNome)
   {
      try {
         $rSql = "INSERT INTO tarefa (semestre_id,materia_id,datac,data_venc,tipo_atividade_id,gabarito,finalizado,observacao,usuario_id,nome) 
                  VALUE (:semestre_id,:materia_id,:datac,:data_venc,:tipo_atividade_id,:gabarito,:finalizado,:observacao,:usuario_id,:nome);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':usuario_id', $rUsuarioID);
         $stm->bindValue(':datac', gravaData($rDataC));
         $stm->bindValue(':data_venc', gravaData($rDataVenc));
         $stm->bindValue(':gabarito', $rGabarito);
         $stm->bindValue(':observacao', $rObservacao);
         $stm->bindValue(':tipo_atividade_id', $rTipoAtividadeId);
         $stm->bindValue(':finalizado', $rFinalizado);
         $stm->bindValue(':semestre_id', $rSemenstreId);
         $stm->bindValue(':materia_id', $rMateriaId);
         $stm->execute();
         LoggerSQL($rSql);
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU TAREFA');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function update($rNome, $rID, $rUsuarioID)
   {
      try {
         $sql = "UPDATE materia SET nome=:nome WHERE id = :id AND usuario_id=:usuario_id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':id', $rID);
         $stm->bindValue(':usuario_id', $rUsuarioID);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU MATÉRIA - ID:[' . $rID . ']');
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
            $sql = "DELETE FROM tarefa WHERE id=:id AND usuario_id=:usuario_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rID);
            $stm->bindValue(':usuario_id', $rUsuarioID);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU TAREFA - ID:[' . $rID . ']');
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
         $sql = "SELECT tarefa.*,semestre.semestre,materia.nome AS nome_materia FROM tarefa 
                  LEFT JOIN semestre ON semestre.id=tarefa.semestre_id
                  LEFT JOIN materia  ON materia.id=tarefa.materia_id 
                WHERE tarefa.usuario_id=$rUsuarioID $rWhere ";
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
         $objMateria = Materia::getInstance(Conexao::getInstance());
         $dados = $objMateria->select("1");
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Matéria..."  style="width: 100%;">'
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


   public function contaTarefas($rUsuarioID, $rCondicao = "")
   {
      try {
         $waux = "";
         if (!empty($rCondicao)) {
            $waux = " AND $rCondicao  ";
         }
         $sql = "SELECT count(id) AS total FROM tarefa WHERE usuario_id=$rUsuarioID  $waux ";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados->total;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function pegaTarega($rID, $rUsuarioID)
   {
      try {
         $sql = "SELECT * FROM tarefa WHERE id=$rID AND usuario_id=$rUsuarioID";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
      }
   }
}
