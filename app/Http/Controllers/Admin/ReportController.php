<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailLog;
use App\Models\Transaction;
use App\Models\UserLogin;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction()
    {
        try{
            $pageTitle = 'Transaction Logs';
            $transactions = Transaction::with('user')->orderBy('id','desc')->paginate(getPaginate());
            $emptyMessage = 'No transactions.';
            return view('admin.reports.transactions', compact('pageTitle', 'transactions', 'emptyMessage'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
      
    }

    public function transactionSearch(Request $request)
    {
        try{
            $request->validate(['search' => 'required']);
            $search = $request->search;
            $pageTitle = 'Transactions Search - ' . $search;
            $emptyMessage = 'No transactions.';
            $transactions = Transaction::with('user')->whereHas('user', function ($user) use ($search) {
                $user->where('username', 'like',"%$search%");
            })->orWhere('trx', $search)->orderBy('id','desc')->paginate(getPaginate());
    
            return view('admin.reports.transactions', compact('pageTitle', 'transactions', 'emptyMessage','search'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }

    public function loginHistory(Request $request)
    {
        try{
            if ($request->search) {
                $search = $request->search;
                $pageTitle = 'User Login History Search - ' . $search;
                $emptyMessage = 'No search result found.';
                $login_logs = UserLogin::whereHas('user', function ($query) use ($search) {
                    $query->where('username', $search);
                })->orderBy('id','desc')->with('user')->paginate(getPaginate());
                return view('admin.reports.logins', compact('pageTitle', 'emptyMessage', 'search', 'login_logs'));
            }
            $pageTitle = 'User Login History';
            $emptyMessage = 'No users login found.';
            $login_logs = UserLogin::orderBy('id','desc')->with('user')->paginate(getPaginate());
            return view('admin.reports.logins', compact('pageTitle', 'emptyMessage', 'login_logs'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }

    public function loginIpHistory($ip)
    {
        try{
            $pageTitle = 'Login By - ' . $ip;
        $login_logs = UserLogin::where('user_ip',$ip)->orderBy('id','desc')->with('user')->paginate(getPaginate());
        $emptyMessage = 'No users login found.';
        return view('admin.reports.logins', compact('pageTitle', 'emptyMessage', 'login_logs','ip'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        

    }

    public function emailHistory(){
        try{
            $pageTitle = 'Email history';
            $logs = EmailLog::with('user')->orderBy('id','desc')->paginate(getPaginate());
            $emptyMessage = 'No data found';
            return view('admin.reports.email_history', compact('pageTitle', 'emptyMessage','logs'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }
}
