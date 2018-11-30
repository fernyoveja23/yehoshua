<?php
class MySQLConfig
{
  //define('MIN_VALUE', '0.0');  WRONG - Works OUTSIDE of a class definition.
  //define('MAX_VALUE', '1.0');  WRONG - Works OUTSIDE of a class definition.

  private const protocolo = "http:";
  private const host = "localhost";
  private const port = 3306;
  private const username = "root";
  private const password = "";
  private const database = "yehoshua";    

  public static function getprotoclo()
  {
    return self::protocolo;
  }

  public static function gethost()
  {
    return self::host;
  }
  public static function getport()
  {
    return self::port;
  }
  public static function getusername()
  {
    return self::username;
  }
  public static function getpassword()
  {
    return self::password;
  }
  public static function getdatabase()
  {
    return self::database;
  }
} 


?>