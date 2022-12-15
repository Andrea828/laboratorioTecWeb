<?php

namespace DB;

Class DBAccess {
    private const HOST_db = "127.0.0.1";
    private const DATABASE_NAME = "anmenegh";
    private const USERNAME = "anmenegh";
    private const PASSWORD = "Ohpaighawoo1zohm";

    private $connection;

    public function openDBConnection() {

        mysqli_report(MYSQLI_REPORT_ERROR);

        $this->connection = mysqli_connect(
            DBAccess::HOST_DB, DBAccess::USERNAME,
            DBAccess::PASSWORD,DBAccess::DATABASE_NAME
        );

        if(mysqli_connect_errno()) {
            return false;
        } else {
            return true;
        }
    }

    public function getList() {
        $query = "SELECT * FROM giocatori ORDER BY ID ASC";

        $queryResult = mysqli_query($this->connection, $query) or die("Errore in openDBConnection" . mysqli_error($this->connection));

        if(mysqli_num_rows($queryResult)==0) {
            return null;
        } else {
            $result = array();
            while($riga = mysqli_fetch_assoc($queryResult)){
                array_push($result, $riga);
            }
            $queryResult->free();
            return $result;
        }
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }
}