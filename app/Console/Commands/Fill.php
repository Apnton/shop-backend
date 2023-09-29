<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product\Color;
use Illuminate\Support\Facades\Cache;
use App\Jobs\SendMessage;


class Fill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $text = 'sdsdsdsd';

//        file_get_contents('https://api.telegram.org/bot6643886948:AAH98UYsvNjiGt91GVHdIqCrD34WmBBqU-A/sendMessage?chat_id=770779861&text='. urlencode($text));

//        Cache::put('example', 'some_string');
//        dd(Cache::get('example'));


        dispatch(new SendMessage('Some message'));

    }


}
