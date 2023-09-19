<?php
namespace Src\Controllers;
use Src\entity\User;

abstract class Controller{
    protected function isAdmin(): bool{
        //we check if we are connected and if isAdmin = true
        if(isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1){
            return true;
        }else{
            header('location: /openclassrooms_P5_Blog_Post/?success=true');
        }
    }
    protected function createToken(){
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['csrf_token_time'] = time();
          }
    }
    protected function validateToken(){
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("problem whith CSRF token");
          }else{
            $max_time = 60*60*24;
            if (isset($_SESSION['csrf_token_time'])){
                $token_time = $_SESSION['csrf_token_time'];
                if(($token_time + $max_time) >= time()){

                }else{
                    unset($_SESSION['csrf_token']);
                    unset($_SESSION['csrf_token_time']);
                    die ("CSRF Token expired");
                }
            }
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
