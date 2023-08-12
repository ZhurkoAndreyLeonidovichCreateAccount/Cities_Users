<?php
function template(string $path, array $vars = []):string  {
        
        $systemPath = "views/$path.php";
        extract($vars);
        ob_start();
        include($systemPath);
        return ob_get_clean();
}
