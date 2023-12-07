<?php
/**
* Format Class
*/
class Format{
public function formatDate($date){
return date('F j, Y, g:i a', strtotime($date));
// 'F': Tháng trong dạng văn bản, ví dụ: "January" cho tháng 1, "February" cho tháng 2, vv.

// 'j': Ngày không có số 0 đầu tiên, ví dụ: "1" cho ngày 1, "15" cho ngày 15.

// 'Y': Năm dạng bốn chữ số, ví dụ: "2022".

// 'g': Giờ trong định dạng 12 giờ không có số 0 đầu tiên, ví dụ: "1" cho 1 giờ, "11" cho 11 giờ.

// 'i': Phút, ví dụ: "05" cho 5 phút.

// 'a': Buổi sáng (AM) hoặc buổi chiều (PM).
}

public function textShorten($text, $limit = 400){
$text = $text. " ";
$text = substr($text, 0, $limit);
$text = substr($text, 0, strrpos($text, ' '));
$text = $text.".....";
return $text;
}

public function validation($data){
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data);
return $data;
}

public function title(){
$path = $_SERVER['SCRIPT_FILENAME'];
$title = basename($path, '.php');
//$title = str_replace('_', ' ', $title);
if ($title == 'index') {
$title = 'home';
}elseif ($title == 'contact') {
$title = 'contact';
}
return $title = ucfirst($title);
}
}
?>