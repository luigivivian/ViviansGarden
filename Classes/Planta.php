<?php
/**
 * Created by PhpStorm.
 * User: luigi
 * Date: 02/05/18
 * Time: 13:39
 */
include_once 'DAO.php';

class Planta extends DAO
{
    public function addPlanta($dados){
        $query = parent::$db->prepare('INSERT INTO planta(id,nomePopular, nomeCientifico, alturaMax, cuidados, descricao, estoque, preco) VALUES(:id, :nomePopular, :nomeCientifico, :alturaMax, :cuidados, :descricao, :estoque, :preco)');
        return $query->execute($dados);
    }
    public function getPlantas(){
        $query = parent::$db->prepare('SELECT * FROM planta');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll($id){
        $query = parent::$db->prepare('SELECT * FROM planta
                                        INNER JOIN imgs
                                        ON imgs.idPlanta = planta.id
                                        WHERE idPlanta = :id');
        $query->execute(['id' => $id]);

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getDados($id){
        $query = parent::$db->prepare('SELECT * FROM planta
                                        WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIcone($id){
        $query = parent::$db->prepare('SELECT * FROM icone WHERE idPlanta = :id');
        $query->execute(['id' => $id]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getImgs($id){
        $query = parent::$db->prepare('SELECT * FROM imgs WHERE idPlanta = :id');
        $query->execute(['id' => $id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id){
        $query = parent::$db->prepare('DELETE from imgs WHERE idPlanta LIKE :id');
        $query->execute(['id' => $id]);

        $query = parent::$db->prepare('DELETE from icone WHERE idPlanta LIKE :id');
        $query->execute(['id' => $id]);

        $query = parent::$db->prepare('DELETE from itens_pedido WHERE idPlanta LIKE :id');
        $query->execute(['id' => $id]);

        $query = parent::$db->prepare('DELETE from planta WHERE id LIKE :id');
        return $query->execute(['id' => $id]);
    }

    public function getID(){
        $query = parent::$db->prepare('SELECT max(id) as idzao FROM planta');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addIcone($dados){
        $query = parent::$db->prepare('INSERT INTO icone(idPlanta, nome) VALUES(:idPlanta, :nome)');
        $query->execute($dados);
    }

    public function addImagem($dados){
        $query = parent::$db->prepare('INSERT INTO imgs(idPlanta, nome) VALUES(:idPlanta, :nome)');
        $query->execute($dados);
    }
    public function delImagem($nome){
        $query = parent::$db->prepare('DELETE from imgs WHERE nome = :nome');
        return $query->execute(['nome' => $nome]);
    }

    public function update($dados){

        $query = parent::$db->prepare('UPDATE planta SET nomePopular=:nomePopular,
                                       nomeCientifico=:nomeCientifico,
                                       alturaMax=:alturaMax,
                                       cuidados=:cuidados,
                                       descricao=:descricao,
                                       estoque=:estoque,
                                       preco=:preco
                                       WHERE id=:id');
        return $query->execute($dados);
    }

    public function diminuirEstoque($dados){
        $query = parent::$db->prepare('UPDATE planta
                                      SET estoque = estoque - :estoque
                                      WHERE id=:id');
        return $query->execute($dados);
    }
    public function aumentarEstoque($dados){
        $query = parent::$db->prepare('UPDATE planta
                                      SET estoque = estoque + :estoque
                                      WHERE id=:id');
        return $query->execute($dados);
    }



}