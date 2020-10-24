<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
class ReportsController extends Controller
{
    //
    public function index()
    {
        $reports=Report::orderBy('created_at','desc')->paginate(5);
        return view('admin.reports.reports',compact('reports'));
    }
    public function show($id)
    {
        $report=Report::find($id);
        return view('admin.reports.show',compact('report'));
    }
    public function resolve($id)
    {
        $report=Report::find($id);
        $report->status=1;
        $report->save();
        return redirect('/admin/reports');
    }
    public function remove($id)
    {
        $report=Report::where('report_id',$id)->delete();
        return redirect('/admin/reports');
    }
}
