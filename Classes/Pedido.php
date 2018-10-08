<?php
/**
 * Created by PhpStorm.
 * User: luigi
 * Date: 16/04/18
 * Time: 22:07
 */

include_once 'DAO.php';
class Pedido extends DAO
{


    public function novoPedido($dados){
        $query = parent::$db->prepare('INSERT INTO pedido(id, valorTotal, idUsuario, data, status) VALUES(:id, :valorTotal, :idUsuario, :data, :status)');
        $query->execute($dados);
    }

    public function getIDPedido(){
        $query = parent::$db->prepare('SELECT max(id) as id FROM pedido');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPedidosByidUser($id){
        $query = parent::$db->prepare('SELECT * FROM pedido WHERE idUsuario LIKE :id');
        $query->execute(['id' => '%'.$id.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getComprovanteByidPedido($id){
        $query = parent::$db->prepare('SELECT comprovante.id, comprovante.nome from pedido
                                        INNER JOIN comprovante ON
                                        pedido.idComprovante = comprovante.id
                                        WHERE pedido.id LIKE :id');
        $query->execute(['id' => '%'.$id.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getidComprovante(){
        $query = parent::$db->prepare('SELECT max(id) as id FROM comprovante');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addComprovante($dados){
        $query = parent::$db->prepare('INSERT INTO comprovante(id, nome) VALUES(:id, :nome)');
        $query->execute($dados);
    }

    public function addComprovantePedido($dados){
        $query = parent::$db->prepare('UPDATE pedido
                                      SET idComprovante=:idComprovante, status="Em análise."
                                      WHERE id=:id');
        return $query->execute($dados);
    }

    public function getPedidosAberto(){
        $query = parent::$db->prepare('SELECT * FROM pedido WHERE status LIKE "Em análise."');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aprovarPedido($dados){
        $query = parent::$db->prepare('UPDATE pedido
                                      SET status = "Pedido aprovado."
                                      WHERE id=:id');
        return $query->execute($dados);
    }

    public function negarPedido($dados){
        $query = parent::$db->prepare('UPDATE pedido
                                      SET status = "Pedido não aprovado."
                                      WHERE id=:id');
        return $query->execute($dados);
    }

    public function getDadosById($id){
        $query = parent::$db->prepare('SELECT * from usuario
                                        INNER JOIN pedido ON 
                                        pedido.idUsuario = usuario.id
                                        WHERE pedido.id LIKE :id');
        $query->execute(['id' => '%'.$id.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function pedidoAddItem($dados){
        $query = parent::$db->prepare('INSERT INTO itens_pedido(idPedido, idPlanta, valorUnidade, quantidade) VALUES(:idPedido, :idPlanta, :valorUnidade, :quantidade)');
        $query->execute($dados);
    }
    public function getItens($id){
        $query = parent::$db->prepare('SELECT it.idPlanta, it.valorUnidade, it.quantidade, it.idPedido, planta.nomePopular
                                            from pedido p 
                                            INNER JOIN itens_pedido it
                                            ON p.id = it.idPedido
                                            INNER JOIN planta ON it.idPlanta = planta.id
                                        WHERE it.idPedido LIKE :id');

        $query->execute(['id' => '%'.$id.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


}
