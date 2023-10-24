<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Report\MailRequest;
use App\Mail\Admin\Report\ReportMail;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;

class DestroyController extends Controller
{

    public function __invoke(MailRequest $request, Report $report)
    {
        $data = $request->validated();
        if (!isset($report->email) && !isset($report->user->email)) {
            return redirect()->back()->with(
                "admin-alert",
                "Сталася помилка, можливо даного користувача не існує"
            );
        }
        Mail::to($report->email ?? $report->user->email)->send(new ReportMail($report, $data, 1));
        $report->update(["response" => $data["response"], "is_read" => true]);
        $report->delete();
        return redirect()->route("admin.report.index");
    }
}
