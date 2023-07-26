<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $recipient = 'dwm23-zaitoune@ifiag.com';
        $subject = 'Demo Email';
        $content = 'Hello there! This is a demo email sent from Laravel.';

        Mail::raw($content, function ($message) use ($recipient, $subject) {
            $message->to($recipient);
            $message->subject($subject);
        });

        $this->info('Email sent successfully!');
    }
}
