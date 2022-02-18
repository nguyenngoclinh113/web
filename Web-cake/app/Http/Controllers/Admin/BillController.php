<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\BillDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Excel;
use PDF;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.bill');
    }

    public function detailsOrder($id)
    {
        //$bill = Bill::withTrashed()->find($id);
        $billDetails = BillDetail::where('bill_id', $id)->get();
        return view('admin.page.billdetail', compact('billDetails'));
    }

    public function dateOrder(Request $request)
    {
        $fromDate = $request->fromdate;
        $toDate = $request->todate;
        if($fromDate != "" && $toDate != "") {
            $bills = Bill::whereBetween('date_order',[$fromDate, $toDate]);
        }
        elseif ($fromDate != "" && $toDate == "") {
            $bills = Bill::where('date_order', $fromDate);
        }
        else {
            $bills = Bill::where('date_order', $toDate);
        }
        $bills = $bills->paginate(10);
        return view('admin.page.bill_date', compact('bills','fromDate','toDate'));
    }

    public function excelOrder(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        if($fromDate != "" && $toDate != "") {
            $bills = Bill::whereBetween('date_order', [$fromDate, $toDate]);
        }
        elseif ($fromDate != "" && $toDate == "") {
            $bills = Bill::where('date_order', $fromDate);
        }
        else {
            $bills = Bill::where('date_order', $toDate);
        }
        $bills = $bills->get()->toArray();
        return Excel::create('data', function($excel) use ($bills) {
            $excel->sheet('sheet', function($sheet) use ($bills) {
                $sheet->fromArray($bills);
            });
        })->export('xls');
    }

    public function reportOrder()
    {
        $bills = Bill::withTrashed()->where('date_order', date('Y-m-d'))->paginate(10);
        $billsDelivered = Bill::where('date_order', date('Y-m-d'))->where('status',1)->count();
        $billsUndelivered = Bill::where('date_order', date('Y-m-d'))->where('status',0)->count();
        $billsCancelled = Bill::onlyTrashed()->where('date_order', date('Y-m-d'))->count();
        return view('admin.page.bill_report', compact('bills','billsDelivered','billsUndelivered','billsCancelled'));
    }

    public function processOrder($id)
    {
        $bill = Bill::find($id);
        $bill->status = 1;
        $bill->save();
        return Redirect()->back();
    }

    public function pdfOrder($id)
    {
        $bill = Bill::withTrashed()->find($id);
        $pdf = PDF::loadView('admin.page.bill_pdf', ['bill' => $bill]);
        return $pdf->download('bill.pdf');
    }

    public function searchBillReport(Request $request)
    {
        $date = $request->date;
        $status = $request->status;
        if($date == "")
        {
            if($status == "") {
                return redirect('admin/bill/report');
            }
            else {
                if($status == "delete") {
                    $bills = Bill::onlyTrashed()->paginate(10);
                }
                else {
                    $bills = Bill::where('status', $status)->paginate(10);   
                }
            }
        }
        else {
            if($status == "") {
                $bills = Bill::withTrashed()->where('date_order', $date)->paginate(10);     
            }
            else {
                if($status == "delete") {
                    $bills = Bill::onlyTrashed()->where('date_order', $date)->paginate(10);
                    
                }
                else {
                    $bills = Bill::where('date_order',$date)->where('status', $status)->paginate(10);    
                }
            }

        } 
        return view('admin.page.bill_report',compact('bills','date'));       
    }
   
   public function searchBillReportByName(Request $request)
   {
    $name = $request->name;
    $date = $request->date;
    $bills = Bill::withTrashed()->where('name','like','%'.$name.'%');
    if($date != "") {
        $bills = $bills->where('date_order',$date);
    }
    else {
        $bills = $bills->where('date_order',date('Y-m-d'));
    }
    $bills = $bills->paginate(10);
    return view('admin.page.table_bill_report',compact('bills'));
   }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        return $bill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $bill = Bill::findOrFail($id);
        $bill->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Bill Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         Bill::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Bill Deleted'
        ]);
    }

    public function apiBill() {
        $bill = Bill::all();
        return DataTables::of($bill)
            ->addColumn('action', function($bill){
                return '<a onclick="editForm('. $bill->id .')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>'.
                    '<a onclick="deleteData('. $bill->id .')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>'.
                    '<a href="bill/details/'.$bill->id.'" class="btn btn-danger btn-xs">Details</a>';
            })->make(true);
    }
}
