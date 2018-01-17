<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Poem extends Mailable
{
    use Queueable, SerializesModels;

    public $poem;
    public $contents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($poem, $contents)
    {
        $this->poem = $poem;
        $this->contents = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.poem')->subject($this->poem->title . '诗歌邮件')->with(['poem' => $this->poem, 'contents' => $this->contents]);
    }
}
