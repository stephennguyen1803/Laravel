<?php

namespace App\Console\Commands;

use App\Feeds;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetFeedFromUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getfeed {url}  {--log}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get data feed for list url';

    /**
     * GetFeedFromUrl constructor.
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
        $url = $this->argument('url');
        $showLog = $this->option('log');
        try {
            $feedData = $this->getFeedDataFromUrl($url);
            foreach ($feedData as $feed) {
                Feeds::create($feed);
            }
        } catch (\Exception $exception) {
            throwException($exception);
            if ($showLog == true) {
                Log::channel('feedslog')->error($exception->getMessage());
            }
        }
    }

    private function getFeedDataFromUrl($urlString){
        $listUrl = explode(',',$urlString);
        $lenList = count($listUrl);
        $data = [];
        for ($i =0 ; $i < $lenList; $i++) {
            if ($this->checkUrl($listUrl[$i])) {
                $content = simplexml_load_file($listUrl[$i]);
                foreach($content->channel->item as $entry) {
                    $data[] = [
                        'title' => (string)$entry->title[0],
                        'category' => (string)$entry->category[0],
                    ];
                }
            }
        }
        return $data;
    }

    private function checkUrl($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }
        return true;
    }
}
