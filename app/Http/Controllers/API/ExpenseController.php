<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use App\User;
use Auth;
use Illuminate\Support\Str;

class ExpenseController extends Controller
{
    //
public function createExpense(Request $request){
   
  
            $expense = Expense::create([
                    'name'=> $request->name,
                    'uique_code'=> Str::random(10),
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'amount' => $request->amount,
                    'user_id' => Auth::user()->id
            ]);

            return response()->json($expense);

}
    
    

    public function inviteUserToExpense(Request $request)
    {           
               
                $user = Expense::find($id);
                $user = $request->user()->id;
                $user -> expense_id = $request->expense_id; 
                $user = $request->input('total_amount');
                $user = $request->input('amount1');
                $user = $request->input('amount2');
                $user = $request->input('amount3');
                $user->save();
                return response()->json(['status'=>'true', 'message'=>"user expense saved suuccessfully", 'data'=>$user]);


              //  1. request = added users id
              //  2. if user not esent invitee email = An array of emails.
              //  3. amount left o be shared on the expense table
    }


    public function addUser()
    { 
        $user = $request->input('email');
        if(User::where('email', $user)->doesntExist())
{
        //send email
        $auth = auth()->user();
        Mail::send('Email.userInvite', ['user' => $auth], function ($message) use ($email) {
            $message->to($user);
            $message->subject('AzatMe: Send expense invite');
        }); 

        return response()->json(['success' => true, 'message' => 'User with'.$user.'is not found,']);

        return response()->json(['message'=>  'is not currently on the system an invite has been sent']);
}
            

    }

}