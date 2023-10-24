<?php

namespace App\Mail\Admin\Report;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $report;
    protected $response;
    private $status;

    /**
     * Create a new message instance.
     */
    public function __construct($report, $response, $status)
    {
        $this->report = $report;
        $this->response = $response;
        $this->status = $status;
        $this->response();
    }

    private function response()
    {
        if ($this->status == 0 && empty($this->response["response"])) {
            $this->response["response"] = "Ваша скарга була, розглянута -- green";
        } elseif ($this->status == 1 && empty($this->response["response"])) {
            $this->response["response"] = "Ваша скарга була, розглянута -- red";
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Відповідь на скаргу',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.admin.report.report',
            with: ["report" => $this->report, "response" => $this->response],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
