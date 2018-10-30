<?php

//header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');

http_response_code(404);

echo 'Not Found';

?>