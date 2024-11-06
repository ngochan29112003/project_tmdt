<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationCode; // Chứa mã xác nhận

    /**
     * Tạo một thể hiện mới của lớp mail.
     *
     * @param int $verificationCode
     * @return void
     */
    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    /**
     * Xây dựng thông điệp email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mã xác nhận để thay đổi mật khẩu') // Tiêu đề email
        ->view('emails.verification_code') // View của email
        ->with(['verificationCode' => $this->verificationCode]); // Truyền mã vào view
    }
}
