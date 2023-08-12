<?php
    namespace Model;
    use DataBase\Connection;
    class User{
        public static function getUsers(): array{
            $sql = "SELECT users.*, cities.name as city  FROM users 
                    JOIN cities ON cities.Id = users.city_id";
           
            $db = Connection::getInstance();
            $users =  $db->dbQuery($sql)->fetchAll();
            return $users;
        }

        public static function getUserById(int $id): array{
            $sql = "SELECT users.*, cities.name as city  FROM users 
                    JOIN cities ON cities.Id = users.city_id
                    WHERE users.id = :id";
           
            $db = Connection::getInstance();
            $users =  $db->dbQuery($sql, ['id'=>$id])->fetch();
            return $users;
        }

        public static function add(array $fields) {
            $sql = "INSERT INTO users (name, last_name, image_url, city_id) VALUES(:name, :last_name, :image_url, :city_id)";
            $db = Connection::getInstance();
            $db->dbQuery($sql,$fields);
        }

        public static function edit(array $fields){
            $sql = "UPDATE users SET name = :name, last_name = :last_name, image_url = :image_url,
                    city_id = :city_id WHERE id = :id";
            $db = Connection::getInstance();
            $db->dbQuery($sql,$fields);
           
        }

        public static function delete(array $fields){
            $sql = "DELETE FROM users WHERE id = :id";
            $db = Connection::getInstance();
            $db->dbQuery($sql,$fields);
           
        }

        
        public static function columnNames(){
            $sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='cities_users' AND `TABLE_NAME`='users';";
            $db = Connection::getInstance();
            return $db->dbQuery($sql)->fetchAll();
        }

        public static function orderBycolumn($name, $direc='asc'){
            $sql = "SELECT users.*, cities.name as city  FROM users 
                    JOIN cities ON cities.Id = users.city_id
                    ORDER BY $name $direc";
            $db = Connection::getInstance();
            return $db->dbQuery($sql)->fetchAll();
        }

        public static function getUsersByCityID($id): array{
            $sql = "SELECT users.*, cities.name as city  FROM users 
                    JOIN cities ON cities.Id = users.city_id AND  cities.Id = $id";        
            $db = Connection::getInstance();
            $users =  $db->dbQuery($sql)->fetchAll();
            return $users;
        }


        public static function searchUsers(array $ids): array{
            $query = '';
            $count = 0;
            foreach( $ids as $id){
                if($count === 0) {
                    $query = "WHERE users.ID = $id";
                }
                $query .= " OR users.ID = $id";
            }
            $sql = "SELECT users.*, cities.name as city  FROM users 
                    JOIN cities ON cities.Id = users.city_id $query";
           
            $db = Connection::getInstance();
            $users =  $db->dbQuery($sql)->fetchAll();
            return $users;
        }
    }
 