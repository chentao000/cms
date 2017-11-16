<?php
/*--------------------------------------------------------------------------
| 路由规则设置
|--------------------------------------------------------------------------
| 框架支持路由访问机制与普通GET方式访问
| 如果使用普通GET方式访问时不需要设置路由规则
| 当然也可以根据业务需要两种方式都使用
|-------------------------------------------------------------------------*/
Route::get('/l/{cate_id}','app\home\controller\Entry@lists');
Route::get('/h/{cate_id}','app\home\controller\Entry@home');
Route::get('/c/{art_id}','app\home\controller\Entry@content');
Route::get('/search','app\home\controller\Entry@search');