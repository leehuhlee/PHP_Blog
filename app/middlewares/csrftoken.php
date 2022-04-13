<?php

return verify([
    ['/auth/login', 'POST'],
    ['/auth/write', 'POST'],
    ['/auth/update', 'POST'],
    ['/auth/delete', 'GET'],
    ['/user/register', 'POST'],
    ['/user/update', 'POST'],
]) ?: reject(400);