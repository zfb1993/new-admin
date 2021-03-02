<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class CreateGoodsList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'goodsList:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化抢购队列信息';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $goods_number = 100;
        //将100件商品存入到Redis链表中
        for($i=0;$i<$goods_number;$i++){
            //lpush从链表的头部添加元素
            Redis::lpush('goods_store',1);
        }
        //设置过期时间
        Redis::throttle('goods_store',60);
        //llen返回列表key的长度
        echo Redis::llen('goods_store');
    }
}
