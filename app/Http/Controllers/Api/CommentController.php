<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator= Validator::make($data,[
            'name' => 'nullable|sting|max:50',
            'content' => 'string|required',
            'post_id' => 'exist:post,id',
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()

            ], 400);
        }
        $newComment = new Comment();
        if(!empty($data["name"]) ){
            $newComment->name = $data["name"];
        }
        $newComment->content = $data["content"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();

        return response()->json([
            "success" =>true,
        ]);

    }
}
