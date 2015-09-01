<?php

require_once 'model.php';

$posts = get_all_posts();

require 'templates/list.php';

/**
 * Now, the sole task of the controller is to get data from the model layer of the application
 * (the model) and to call a template to render that data. This is a very simple example
 * of the model-view-controller pattern.
 */
