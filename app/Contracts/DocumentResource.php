<?php
namespace App\Contracts;

trait DocumentResource
{
	public function scopeExist($q, string $key, string $value)
	{
		return $q->where($key, $value);
	}

	public function asJson($responseCode, $data = [])
	{	
		$response['message'] 	= $responseCode;
		$response['data']		= $data;
		return response()->json($response);
	}
}