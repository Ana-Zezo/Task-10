<?php
if (!function_exists("pageTitle")) {
    function pageTitle()
    {
        $scriptName = $_SERVER["SCRIPT_NAME"];
        $stringToArray = explode("/", $scriptName);
        $sortedPathFile = end($stringToArray);
        $separate = explode(".", $sortedPathFile);
        $title = $separate[0];
        $title = ucfirst($title);
        if ($title == "index") {
            return $title = "Login";
        } else {
            return $title;
        }
    }
}
if (!function_exists("active")) {
    function active()
    {
        $scriptName = $_SERVER["SCRIPT_NAME"];
        $stringToArray = explode("/", $scriptName);
        $sortedPathFile = end($stringToArray);
        return $sortedPathFile;
    }
}
if (!function_exists('dd')) {
    function dd(...$x)
    {
        echo "<pre>";
        print_r($x);
        echo "</pre>";
    }
}

if (!function_exists("checkRequest")) {
    function checkRequest($method)
    {
        if ($_SERVER["REQUEST_METHOD"] === $method) {
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists("sanitize")) {
    function sanitize($input)
    {
        return trim(htmlspecialchars(htmlentities($input)));
    }
}
if (!function_exists("keySession")) {
    function keySession($key, $type = "danger")
    {
        if (isset($_SESSION[$key])) {
            echo "<div class=\"alert alert-$type text-dark my-3 d-flex justify-content-between\" role=\"alert\">";
            echo $_SESSION[$key];
?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
<?php
            echo "</div>";
            unset($_SESSION[$key]);
        }
    }
}

if (!function_exists("keyAndValueSession")) {
    function keyAndValueSession($key, $value, $type = "danger")
    {
        if (isset($_SESSION[$key][$value])) {
            echo "<div class=\"alert alert-$type text-dark d-flex my-3 justify-content-between \" role=\"alert\">";
            echo $_SESSION[$key][$value];
        ?>
<button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
<?php
            echo "</div>";
            unset($_SESSION[$key][$value]);
        }
    }
}

function deleteImage($image)
{
    if (file_exists($image)) {
        return unlink($image) ? true : false;
    } else {
        return false;
    }
}

function redirect($path, $sessionName, $sessionValue)
{
    $_SESSION["$sessionName"] = $sessionValue;
    return header("location:$path");
}