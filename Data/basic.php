<?php
    session_start();
    
    function isConnected()
    {
        if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
        {
            return true;
        }
        return false;
    }
    function isAdmin()
    {
        if(isConnected())
        {
            if(isset($_SESSION['admin']) && !empty($_SESSION['admin']))
            {
                if($_SESSION['admin'] == 1)
                {
                    return true;
                }
            }
        }
        return false;
    }

?>