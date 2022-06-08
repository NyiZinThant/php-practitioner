<?php

$router->get("", "PagesController@index");

$router->get("contact", "PagesController@contact");

$router->get("about", "PagesController@about");

$router->post("users", "UsersController@store");

$router->get("users", "UsersController@index");