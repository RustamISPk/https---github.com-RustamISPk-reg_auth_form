<?php
namespace database\connection;
class DataBaseConnection{
public $host;
public $login;
public $password;
public $database;
public $port;
public $database_table;

public function __construct($host, $login, $password, $database, $port, $database_table) {
    $this->host = $host;
    $this->login = $login;
    $this->password = $password;
    $this->database = $database;
    $this->port = $port;
    $this->database_table = $database_table;
}
public function register_user($login, $pass, $description, $age, $date_time, $date){
    $conn = new \mysqli($this->host, $this-> login, $this->password, $this->database, $this->port);
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO $this->database_table (accounts, user_password, user_description, age, register_date, register_time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $login, $pass, $description, $age, $date, $date_time);
    $stmt->execute();
    $conn->close();
}
public function authentication_user($login, $pass){
    $conn = new \mysqli($this->host, $this-> login, $this->password, $this->database, $this->port);
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $search_query = "SELECT * FROM $this->database_table WHERE accounts LIKE '%{$login}%'";
    $result = $conn->query($search_query);
    $result = $result->fetch_assoc();
    $conn->close();
    return $result;
}
public function last_registreted_users(){
    $conn = new \mysqli($this->host, $this-> login, $this->password, $this->database, $this->port);
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $search_query1 = "SELECT * FROM $this->database_table";
    $result = $conn->query($search_query1);
    $result1 = $result->fetch_all();
    $conn->close();
    return $result1;
}
};