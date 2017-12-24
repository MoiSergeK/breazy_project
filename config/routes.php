<?php

namespace App\Config;

use App\Core\Common\Route;

/*
 * --------------------------------------------------<< COMMON >>-------------------------------------------------------
 */

Route::GET("/")->redirectTo("/projects/commercial");
Route::GET("/404")->handleBy("home", "_404");
Route::GET("/projects/commercial")->handleBy("home", "index");
Route::GET("/projects/my")->handleBy("home", "myProjects");
Route::GET("/login")->handleBy("auth", "index");
Route::GET("/try_login")->handleBy("auth", "login");
Route::GET("/logout")->handleBy("auth", "logout");
Route::GET("/get_card_info")->handleBy("home", "getCardInfo");
Route::GET("/logger")->handleBy("logger", "index");
Route::GET("/logger/add")->handleBy("logger", "addMessage");

Route::POST("/mail/add")->handleBy("home", "addMail");
Route::POST("/apply_filters")->handleBy("home", "applyFilter");

/*
 * ---------------------------------------------------<< ADMIN >>-------------------------------------------------------
 */

Route::GET("/admin")->if(Route::auth())->handleBy("admin", "index")->else()->redirectTo("/");
Route::GET('/admin/projects')->if(Route::auth())->handleBy("admin", "projects")->else()->redirectTo("/");
Route::GET('/admin/mails')->if(Route::auth())->handleBy("admin", "mails")->else()->redirectTo("/");
Route::DELETE('/admin/mails/delete')->if(Route::auth())->handleBy("admin", "deleteMail")->else()->redirectTo("/");
Route::GET('/admin/tags')->if(Route::auth())->handleBy("admin", "tags")->else()->redirectTo("/");

Route::POST('/admin/projects/add')->if(Route::auth())->handleBy("admin", "addProject")->else()->redirectTo("/");
Route::POST('/admin/projects/update')->if(Route::auth())->handleBy("admin", "updateProject")->else()->redirectTo("/");
Route::DELETE('/admin/projects/delete')->if(Route::auth())->handleBy("admin", "deleteProject")->else()->redirectTo("/");
Route::POST('/admin/projects/edit')->if(Route::auth())->handleBy("admin", "editProject")->else()->redirectTo("/");