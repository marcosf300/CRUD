<?php

class UserDAO{
    
    public function create(User $User) {
        try {
            $sql = "INSERT INTO User (                   
                  name,surname,age,gender)
                  VALUES (
                  :name,:surname,:age,:gender)";

            $p_sql = Conection::getConection()->prepare($sql);
            $p_sql->bindValue(":name", $User->getName());
            $p_sql->bindValue(":surname", $User->getSurname());
            $p_sql->bindValue(":age", $User->getAge());
            $p_sql->bindValue(":gender", $User->getGender());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir User <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM User order by name asc";
            $result = Conection::getConection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsers($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(User $User) {
        try {
            $sql = "UPDATE User set
                
                  name=:name,
                  surname=:surname,
                  age=:age,
                  gender=:gender                  
                                                                       
                  WHERE id = :id";
            $p_sql = Conection::getConection()->prepare($sql);
            $p_sql->bindValue(":name", $User->getName());
            $p_sql->bindValue(":surname", $User->getSurname());
            $p_sql->bindValue(":age", $User->getAge());
            $p_sql->bindValue(":gender", $User->getGender());
            $p_sql->bindValue(":id", $User->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(User $User) {
        try {
            $sql = "DELETE FROM User WHERE id = :id";
            $p_sql = Conection::getConection()->prepare($sql);
            $p_sql->bindValue(":id", $User->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir User<br> $e <br>";
        }
    }


    

    private function listaUsers($row) {
        $User = new User();
        $User->setId($row['id']);
        $User->setName($row['name']);
        $User->setSurname($row['surname']);
        $User->setAge($row['age']);
        $User->setGender($row['gender']);

        return $User;
    }
 }

 ?>
