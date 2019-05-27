<?php

namespace App\Console\Commands;

use App\Resource;
use Illuminate\Console\Command;

class ResourcesList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resources:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $headers = ['Resource','Status'];
        $resources = Resource::orderByDesc('created_at')->get();
        $resources_array = [];
        foreach ($resources as $resource){
            switch ($resource->status_id) {
                case 1:
                    $fg = "yellow";
                    break;
                case 2:
                    $fg = "blue";
                    break;
                case 3:
                    $fg = "green";
                    break;
                case 4:
                    $fg = "red";
                    break;
                default:
                    $fg = "white";
            }

            $resources_array[] = [$resource->url, '<fg='.$fg.'>'.$resource->status->name.'</>'];
        }
        $this->table($headers, $resources_array);
    }
}
