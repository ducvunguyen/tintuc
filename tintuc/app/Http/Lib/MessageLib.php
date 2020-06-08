<?php
namespace App\Http\Lib;

class MessageLib {
	function Success($message){
		return [
			'status' => 1,
			'message' => $message
		];
	}

	function Error($message){
		return [
			'status' => 0,
			'message' => $message
		];
	}
}