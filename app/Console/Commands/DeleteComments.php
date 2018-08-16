<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Comment;

class DeleteComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:deleteAll {feedback : The ID of feedback}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will delete all the comment from a feedback';

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
        $comments = Comment::where('feedback_id', '=', $this->argument('feedback'))->get();

        $bar = $this->output->createProgressBar(count($comments));

        foreach ($comments as $comment) {
            $comment->delete();
            $bar->advance();
        }

        $bar->finish();
    }
}
