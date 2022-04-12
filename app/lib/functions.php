<?php

function user(){
    if(array_key_exists('user', $_SESSION)){
        return $_SESSION['user'];
    }
    return false;
}

function view($view, $vars){
    foreach($vars as $name => $value){
        $name = $value;
    }
    return require_once dirname(__DIR__, 2) . '/resources/views/layouts/app.php';
}

function redirect($url){
    header("Location: {$url}");
    return http_response_code() == 302;
}

function reject($code){
    switch($code){
        case 400:
            return header('HTTP/1.1 400 Bad Request');
        case 404:
            return header('HTTP/1.1 404 Not Found');
        default:
            return header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}

function selectOne($table, $id){
    return first("SELECT * FROM {$table} WHERE id = ?", $id);
}

function owner($id){
    ['user_id' => $userId] = selectOne('posts', $id);
    if($user = user()){
        return $userId == $user['id'];
    }
    return false;
}

function hit($path, $method = null){
    $is = ($_SERVER['PATH_INFO'] ?? '/') == $path;
    if($method){
        $is = $is && strtoupper($method) == $_SERVER['REQUEST_METHOD'];
    }
    return $is;
}

// function verify($guards){
//     foreach($guards as [$path, $method]){
//         if(hit($path, $method)){
//             $token = array_key_exists('token', $_REQUEST) ? filter_var($_REQUEST['token'], FILTER_SANITIZE_STRING) : null;
//             if(hash_equals($token, $_SESSION))
//         }
//     }
// }
