<?php

class formaPgto
{

    // Atributo para conexão com o banco de dados   
    private $pdo = null;
    // Atributo estático para instância da própria classe    
    private static $formaPgto = null;
    private function __construct($conexao)
    {
        $this->pdo = $conexao;
    }
    public static function getInstance($conexao)
    {
        if (!isset(self::$formaPgto)) :
            self::$formaPgto = new formaPgto($conexao);
        endif;
        return self::$formaPgto;
    }

    public function insert($rNome)
    {
        try {
            $rSql = "INSERT INTO forma_pgto (nome) VALUES (:nome);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);

            $stm->execute();
            if ($stm) {
                Logger('USUARIO:[' . $_SESSION['login'] . '] - INSERIU FORMA DE PAGAMENTO');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function delete($rId)
    {
        if (!empty($rId)) :
            try {
                $sql = "DELETE FROM forma_pgto WHERE id=:id";
                $stm = $this->pdo->prepare($sql);
                $stm->bindValue(':id', $rId);
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU FORMA DE PAGAMENTO - ID:[' . $rId . ']');
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function update($rNome, $rId)
    {
        try {
            $sql = "UPDATE forma_pgto SET nome=:nome WHERE id=:id;";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU FORMA DE PAGAMENTO - ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function selectUM($rWhere)
    {
        try {
            echo $sql = "SELECT * FROM forma_pgto " . $rWhere;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function pegaFormaPgto($rID)
    {
        try {
            $sql = "SELECT * FROM forma_pgto WHERE id=$rID";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function select($rWhere = '')
    {
        try {
            $sql = "SELECT * FROM forma_pgto " . $rWhere;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function montaSelect($rNome = 'forma_pgto_id', $rSelecionado = null)
    {
        try {
            $objFormaPgto = formaPgto::getInstance(Conexao::getInstance());
            $dados = $objFormaPgto->select(" ORDER BY nome");
            $select = '';
            $select = '<select class="form-control form-control-sm select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Selecione uma opção..." style="width: 100%;">'
                . '<option value="">&nbsp;</option>';
            foreach ($dados as $linhaDB) {
                if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
                    $sAdd = 'selected';
                } else {
                    $sAdd = '';
                }
                $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->id . ' - ' . $linhaDB->nome . '</option>';
            }
            $select .= '</select>';
            return $select;
        } catch (PDOException $erro) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
        }
    }
}
