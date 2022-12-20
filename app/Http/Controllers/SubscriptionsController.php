<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SubscriptionsController extends Controller
{
    public function create_subscription(Request $request){
        $validator=Validator::make($request->post(),[
            'email'=>'required|email',
            'website_id'=>'required|exists:websites,id',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'You have some validation errors',
                'errors'=>$validator->errors()->all()
            ]);
        }

        $user=User::firstOrCreate([
            'email'=>$request->post('email')
        ]);
        if($user->websites()->where('website_id', $request->post('website_id') )->exists()){
            return response()->json([
                'status'=>'The subcription already exists']);
        }
        $user->websites()->attach($request->post('website_id'));
        
        return response()->json([
            'status'=>'The subscription has been added successfully'
        ]);

    
    }
}
