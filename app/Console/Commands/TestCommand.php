<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail as FacadesMail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'simple test of commands';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Mail::to('dwm23-zaitoune@ifiag.com')->send(new TestMail());
        FacadesMail::send('Mail.Test',  function ($message) {
            $message->to("dwm23-zaitoune@ifiag.com");
            $message->subject('Reset Password');
        });

        $this->info('Email sent successfully!');
    }
}
