<?php

namespace App\Config;

use App\Core\Common\Route;

Route::GET("/")->redirectTo("/projects/commercial");

Route::GET("/404")->handleBy("home", "_404");

Route::POST("/apply_filters")->handleBy("home", "applyFilters");

Route::GET("/projects/commercial")->handleBy("home", "index");

Route::GET("/projects/my")->handleBy("home", "myProjects");

Route::GET("/admin")->if(Route::auth())->handleBy("admin", "index")->else()->redirectTo("/login");

Route::GET('/admin/projects')->if(Route::auth())->handleBy("admin", "projects")->else()->redirectTo("/");

Route::GET('/admin/projects/add')->if(Route::auth())->handleBy("admin", "projects")->else()->redirectTo("/");

Route::GET('/admin/projects/update')->if(Route::auth())->handleBy("admin", "projects")->else()->redirectTo("/");

Route::GET('/admin/projects/delete')->if(Route::auth())->handleBy("admin", "projects")->else()->redirectTo("/");

Route::GET('/admin/projects/edit')->if(Route::auth())->handleBy("admin", "projects")->else()->redirectTo("/");

Route::GET("/login")->handleBy("auth", "index");

Route::GET("/logout")->handleBy("auth", "logout");