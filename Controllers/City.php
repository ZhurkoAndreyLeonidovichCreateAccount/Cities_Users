<?php
namespace Controllers;
use Model\City as Model;

class City{

    public static function index(){
        $cities = Model::getCities();
        $html = template('Cities/v_index', ['cities'=>$cities]);
        return $html;
    }

    public static function add(){
        if(isset($_POST['ins'])){
            $content = template('Cities/v_add');
            return  $content;
        }
        $name =  $_POST['name']; 
        Model::add(['name'=>$name]);
        header("Location: " . BASE_URL);
        exit();
    }

    public static function edit(){
        if(isset($_POST['edit_fors_city'])){
            $model = Model::getCityById($_POST['id']);
            $content = template('Cities/v_edit',['id'=>$model['id'], 'name'=>$model['name']]);
            return  $content;
        }
        $name =  $_POST['name'];
        $id =  $_POST['id'];
        Model::edit(['id'=>$id,'name'=>$name]);
        header("Location: " . BASE_URL);
        exit();
    }

    public static function delete(){     
        $id =  $_POST['id'];
        Model::delete(['id'=>$id]);
        header("Location: " . BASE_URL);
        exit();
    }

    public static function sort(){
        $content = '';
        if(isset($_POST['sort'])){
            $columnNames = Model::columnNames(); 
            $content = template('Cities/v_sort',['columnNames'=>$columnNames]);
            return  $content;
        }
        $name = $_POST['name'];
        $direc = $_POST['direc'];
        $cities = Model::orderBycolumn($name,$direc);
        $content = template('Cities/v_index', ['cities'=>$cities]);
        return $content;
              
    }
}