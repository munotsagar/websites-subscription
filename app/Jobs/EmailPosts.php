<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailPosts;
use Illuminate\Support\Facades\Mail;

class EmailPosts
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->data['subject'] = $this->data['title'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // dd($this->data);
        Mail::to($this->data['email'])->queue(new SendEmailPosts($this->data));
    }
}
