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

    public function select($fields, $table, $where, $exec)
    {
        $this->prepareExecute("select {$fields} from {$table} {$where}", $exec);
        return $this->crud;
    }

    public function insert($table, $values, $exec)
    {
        $this->prepareExecute("insert into {$table} values({$values})", $exec);
        return $this->crud;
    }
    
    public function delete($table, $where, $exec)
    {
        $this->prepareExecute("delete from {$table} where {$where}", $exec);
        return $this->crud;
    }

    public function update($table, $values, $where, $exec)
    {
        $this->prepareExecute("update {$table} set {$values} where {$where}", $exec);
        return $this->crud;
    }
}
