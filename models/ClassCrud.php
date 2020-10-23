<?php
namespace Models;

class ClassCrud extends ClassConnection{

    private $crud;

    #query preparation and execute
    private function prepareExecute($prep, $exec)
    {
        $this->crud = $this->connectDB()->prepare($prep);
        $this->crud->execute($exec);
    }

    public function selectAllDB($table, $exec)
    {
        $this->prepareExecute("select * from {$table}", $exec);
        return $this->crud;
    }

    /**
     * @param string $fields teste
     * @param string $table
     * @param string $where
     * @param array $exec
     * @return mixed
     */
    public function selectDB($fields, $table, $where, $exec)
    {
        $this->prepareExecute("select {$fields} from {$table} {$where}", $exec);
        return $this->crud;
    }

    public function insertDB($table, $values, $exec)
    {
        $this->prepareExecute("insert into {$table} values({$values})", $exec);
        return $this->crud;
        
    }
    
    public function deleteDB($table, $where, $exec)
    {
        $this->prepareExecute("delete from {$table} where {$where}", $exec);
        return $this->crud;
    }

    public function updateDB($table, $exec)
    {
        $stmt = "";
        if ($table == "users") {
            $stmt = "update {$table} 
                        set nome=:nome,
                            email=:email,
                            senha=:senha
                            dataNascimento=:dataNascimento,
                            cpf=:cpf,
                            dataCriacao=:dataCriacao,
                            permissoes=:permissoes
                      where id=:id";

        } elseif ($table == "clients") {
            $stmt = "update {$table} 
                        set nome=:nome,
                            dataNascimento=:dataNascimento,
                            cpf=:cpf,
                            rg=:rg,
                            telefone=:telefone
                      where id=:id";

        } elseif ($table == "clients_address") {
            $stmt = "update {$table} 
                        set logradouro=:logradouro,
                            municipio=:municipio,
                            uf=:uf,
                            tipo=:tipo
                      where id=:id and clienteId=:clienteId";
        } else {
            return null;
        }
        $exe = $exec;

        $this->prepareExecute($stmt, $exe);
        return $this->crud;
    }

    public function selectDbMax($table, $exec)
    {
        $this->prepareExecute("select max(id) as lastId from {$table}", $exec);
        return $this->crud;
    }
}
