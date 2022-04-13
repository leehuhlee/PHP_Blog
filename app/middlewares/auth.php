<?php

$is = guard([
    '/user/update',
    '/post/write',
    '/post/update',
    '/post/delte'
]);

if($is){
    return guard(['/image']) ?: reject(400);
}
return redirect('/auth/login');