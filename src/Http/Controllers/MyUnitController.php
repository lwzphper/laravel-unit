<?php
/**
 * Created by PhpStorm.
 * User: lwz
 * Date: 2019/7/28
 * Time: 23:29
 */

namespace Lwz\LaraverUnitTest\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MyUnitController extends Controller{
    public function index()
    {
        return view('myunit::wap/index');
    }
    public function store(Request $request)
    {
        $namespace  = $request->input('namespace');
        $className  = $request->input('className');
        $action     = $request->input('action');
        $param      = $request->input('param');
        $class = ($className == "") ? $namespace : $namespace.'\\'.$className;
        // 要提换的值  需要的结果
        $class = str_replace("/", "\\", $class);
        $object = new $class();
        $param = ($param == "") ? [] : explode('|', $param) ;
        $data = call_user_func_array([$object, $action], $param);
        return (is_array($data)) ? json_encode($data) : dd($data);
    }
}