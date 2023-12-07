<?php
/**
*Session Class
**/
class Session{
public static function init(){
if (version_compare(phpversion(), '8.2.4', '<')) {
if (session_id() == '') {
session_start();
}
} else {
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
}
}

public static function set($key, $val){
$_SESSION[$key] = $val;
}

public static function get($key){
if (isset($_SESSION[$key])) {
return $_SESSION[$key];

} else {
return false;
}
}

public static function checkSession(){
self::init();
if (self::get("login")== false) {
self::destroy();
header("Location:login.php"); //Tú làm login xong đưa lại file vào đây //trang login khi chưa đang nhập phải vào đây
}
}

public static function checkLogin(){
self::init();
if (self::get("login")== true) {
header("Location:index.php"); // nếu đăng nhập được rồi cho vào đây
}
}

public static function destroy(){
session_destroy();
header("Location:login.php"); // ra phiên làm việc mới
}
}

?>;