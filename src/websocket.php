<?php

$server = new swoole_websocket_server("0.0.0.0", 9501);
$websocket=array();
$server->on('open', function (swoole_websocket_server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
	$data = json_decode($frame->data,true);
	$websocket[$data['userId']] = $frame->fd;
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n"."websocket:".json_encode($websocket);
    $server->push($frame->fd, $frame->data);
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();