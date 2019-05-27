<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\DownloadResource;
use App\Resource;

class ResourceDownload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:file {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some description';

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
        $url = $this->argument('url');
        $resource = Resource::create(['url'=>$url]);
        DownloadResource::dispatch($resource);
    }
}
