<?php

class Session{
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function get($key)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  public static function flash($key)
  {
    if (isset($_SESSION[$key])) {
      $value = $_SESSION[$key];
      unset($_SESSION[$key]);
      return $value;
    }
    return null;
  }

  public static function getAll()
  {
    return $_SESSION;
  }

  public static function remove($key)
  {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }

  public static function removeAll()
  {
    session_unset();
  }

  public static function check($key)
  {
    return isset($_SESSION[$key]);
  }
}
