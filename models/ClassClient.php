<?php
namespace Models;

class ClassClient extends ClassCrud{

    #return all user data
    public function getAllClient()
    {
        $b = $this->selectAllDB(
            "clients",
            array()
        );
        $fa = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $arrData = [
            "data" => $fa
        ];
    }

    #return user data
    public function getClientById($id, $join = false)
    {
        if ($join == false) {
            $b = $this->selectDB(    
                "*",
                "clients",
                "where id = ?",
                array(
                    $id
                )
            );
        } else {
            $b = $this->selectDB(    
                "c.*,
                ca.logradouro, 
                ca.municipio, 
                ca.uf, 
                ca.tipo",
                "clients c, clients_address ca",
                "where c.id = ? and c.id = ca.clienteId",
                array(
                    $id
                )
            );
        }            
        $f = $b->fetch(\PDO::FETCH_ASSOC);
        
        return $arrData = [
            "data" => $f
        ];
    }

    public function insertClient($arrClients)
    {
        $this->insertDB(
            "clients",
            "?,?,?,?,?,?",
            array(
                0,
                $arrClients['nome'],
                $arrClients['dataNascimento'],
                $arrClients['cpf'],
                $arrClients['rg'],
                $arrClients['telefone']
            )
        );

        $b = $this->selectDbMax(
                    "clients",
                    array()
                );
                $lastId = $b->fetch(\PDO::FETCH_ASSOC);

        $this->insertDB(
            "clients_address",
            "?,?,?,?,?,?",
            array(
                0,
                $lastId['lastId'],
                $arrClients['logradouro'],
                $arrClients['municipio'],
                $arrClients['uf'],
                $arrClients['tipo']
            )
        );
    }

    public function deleteClient($id)
    {
        $this->deleteDB(
            "clients",
            "id = ?",
            array(
                $id
            )
        );
        
        $this->deleteDB(
            "clients_address",
            "clienteId = ?",
            array(
                $id
            )
        );
    }

    public function updateClient($arrPost)
    {
        $this->updateDB(
            "clients",
            array(
                "id" => $arrPost['id'],
                "nome" => $arrPost['nome'],
                "dataNascimento" => $arrPost['dataNascimento'],
                "cpf" => $arrPost['cpf'],
                "rg" => $arrPost['rg'],
                "telefone" => $arrPost['telefone']
            )
        );

        $ce = $this->selectDB(
            "id,
             clienteId,
             logradouro, 
             municipio, 
             uf, 
             tipo",
            "clients_address",
            "where clienteId = ? and logradouro = ?",
            array(
                $arrPost['id'],
                $arrPost['logradouro']
            )
        );
        $f = $ce->fetch(\PDO::FETCH_ASSOC);
        $r = $ce->rowCount();
        $arrData = [
            "data" => $f,
            "rows" => $r
        ];

        if ($arrData['rows'] == 0) {
            $this->insertDB(
                "clients_address",
                "?,?,?,?,?,?",
                array(
                    0,
                    $arrPost['id'],
                    $arrPost['logradouro'],
                    $arrPost['municipio'],
                    $arrPost['uf'],
                    $arrPost['tipo']
                )
            );
        } else {
            $this->updateDB(
                "clients_address",
                array(
                    "id" => $arrData['data']['id'],
                    "clienteId" => $arrPost['id'],
                    "logradouro" => $arrPost['logradouro'],
                    "municipio" => $arrPost['municipio'],
                    "uf" => $arrPost['uf'],
                    "tipo" => $arrPost['tipo']
                )
            );
        }        
    }
}
