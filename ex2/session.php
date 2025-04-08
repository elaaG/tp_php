<?php

class Session
{
    public $sessioninfos=[];

    public function __construct()
    {
        session_start();
        if (isset($_SESSION['sessioninfos'])) {
            $this->sessioninfos = $_SESSION['sessioninfos'];
        } else {
            $this->sessioninfos = [];
        }

    }

    public function exists($key)
    {
        return isset($this->sessioninfos[$key]);
    }
    
    public function incrementer($key)
    {
        if ($this->exists($key)) {
            $this->sessioninfos[$key]++;
        }
        else {
            $this->sessioninfos[$key] = 1;
        }
        $_SESSION[$key] = $this->sessioninfos[$key];
    }
    public function destroy()
    {
        session_destroy();
        $this->sessioninfos = [];
    }
    public function set($key, $value)
    {
        $this->sessioninfos[$key] = $value;
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if ($this->exists($key)) {
            return $this->sessioninfos[$key];
        }
        return null;
    }



}