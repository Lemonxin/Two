<?php

namespace App\Http\Middleware;

use Closure;
// 引入auth
use Auth;
// 引入role
use App\Admin\Role;
// 引入Route
use Route;

class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 先排除超级用户
        $role_id = Auth::guard('admin') -> user() -> role_id;
        if($role_id > '1'){
            // 需要进行权限验证，获取当前用户对应角色的权限
            $ac = Role::where('id','=',$role_id) -> value('auth_ac');
            // 拼接上固定路由
            $ac .= "IndexController@index,IndexController@welcome";
            // 获取当前用户访问的操作方法
            $current = Route::currentRouteAction();
            // App\Http\Controllers\Admin\IndexController@index
            // 将路由转化成数组格式
            $curr = explode('\\',$current);
            // 将2个字符串进行比较（保证大小写）
            if(stripos($ac,end($curr)) === false){
                die('你没有权限');
            }
        }
        // 继续后续的请求
        return $next($request);
    }
}
