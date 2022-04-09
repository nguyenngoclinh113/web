<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Bill;

class AjaxController extends Controller
{
    public function getBillRecord($status){
        $bills = new Bill();
        ($status == "true") ? $bills = $bills->where('status', 1)->paginate(10)
                            : $bills = $bills->paginate(10);
        return $bills;
    }
}