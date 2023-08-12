<?php
namespace Controllers;
use Model\User as Model;
use Model\City as ModelCity;
class User{
    public static function index(){
        $users = Model::getUsers();
        $cities =  ModelCity::getCities();
        $html = template('Users/v_index', ['users'=>$users, 'cities'=>$cities]);
        return $html;
    }

    public static function add(){
        if(isset($_POST['ins2'])){
            $cities = ModelCity::getCities();
            $content = template('Users/v_add',['cities'=>$cities]);
            return  $content;
        }
        $file = $_FILES['img'];
        $image_url = '';
        $allowed_exs = array("jpg", "jpeg", "png");
        $img_ex = pathinfo($file['name'], PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        if ($file['error'] === 0 && in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$image_url = 'assets/uploads/'.$new_img_name;
				move_uploaded_file($file['tmp_name'],  $image_url);
        }

        Model::add([ 'name'=>$_POST['name'],
                    'last_name'=> $_POST['last_name'],
                    'city_id'=>$_POST['city_id'],
                    'image_url'=>$image_url,
            ]);
        header("Location: " . BASE_URL. "Users");
        exit();
    }

    public static function edit(){
        $user = Model::getUserById($_POST['id']);
        if(isset($_POST['edit_fors_names'])){
            $cities = ModelCity::getCities();
            $content = template('Users/v_edit',['user'=>$user,'cities'=>$cities]);
            return  $content;
        }     
        $image_url = $user['image_url'];
        $file = $_FILES['img'];
        $allowed_exs = array("jpg", "jpeg", "png");
        if ($file['error'] === 0) {
            $allowed_exs = array("jpg", "jpeg", "png");
            $img_ex = pathinfo($file['name'], PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $image_url = 'assets/uploads/'.$new_img_name;
                move_uploaded_file($file['tmp_name'],  $image_url);
            }
                
        }
        Model::edit(['name'=>$_POST['name'],
                    'last_name'=>$_POST['last_name'],
                    'city_id'=>$_POST['city_id'],
                    'image_url'=>$image_url,
                    'id'=>$_POST['id']
            ]);
        header("Location: " . BASE_URL. "Users");
        exit();

    }

    public static function delete(){     
        $id =  $_POST['id'];
        Model::delete(['id'=>$id]);
        header("Location: " . BASE_URL. "Users");
        exit();
    }

    public static function sort(){
        $content = '';
        if(isset($_POST['sort2'])){
            $columnNames = Model::columnNames(); 
            $content = template('Users/v_sort',['columnNames'=>$columnNames]);
            return  $content;
        }
        $name = $_POST['name'];
        $direc = $_POST['direc'];
        $users = Model::orderBycolumn($name,$direc);
        $content = template('Users/v_index', ['users'=> $users]);
        return $content;
              
    }

    public static function filter(){
        $users = Model::getUsersByCityID($_POST['id']);
        $cities =  ModelCity::getCities();
        $html = template('Users/v_index', ['users'=>$users, 'cities'=>$cities]);
        return $html;
    }

    public static function search(){
        if(!isset($_POST['search'])){
            $html = template('Users/v_search');
            return $html;
        }
       
        $users = Model::getUsers();
        $haystack = trim(strtolower($_POST['search']));
        $ids = [];
       foreach($users as $user){
            if(is_numeric(strpos($haystack, strtolower($user['name']))) || 
                is_numeric(strpos($haystack, strtolower($user['last_name'])))){
                    $ids[] = $user['id'];
            }
       }
       if(!empty($ids)){
            $filterUsers = Model::searchUsers($ids);
            $cities =  ModelCity::getCities();
            $html = template('Users/v_index', ['users'=>$filterUsers, 'cities'=>$cities]);
            return $html;
       }
       
       header("Location: " . BASE_URL. "Users");
       exit();
    }

}