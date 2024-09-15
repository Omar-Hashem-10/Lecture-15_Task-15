<?php


class Request{

  public static function getPost($key = NULL)
  {
    if($key === NULL){
      return $_POST;
    }
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : "Not found this key";
  }

  public static function getGet($key = NULL)
  {
    if($key === NULL){
      return $_GET;
    }
    return isset($_GET[$key]) ? htmlspecialchars($_GET[$key]) : "Not found this key";
  }

  public static function getPut($key = null)
  {
      parse_str(file_get_contents('php://input'), $put_vars);
      if ($key === null) {
          return $put_vars;
      }
      return isset($put_vars[$key]) ? htmlspecialchars($put_vars[$key]) : "Not found this key";
  }

  public static function getDelete($key = null)
  {
      parse_str(file_get_contents('php://input'), $delete_vars);
      if ($key === null) {
          return $delete_vars;
      }
      return isset($delete_vars[$key]) ? htmlspecialchars($delete_vars[$key]) : "Not found this key";
  }

  public static function getHeader($header)
  {
      $header = strtoupper(str_replace('-', '_', $header));
      return isset($_SERVER["HTTP_$header"]) ? $_SERVER["HTTP_$header"] : "Not found this key";
  }

  public static function getFiles($key = null)
  {
      if ($key === null) {
          return $_FILES;
      }
      return isset($_FILES[$key]) ? $_FILES[$key] : "Not found this key";
  }

  public static function has($key, $method)
    {
      switch (strtolower($method)) {
        case 'post':
          return isset($_POST[$key]);
        case 'get':
          return isset($_GET[$key]);
        case 'put':
          parse_str(file_get_contents('php://input'), $put_vars);
          return isset($put_vars[$key]);
        case 'delete':
          parse_str(file_get_contents('php://input'), $delete_vars);
          return isset($delete_vars[$key]);
        default:
          return "Invalid method";
      }
    }
}