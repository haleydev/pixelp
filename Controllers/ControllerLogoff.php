<?php
namespace Controller;
class ControllerLogoff
{
    public function logoff()
    {
        session_start();
        ob_start();
        session_destroy();
        ob_clean();
        ob_end_clean();
        header("Location: /");        
    }
}
