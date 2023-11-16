<?php

require_once 'core/model.php';
require_once 'core/router.php';
require_once 'core/controller.php';
require_once 'core/view.php';

new Router();
Router::route();