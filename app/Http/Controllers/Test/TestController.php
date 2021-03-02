<?php
namespace App\Http\Controllers\Test;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class TestController{
    /**
     * 秒杀队列测试
     */
    public function miaoSha()
    {
        return;
        $count = Redis::lpop('goods_store');
        if(!$count){
            Log::info('抢购失败');
            return;
        }
        Log::info('抢购成功');
        /* 将抢到的用户id统一放到缓存中。
         * 之后使用定时任务进行扣除库存。
         * 生成订单。
         */
    }
}
