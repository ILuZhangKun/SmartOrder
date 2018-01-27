<?php
use Workerman\Worker;
require_once __DIR__ . '/Workerman/Autoloader.php';
$global_uid=0;

//当客户端连上来时分配uid,并保存连接.
function handle_connection($connection)
{
	global $ws_worker,$global_uid;
	//为此连接分配一个uid
	$connection->uid=++$global_uid;
}

//当客户发送消息过来时，转发给所有人
function handle_message($connection,$data)
{
	global $ws_worker;
	foreach ($ws_worker->connections as $conn) {
		$conn->send($data);
	}
}
// 创建一个文本协议的Worker监听8000接口
$ws_worker = new Worker("websocket://0.0.0.0:8000");

//启动4个进程
$ws_worker->count = 4;

//当有客户连接时执行handle_connection方法
$ws_worker->onConnect = "handle_connection";

//当收到客户端发送的数据时，执行handle_message方法
$ws_worker->onMessage = "handle_message";

// 运行
Worker::runAll();