<?php

class CtRec
{
    // Atributo para conexão com o banco de dados   
    private $pdo = null;
    // Atributo estático para instância da própria classe    
    private static $ctRec = null;
    private function __construct($conexao)
    {
        $this->pdo = $conexao;
    }
    public static function getInstance($conexao)
    {
        if (!isset(self::$ctRec)) :
            self::$ctRec = new CtRec($conexao);
        endif;
        return self::$ctRec;
    }

    public function incluirConta($rNronf, $rSerie, $rDatac, $rClienteID, $rValor, $rHistorico, $rOrdem, $rDataVenc)
    {
        try {
            $auxDataVenc = $rDataVenc;
            if ($rOrdem > 1) {
                //LOOP NO NRO DE PARCELAS
                for ($i = 1; $i <= $rOrdem; $i++) {
                    //CALCULO DA DATA DE VENCIMENTO                    
                    if ($i === 1) { //PRIMEIRA PARCELA
                        //AQUI FAZ UM INSERT  
                        $rSql = "INSERT INTO ctrec (datac,nronf,cliente_id,valor,historico,ordem,data_venc,serie) 
                                 VALUE (:datac,:nronf,:cliente_id,:valor,:historico,:ordem,:data_venc,:serie);";
                        $stm = $this->pdo->prepare($rSql);
                        $stm->bindValue(':datac', gravaData($rDatac));
                        $stm->bindValue(':nronf', $rNronf);
                        $stm->bindValue(':cliente_id', $rClienteID);
                        $stm->bindValue(':valor', gravaMoeda($rValor));
                        $stm->bindValue(':historico', $rHistorico);
                        $stm->bindValue(':ordem', $i);
                        $stm->bindValue(':data_venc', gravaData($auxDataVenc));
                        $stm->bindValue(':serie', $rSerie);

                        $stm->execute();
                        if ($stm) {
                            Logger('USUARIO:[' . $_SESSION['login'] . '] - INSERIU CTREC NRONF:[' . $rNronf . '], SERIE:[' . $rSerie . '],PARCELA:[' . $i . '] DE [' . $rOrdem . ']');
                        }
                    } else { //DEMAIS PARCELAS
                        $rSql = "INSERT INTO ctrec (datac,nronf,cliente_id,valor,historico,ordem,data_venc,serie) 
                                 VALUE (:datac,:nronf,:cliente_id,:valor,:historico,:ordem,:data_venc,:serie);";
                        $stm = $this->pdo->prepare($rSql);
                        $stm->bindValue(':datac', gravaData($rDatac));
                        $stm->bindValue(':nronf', $rNronf);
                        $stm->bindValue(':cliente_id', $rClienteID);
                        $stm->bindValue(':valor', gravaMoeda($rValor));
                        $stm->bindValue(':historico', $rHistorico);
                        $stm->bindValue(':ordem', $i);
                        $stm->bindValue(':data_venc', gravaData($auxDataVenc));
                        $stm->bindValue(':serie', $rSerie);

                        $stm->execute();
                        if ($stm) {
                            Logger('USUARIO:[' . $_SESSION['login'] . '] - INSERIU CTREC NRONF:[' . $rNronf . '], SERIE:[' . $rSerie . '],PARCELA:[' . $i . '] DE [' . $rOrdem . ']');
                        }
                    }
                    $auxDataVenc = somaMes(1, $auxDataVenc);
                }
            } else {
                $rOrdem === '0' ? $rOrdem = '1' : '';
                $rSql = "INSERT INTO ctrec (datac,nronf,cliente_id,valor,historico,ordem,data_venc,serie) 
                                 VALUE (:datac,:nronf,:cliente_id,:valor,:historico,:ordem,:data_venc,:serie);";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':datac', gravaData($rDatac));
                $stm->bindValue(':nronf', $rNronf);
                $stm->bindValue(':cliente_id', $rClienteID);
                $stm->bindValue(':valor', gravaMoeda($rValor));
                $stm->bindValue(':historico', $rHistorico);
                $stm->bindValue(':ordem', $rOrdem);
                $stm->bindValue(':data_venc', gravaData($auxDataVenc));
                $stm->bindValue(':serie', $rSerie);

                $stm->execute();
                if ($stm) {
                    Logger('USUARIO:[' . $_SESSION['login'] . '] - INSERIU CTREC NRONF:[' . $rNronf . '], SERIE:[' . $rSerie . '],PARCELA:[' . $rOrdem . ']');
                }
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
                $sql = "DELETE FROM ctrec WHERE id=:id";
                $stm = $this->pdo->prepare($sql);
                $stm->bindValue(':id', $rId);
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU CTREC - ID:[' . $rId . ']');
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function update($rNome, $rCnpj, $rFone1, $rFone2, $rEmail, $rContato, $rId, $rCpf)
    {
        try {
            $sql = "UPDATE cliente SET nome=:nome,cnpj=:cnpj,fone1=:fone1,fone2=:fone2,email=:email,contato=:contato, 
                     cpf=:cpf WHERE id=:id;";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':cnpj', $rCnpj);
            $stm->bindValue(':fone1', $rFone1);
            $stm->bindValue(':fone2', $rFone2);
            $stm->bindValue(':email', strtolower($rEmail));
            $stm->bindValue(':contato', $rContato);
            $stm->bindValue(':id', $rId);
            $stm->bindValue(':cpf', $rCpf);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU CLIENTE - ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function quitar($rID, $rNroNF, $rSerie, $rValor, $rOrdem, $rFormaPgto, $rDataP)
    {
        try {
            $sql = "UPDATE ctrec SET 
            pago=1,datap=:datap,forma_pgto_id=:forma_pgto_id,valor_pago=:valor_pago
            WHERE id=:id; AND nronf=:nronf AND serie=:serie AND ordem=:ordem ";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rID);
            $stm->bindValue(':nronf', $rNroNF);
            $stm->bindValue(':serie', $rSerie);
            $stm->bindValue(':valor_pago', $rValor);
            $stm->bindValue(':ordem', $rOrdem);
            $stm->bindValue(':forma_pgto_id', $rFormaPgto);
            $stm->bindValue(':datap', gravaData($rDataP));
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - QUITOU CONTA Nro:[' . $rNroNF . '], SERIE:[' . $rSerie . '], PARCELA:[' . $rOrdem . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function excluirQuitacao($rID, $rNroNF, $rSerie, $rOrdem)
    {
        try {
            $sql = "UPDATE ctrec SET 
            pago=0,datap=NULL,forma_pgto_id=NULL,valor_pago=0
            WHERE id=:id; AND nronf=:nronf AND serie=:serie AND ordem=:ordem ";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rID);
            $stm->bindValue(':nronf', $rNroNF);
            $stm->bindValue(':serie', $rSerie);
            $stm->bindValue(':ordem', $rOrdem);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU A QUITAÇÃO DA CONTA Nro:[' . $rNroNF . '], SERIE:[' . $rSerie . '], PARCELA:[' . $rOrdem . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function pegaConta($rID)
    {
        try {
            $sql = "SELECT * FROM ctrec WHERE id=$rID";
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
            $sql = "SELECT * FROM ctrec ";
            if ($rWhere) {
                $sql .= " WHERE $rWhere";
            }
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function selectFormaPgto($rWhere = '')
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
            $objContasPagar = CtPag::getInstance(Conexao::getInstance());
            $dados = $objContasPagar->selectFormaPgto();
            $select = '';
            $select = '<select class="form-control form-control-sm select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Selecione uma forma de pagamento..." style="width: 100%;">'
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
