<?php

class DataBase
{

    public $dbname;
    public $username;
    public $password;
    public $pdo;

    public function connection()
    {

        $databaseIni = parse_ini_file("../configurations/database.ini");

        $dbuser = $databaseIni['dbuser'];
        $db = $databaseIni['db'];
        $password = $databaseIni['password'];

        $this->dbname = $db;
        $this->username = $dbuser;
        $this->password = $password;
        $this->pdo = new PDO($this->dbname, $this->username, $this->password);

    }

    public function sqlSelectStatement($sqlStatement)
    {

        $pdo = $this->pdo;

        $statement = $pdo->prepare($sqlStatement);
        $statement->execute();
        $allPlayers = $statement->fetchAll(PDO::FETCH_ASSOC);

        $allPlayers = json_encode($allPlayers);

        return $allPlayers;
    }
}
