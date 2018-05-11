<?php

use App\Events\OrderStatusUpdate;
use Illuminate\Queue\Console\RetryCommand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class Order
{
    public $id;
    public function __construct($id) {
        $this->id=$id;
    }
}

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', function ()
{
    return \App\Task::latest()->pluck('body');
});
Route::post('/tasks', function ()
{
    Task::forceCreate(request(['body']));
});
