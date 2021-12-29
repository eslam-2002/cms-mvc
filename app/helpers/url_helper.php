<?php
function redirect($location){
    header("location: ".URL_ROOT."/".$location);

}