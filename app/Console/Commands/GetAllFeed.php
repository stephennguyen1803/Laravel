<?php

namespace App\Console\Commands;

use App\Feeds;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetAllFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getallfeed {--log}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get All Feed Data';

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
     * @return mixed
     */
    public function handle()
    {
        $feeds = Feeds::all();
        $showLog = $this->option('log');
        if (empty($feeds)) {
            if ($showLog == true) {
                Log::channel('feedslog')->info('No feeds');
            }
            $this->info("No feeds");
            return 0;
        } else {
            foreach ($feeds as $feed) {
                $data = [
                    'id' => $feed->id,
                    'title' => $feed->title,
                    'category' => $feed->category,
                ];
                if ($showLog == true) {
                    Log::channel('feedslog')->info(json_encode($data));
                }
                $this->info(json_encode($data));
            }

            return 1;
        }
    }
}
