<?php
namespace Src\Controllers;

abstract class Controller{
    protected function isAdmin(): bool{
        //we check if we are connected and if isAdmin = true
        if(isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1){
            return true;
        }else{
            header('location: /openclassrooms_P5_Blog_Post/?success=true');
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
            if(isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1){
                
                require (VIEWS . 'layoutAdmin.php');
            }else{
                require (VIEWS . 'layout.php');
            }
    }
}
