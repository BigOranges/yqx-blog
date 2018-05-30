<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\Api\VerificationCodeRequest;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;

        // 生成4位随机数，左侧补0
        $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
        $code=1111;    
        // try {
        //     $result = $easySms->send($phone, [
        //         'template' => 'SMS_136165668',
        //         'data' => [
        //             'code' => $code
        //         ],
        //     ]);
        // } catch (\GuzzleHttp\Exception\ClientException $exception) {
        //     $response = $exception->getResponse();
        //     $result = json_decode($response->getBody()->getContents(), true);
        //     return $this->response->errorInternal($result['msg'] ?? '短信发送异常');
        // }

        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return response([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}