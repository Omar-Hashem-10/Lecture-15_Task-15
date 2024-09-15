<?php

class Response
{
  private $statusCode;
  private $headers = [];
  private $body;

  public function __construct($statusCode = 200, $body = '', $headers = [])
  {
    $this->statusCode = $statusCode;
    $this->body = $body;
    $this->headers = $headers;
  }

  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }

  public function getStatusCode()
  {
    return $this->statusCode;
  }

  public function setHeader($name, $value)
  {
    $this->headers[$name] = $value;
  }

  public function getHeader($name)
  {
    return isset($this->headers[$name])? $this->headers[$name] :  null;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function send()
  {
    http_response_code($this->statusCode);
    foreach ($this->headers as $name => $value) {
      header("$name: $value");
    }
    echo $this->body;
  }
}

$response = new Response(200, 'Hello, World!', ['Content-Type' => 'text/plain']);
$response->send();