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
        $allPlayers = '';

        if($statement->execute()){
            $allPlayers = $statement->fetchAll(PDO::FETCH_ASSOC);
        }else{
            error_log("Die Funktion sqlSelectStatement()konnte nicht ausgeführt werden!");
        }

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
            error_log("Die Funktion sqlPreparedStatement() konnte nicht ausgeführt werden!");
            return null;
        }
    }

    public function sqlPreparedStatementWithAjaxName($sqlStatement, $bindParams, $ajaxname){

        $pdo = $this->pdo;

        $statement = $pdo->prepare($sqlStatement);

        foreach ($bindParams as $key => &$value){
            $statement->bindParam(":$key", $value);
        }

        if($statement->execute()){

            $informations = $statement->fetchAll(PDO::FETCH_ASSOC);

            $output[$ajaxname] = $informations;

            $output = json_encode($output);

            return $output;
        }else{
            return null;
        }
    }
}
