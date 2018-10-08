<?php
/**
 * Created by PhpStorm.
 * User: luigi
 * Date: 16/04/18
 * Time: 22:07
 */

include_once 'DAO.php';
class Usuario extends DAO
{
    public function getAll(){
        $query = parent::$db->prepare("SELECT * FROM usuario ORDER BY nome");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByNome($q){
        $query = parent::$db->prepare('SELECT * FROM usuario WHERE nome LIKE :q ORDER BY nome');
        $query->execute(['q' => '%'.$q.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //novo contato
    public function cadastrarContato($dados){
        $query = parent::$db->prepare('INSERT INTO contato(nome, sobrenome, email, telefone, msg) VALUES(:nome, :sobrenome, :email, :telefone, :msg)');
        return $query->execute($dados);
    }
    public function getByLogin($q){
        $query = parent::$db->prepare('SELECT * FROM usuario WHERE login LIKE :q');
        $query->execute(['q' => '%'.$q.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getHash($l){
        $query = parent::$db->prepare('SELECT nome,login,senha, email,celular,adm FROM usuario WHERE login LIKE :l ORDER BY nome');
        $query->execute(['l' => '%'.$l.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($q){
        $query = parent::$db->prepare('SELECT * FROM usuario WHERE id LIKE :q');
        $query->execute(['q' => '%'.$q.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function alterarSenha($dados){
        $query = parent::$db->prepare('UPDATE usuario SET senha=:senha
                                       WHERE id LIKE :id');
        return $query->execute($dados);
    }
    public function novoUsuario($dados){

        $query = parent::$db->prepare('INSERT INTO usuario(senha, nome, sobrenome, login, email, celular, adm, complemento, cep, rua, bairro, cidade, numero) VALUES(:senha, :nome, :sobrenome, :login, :email, :celular, 0, :complemento, :cep, :rua, :bairro, :cidade, :numero)');
        return $query->execute($dados);

    }

    public function update($dados){

        $query = parent::$db->prepare('UPDATE usuario SET nome=:nome,
                                       sobrenome=:sobrenome,
                                       email=:email,
                                       celular=:celular,
                                       complemento=:complemento,
                                       cep=:cep,
                                       rua=:rua,
                                       bairro=:bairro,
                                       cidade=:cidade,
                                       numero=:numero
                                       WHERE id LIKE :id');
        return $query->execute($dados);
    }

    public function getContatos(){
        $query = parent::$db->prepare("SELECT * FROM contato");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
