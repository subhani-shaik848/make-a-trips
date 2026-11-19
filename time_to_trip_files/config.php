<?php
declare(strict_types=1);
if(session_status()===PHP_SESSION_NONE)session_start();
define('DB_HOST','localhost');define('DB_NAME','time_to_trip');define('DB_USER','root');define('DB_PASS','');
function db():PDO{static $pdo=null;if($pdo instanceof PDO)return $pdo;$pdo=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',DB_USER,DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);return $pdo;}
function e(?string $s):string{return htmlspecialchars($s??'',ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');}
function is_logged_in():bool{return isset($_SESSION['user_id']);}
function current_user():?array{if(!is_logged_in())return null;static $u=false;if($u!==false)return $u;$s=db()->prepare('SELECT id,name,email,created_at FROM users WHERE id=?');$s->execute([$_SESSION['user_id']]);$u=$s->fetch()?:null;return $u;}
function require_login():void{if(!is_logged_in()){$_SESSION['flash']='Please sign in to continue.';header('Location: signin.php');exit;}}
function csrf_token():string{if(empty($_SESSION['csrf_token']))$_SESSION['csrf_token']=bin2hex(random_bytes(32));return $_SESSION['csrf_token'];}
function verify_csrf():void{$t=$_POST['csrf_token']??'';if(!is_string($t)||!hash_equals(csrf_token(),$t)){http_response_code(419);exit('Form expired. Refresh and try again.');}}
function flash_message():string{$m=(string)($_SESSION['flash']??'');unset($_SESSION['flash']);return $m;}
