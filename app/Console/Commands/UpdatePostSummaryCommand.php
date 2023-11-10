<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdatePostSummaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-post-summary';

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
     * @return int
     */
    public function handle()
    {
        $posts = \App\Models\Post::selectRaw('id, substr(content, 1, 255) as sub_content')->get();
        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            foreach ($posts as $post) {
                \App\Models\Post::where('id', $post->id)->update(['summary'=> $post->sub_content]);
            }
            \Illuminate\Support\Facades\DB::commit();
            return true;
        }catch (\Exception $exception) {
            \Illuminate\Support\Facades\DB::rollBack();
            throw $exception;
        }

    }
}
