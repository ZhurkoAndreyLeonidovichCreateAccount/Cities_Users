<?php
    namespace Model;
    use DataBase\Connection;
    class City{

       public static function getCities(): array{
            $sql = "SELECT * FROM cities";
            $db = Connection::getInstance();
            $cities =  $db->dbQuery($sql)->fetchAll();
            return $cities;
        }

        public static function add(array $fields){
            $sql = "INSERT INTO cities (name) VALUES(:name)";
            $db = Connection::getInstance();
            $db->dbQuery($sql,$fields);
           
        }

        public static function edit(array $fields){
            $sql = "UPDATE cities SET name = :name WHERE id = :id";
            $db = Connection::getInstance();
            $db->dbQuery($sql,$fields);
           
        }

        public static function getCityById(int $id): array{
            $sql = "SELECT * FROM cities WHERE id = :id";
            $db = Connection::getInstance();
            $city = $db->dbQuery($sql,['id'=>$id])->fetch();
            return $city;
        }

        public static function delete(array $fields){
            $sql = "DELETE FROM cities WHERE id = :id";
            $db = Connection::getInstance();
            $db->dbQuery($sql,$fields);
           
        }


        public static function columnNames(){
            $sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='cities_users' AND `TABLE_NAME`='cities';";
            $db = Connection::getInstance();
            return $db->dbQuery($sql)->fetchAll();
        }

        public static function orderBycolumn($name, $direc='asc'){
            $sql = "SELECT * FROM cities ORDER BY $name $direc";
            $db = Connection::getInstance();
            return $db->dbQuery($sql)->fetchAll();
        }
    }
    