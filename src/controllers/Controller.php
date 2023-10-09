<?php
namespace Src\Controllers;

abstract class Controller
{

    /**
     * we check if we are connected and if isAdmin = true
     *
     * @return bool
     */
    protected function isAdmin(): bool
    {
        if(isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1){
            return true;
        }else{
            return false;
        }
    }
    /**
     * validate form : create token
     *
     * @return void
     */
    protected function createToken(): void
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['csrf_token_time'] = time();
          }
    }
    /**
     * validate form : validate Token
     *
     * @return void
     */
    protected function validateToken(): void
    {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            echo "problem whith CSRF token";
          }else{
            $max_time = 60*60*24;
            if (isset($_SESSION['csrf_token_time'])){
                $token_time = $_SESSION['csrf_token_time'];
                if(($token_time + $max_time) >= time()){

                }else{
                    unset($_SESSION['csrf_token']);
                    unset($_SESSION['csrf_token_time']);
                    echo "CSRF Token expired";
                }
            }
          }
    }
/**
     * validate form : configure and return views
     *
     * @return void
     */
    public function view(string $path, array $params = null): void
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
            if($params){
                $params = extract($params);
            }
            $content = ob_get_clean();
            if($this->isAdmin()){               
                require (VIEWS . 'layoutAdmin.php');
            }else{
                require (VIEWS . 'layout.php');
            }
    }
}
