<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostsController extends Controller
{
    public function create_post(Request $request){
        $validator=Validator::make($request->post(),[
            'website_id'=>'required|exists:websites,id',
            'title'=>'required|string',
            'body'=>'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'You have some validation errors',
                'errors'=>$validator->errors()->all()
            ]);
        }
        Post::create($request->post());
        return response()->json([
            'status'=>'The post has been created successfully'
        ]);

    
    }

}
