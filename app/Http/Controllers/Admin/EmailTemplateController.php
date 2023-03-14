<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\GeneralSetting;

class EmailTemplateController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = 'Email Templates';
            $emptyMessage = 'No templates available';
            $email_templates = EmailTemplate::get();
            Log::info(["email_templates" => $email_templates]);
            return view('admin.email_template.index', compact('pageTitle', 'emptyMessage', 'email_templates'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function edit($id)
    {
        try {
            $email_template = EmailTemplate::findOrFail($id);
            $pageTitle = $email_template->name;
            $emptyMessage = 'No shortcode available';
            Log::info(["email_templates" => $email_template]);
            return view('admin.email_template.edit', compact('pageTitle', 'email_template','emptyMessage'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'email_body' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $email_template = EmailTemplate::findOrFail($id);
            $email_template->subj = $request->subject;
            $email_template->email_body = $request->email_body;
            $email_template->email_status = $request->email_status ? 1 : 0;
            $email_template->save();
            DB::commit();
            Log::info(["email_template" => $email_template]);
            $notify[] = ['success', $email_template->name . ' template has been updated.'];
            return back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }


    public function emailSetting()
    {
        try {
            $pageTitle = 'Email Configuration';
            return view('admin.email_template.email_setting', compact('pageTitle'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function emailSettingUpdate(Request $request)
    {
        $request->validate([
            'email_method' => 'required|in:php,smtp,sendgrid,mailjet',
            'host' => 'required_if:email_method,smtp',
            'port' => 'required_if:email_method,smtp',
            'username' => 'required_if:email_method,smtp',
            'password' => 'required_if:email_method,smtp',
            'enc' => 'required_if:email_method,smtp',
            'appkey' => 'required_if:email_method,sendgrid',
            'public_key' => 'required_if:email_method,mailjet',
            'secret_key' => 'required_if:email_method,mailjet',
        ], [
            'host.required_if' => ':attribute is required for SMTP configuration',
            'port.required_if' => ':attribute is required for SMTP configuration',
            'username.required_if' => ':attribute is required for SMTP configuration',
            'password.required_if' => ':attribute is required for SMTP configuration',
            'enc.required_if' => ':attribute is required for SMTP configuration',
            'appkey.required_if' => ':attribute is required for SendGrid configuration',
            'public_key.required_if' => ':attribute is required for Mailjet configuration',
            'secret_key.required_if' => ':attribute is required for Mailjet configuration',
        ]);
        if ($request->email_method == 'php') {
            $data['name'] = 'php';
        } else if ($request->email_method == 'smtp') {
            $request->merge(['name' => 'smtp']);
            $data = $request->only('name', 'host', 'port', 'enc', 'username', 'password', 'driver');
        } else if ($request->email_method == 'sendgrid') {
            $request->merge(['name' => 'sendgrid']);
            $data = $request->only('name', 'appkey');
        } else if ($request->email_method == 'mailjet') {
            $request->merge(['name' => 'mailjet']);
            $data = $request->only('name', 'public_key', 'secret_key');
        }
        try {
            DB::beginTransaction();
            $general = GeneralSetting::first();
            $general->mail_config = $data;
            $general->save();
            DB::commit();
            Log::info(["general" => $general]);
            $notify[] = ['success', 'Email configuration has been updated.'];
            return back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }


    public function emailTemplate()
    {
        try {
            $pageTitle = 'Global Email Template';
            return view('admin.email_template.email_template', compact('pageTitle'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function emailTemplateUpdate(Request $request)
    {
        $request->validate([
            'email_from' => 'required|email',
        ]);
        try {
            DB::beginTransaction();
            $general = GeneralSetting::first();
            $general->email_from = $request->email_from;
            $general->email_template = $request->email_template;
            $general->save();
            DB::commit();
            Log::info(["general" => $general]);
            $notify[] = ['success', 'Global email template has been updated.'];
            return back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function sendTestMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $general = GeneralSetting::first();
        $config = $general->mail_config;
        $receiver_name = explode('@', $request->email)[0];
        $subject = 'Testing ' . strtoupper($config->name) . ' Mail';
        $message = 'This is a test email, please ignore it if you are not meant to get this email.';

        try {
            sendGeneralEmail($request->email, $subject, $message, $receiver_name);
        } catch (\Exception $exp) {
            $notify[] = ['error', 'Invalid credential'];
            return back()->withNotify($notify);
        }

        $notify[] = ['success', 'You should receive a test mail at ' . $request->email . ' shortly.'];
        return back()->withNotify($notify);
    }
}
