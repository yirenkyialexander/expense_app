<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use Auth;

class BankController extends Controller
{
    //

    public function addBank(Request $request){
    $bank = new Bank();
    $bank->name=$request->input('name');
    $bank->user_id = $request->user()->id;
    $bank ->account_number=$request->input('account_number');
    $bank -> save();
    return response()->json(['success' => true, $bank]);
    }

    public function getBankPerUser()
    {
    $user = Auth::user();
    $getBankPerUser = Bank::where('user_id', $user->id)->get();
        return response()->json($getBankPerUser);
    }


    public function getAllBanks()
    {
        $getAllBanks = Bank::all();
        return response()->json($getAllBanks);
    }


    public function delete($id) 
    {
    $deleteBank = Bank::findOrFail($id);
    if($deleteBank)
       $deleteBank->delete(); 
    else
    return response()->json(null); 
}


}
