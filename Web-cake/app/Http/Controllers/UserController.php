<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Http\Requests\CreateUserSignUpRequest;
use App\Http\Requests\CreateSignInRequest;
use App\Http\Requests\CreateUserUpdateRequest;
use App\Http\Requests\CreateChangePasswordRequest;
use App\Bill;
use App\BillDetail;
use App\Product;
use App\Comment;

class UserController extends Controller
{
    
     function __construct()
    {
        if(Auth::check()){
                view()->share('nguoidung',Auth::user());
        }
    }

    public function userProfile()
   
    {
        if(Auth::user()) {
           return view('page.users.user'); 
        }
        else {
            return redirect('index');
        }
        
    }

    public function changePasswordShow()
    {
        return view('page.users.password');
    }

    public function previewCart()
    {
        if (Auth::user()) {
            $id = Auth::user()->id;
            $bills = Bill::withTrashed()->where('user_id',$id)->paginate(10);
            $billdetails = BillDetail::all();
            return view('page.users.previewcart',compact('bills','billdetails'));
        }
        return redirect('index');
    }

    public function login(CreateSignInRequest $request)
    {
        $Email = $request->Email;
        $Password = ($request->Password);
        if(Auth::attempt(['email' => $Email, 'password' => $Password])) {
            return redirect()->back()->with('flash_message','Đăng nhập thành công');
        }
        return redirect()->back()->with('flash_message','Tài khoản đăng nhập của bạn không đúng');
    }

    public function logout()
    {
    	Auth::logout();
  		return redirect('index');
    }

    public function userUpdate(CreateUserUpdateRequest $request,$id)
    {
    	
        $user = User::find($id);  
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->save();
        return redirect('user/'.$id)->with('flash_message','Sửa thông tin thành công');
    }

    public function changePassword(CreateChangePasswordRequest $request,$id)
    {
        $user=User::find($id);
        $user->password = Hash::make($request->password); 
        $user->save();
        return redirect('user/changePassword/'.$id)->with('flash_message','Đổi mật khẩu thành công');
    }

    public function signup(CreateUserSignUpRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return redirect('index')->with('flash_message','Đã đăng ký thành công, xin mời đăng nhập !');
    }
    
    public function forgetPassword()
    {
        if(!Auth::user()) {
           return view('auth.passwords.email'); 
        }
        return redirect('index');
        
    }

    public function comment(Request $request,$id)
    {
        $product = Product::find($id);
        $comment = new Comment;
        $comment->product_id = $id;
        $comment->user_id = Auth::id();
        $comment->content = $request->comment;
        $comment->save();
        $comment->name = Auth::user()->name;
        $comment->is_admin = Auth::user()->is_admin;
        return $comment;
    }

    public function deleteComment(Request $request,$id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $proId = $request->proId;
        $comment = Comment::where('product_id',$proId)->get();
        return $comment;
    }

    public function exportBill($id)
    {
        $bill = Bill::withTrashed()->findOrFail($id);
        $billDetails = $bill->bill_details;
        $billData  = "";
        $billData .= '<p>Mã bill:'.$bill->id.'| Ngày đặt: '.$bill->created_at.'
                     | Tổng tiền: '.$bill->total.' | Payment: '.$bill->payment.' </p>';
        $billData .= '<p>Ghi chú:'.$bill->note.'</p>';             
        $billData .= '<p>Tên người đặt:'.$bill->name.'</p>';
        $billData .= '<p> Địa chỉ nhận hàng: '.$bill->address.'</p>';
        $billData .= '<p> Phone: '.$bill->phone.'</p>';
        $billData .= '<table style="border: 1px solid black; font-family: "Times New Roman", Times, serif;" > 
                        <tr>
                        <th style="border: 1px solid black; "> Bánh </th>
                        <th style="border: 1px solid black; "> Số lượng </th>
                        <th style="border: 1px solid black; "> Đơn giá </th>
                        <th style="border: 1px solid black; "> Thành tiền </th>
                        </tr>';
        foreach($billDetails as $billDetail){
            $billData .= '<tr>
                        <td style="border: 1px solid black">'.$billDetail->product->name.'</td>
                        <td style="border: 1px solid black">'.$billDetail->quantity.'</td>
                        <td style="border: 1px solid black">'.$billDetail->unit_price.'</td>
                        <td style="border: 1px solid black">'.$billDetail->quantity*$billDetail->unit_price.'</td>
                        </tr>';
        }
        $billData .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=bill.xls');
        echo $billData;
    }
}
