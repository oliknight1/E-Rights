<?php

// Escapes the input to prevent sql injection
function escape($string)
{
    return htmlspecialchars($string);
}
