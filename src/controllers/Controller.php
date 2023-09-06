<?php
namespace Src\Controllers;

abstract class Controller{
    protected function isAdmin(){
        //we check if we are connected and if isAdmin = true
        if(isset($_SESSION['users']) && $_SESSION['users']['is_admin'] == 1){
            //we are admin
            return true;
        }else{
            //echo "not admin";
            //we are not admin
            header('location: /OpenClassrooms_P5_create_your_first_blog_in_php/?success=true');//message vous n'avez pas accés à cette zone
        }
    }

    public function view(string $path, array $params = null){
            ob_start();
            $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
            require VIEWS . $path . '.php';
            if($params){
                $params = extract($params);
            }
            $content = ob_get_clean();
           
                require VIEWS . 'layout.php';
            
    }
}
