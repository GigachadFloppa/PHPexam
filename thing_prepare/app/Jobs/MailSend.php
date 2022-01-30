<?php

namespace App\Jobs;

use App\Mail\OrderShipped;
use App\Models\Thing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $thing;

    public function __construct(Thing $thing)
    {
        $this->thing = $thing;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $testMail = new OrderShipped('На вас назначена новая вещь'.$this->thing->name);
        Mail::send($testMail);
    }
}
