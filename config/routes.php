<?php

namespace App\Config;

use App\Core\Common\Routing\Route;

/*
 * --------------------------------------------------<< COMMON >>-------------------------------------------------------
 */

Route::GET("/404")->load("home", "_404");

Route::GET("/")->go("/projects/commercial");
Route::GET("/projects/commercial")->load("home", "index");
Route::GET("/projects/my")->load("home", "myProjects");
Route::GET("/login")->load("auth", "index");
Route::POST("/try_login")->load("auth", "login");
Route::GET("/logout")->load("auth", "logout");
Route::GET("/get_card_info")->load("home", "getCardInfo");
Route::GET("/logger")->load("logger", "index");
Route::GET("/logger/add")->load("logger", "addMessage");

Route::POST("/mail/add")->load("home", "addMail");
Route::POST("/apply_filters")->load("home", "applyFilter");

/*
 * ---------------------------------------------------<< ADMIN >>-------------------------------------------------------
 */

Route::GET("/admin")->if(Route::auth())->load("admin", "index")->else()->go("/login");
Route::GET('/admin/projects')->if(Route::auth())->load("admin", "projects")->else()->go("/");
Route::GET('/admin/mails')->if(Route::auth())->load("admin", "mails")->else()->go("/");
Route::GET('/admin/mails/delete')->if(Route::auth())->load("admin", "deleteMail")->else()->go("/");
Route::GET('/admin/tags')->if(Route::auth())->load("admin", "tags")->else()->go("/");
Route::POST('/admin/tags/add')->if(Route::auth())->load("admin", "addTag")->else()->go("/");
Route::GET('/admin/tags/delete')->if(Route::auth())->load("admin", "deleteTag")->else()->go("/");

Route::POST('/admin/projects/add')->if(Route::auth())->load("admin", "addProject")->else()->go("/");
Route::POST('/admin/projects/update')->if(Route::auth())->load("admin", "updateProject")->else()->go("/");
Route::GET('/admin/projects/delete')->if(Route::auth())->load("admin", "deleteProject")->else()->go("/");
Route::GET('/admin/projects/edit')->if(Route::auth())->load("admin", "editProject")->else()->go("/");
Route::POST('/admin/projects/update')->if(Route::auth())->load("admin", "updateProject")->else()->go("/");