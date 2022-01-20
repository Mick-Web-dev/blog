<?php

class Http {
    /**
     * @param string $url
     * @return void
     */
    public static function redirect(string $url): void
    {
        //ex-> redirect('index.php')
        header("Location: $url" );
        exit();
    }
}