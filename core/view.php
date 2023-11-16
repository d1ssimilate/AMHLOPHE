<?php

class View {
    function generate($content, $template, $data = null) {
        include 'templates/'.$template.'.php';
    }
}