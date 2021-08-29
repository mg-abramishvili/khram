<?php

namespace App\Mail;

use App\Models\Review;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReview extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->view('email.review')
            ->subject('Новый отзыв из киоска')
            ->with([
                'review' => $this->review->review,
            ]);
    }
}
