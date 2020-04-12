<?php

class DataBase{

    public $dbname;
    public $username;
    public $password;
    public $pdo;

    public function connection(){

        $databaseIni = parse_ini_file("../configurations/database.ini");

        $dbuser = $databaseIni['dbuser'];
        $db = $databaseIni['db'];
        $password = $databaseIni['password'];

        $this->dbname = $db;
        $this->username = $dbuser;
        $this->password = $password;
        $this->pdo = new PDO($this->dbname, $this->username, $this->password);

    }

    public function sqlSelectStatement($sqlStatement){

        $pdo = $this->pdo;

        $statement = $pdo->prepare($sqlStatement);
        $statement->execute();
        $allPlayers = $statement->fetchAll(PDO::FETCH_ASSOC);

        $allPlayers = json_encode($allPlayers);

        return $allPlayers;
    }

    public function sqlPreparedStatementOLD($sqlStatement, $bindParams){

        $pdo = $this->pdo;

        $statement = $pdo->prepare($sqlStatement);
        $statement->bindParam(":LICENCENR", $bindParams['licenceNr']);
        $statement->bindParam(":CURRENTMONTH", $bindParams['currentMonth']);

        $statement->execute();
        $playerInformations = $statement->fetchAll(PDO::FETCH_ASSOC);

        $playerInformations = json_encode($playerInformations);

        return $playerInformations;
    }

    public function sqlPreparedStatement($sqlStatement, $bindParams){

        $pdo = $this->pdo;

        $statement = $pdo->prepare($sqlStatement);

        foreach ($bindParams as $key => &$value){
            $statement->bindParam(":$key", $value);
        }

        if($statement->execute()){

            $informations = $statement->fetchAll(PDO::FETCH_ASSOC);

            $informations = json_encode($informations);

            return $informations;
        }else{
            return null;
        }
    }

    public function sqlPreparedStatement3($sqlStatement, $bindParams){

        $pdo = $this->pdo;

        $statement = $pdo->prepare($sqlStatement);

        foreach ($bindParams as $param => $value){
            $statement->bindParam(":$param", $value);
        }

        if($statement->execute()){
            $informations = $statement->fetchAll(PDO::FETCH_ASSOC);
            print_r($informations);

            $informations = json_encode($informations);

            return $informations;
        }else{
            return "Kilian";
        }
    }
}
