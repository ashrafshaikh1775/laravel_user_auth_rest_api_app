<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'posts' =>Post::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          try{
        $rules = [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'gender'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $post = new Post;
        $post->first_name = $request->firstname;
        $post->last_name = $request->lastname;
        $post->email = $request->email;
        $post->password = $request->password;
        $post->gender = $request->gender;
        $res = $post->save();
        if($res)
        {
            
            $jsonData = response()->json([
                'success' => 'You are rergistered successfully'
            ]);

             return $jsonData ;
        }
        else
        {
            $jsonData = response()->json([
                'fail' => 'Something Wrong' 
            ]);
            return $jsonData;
        }
    }
    catch (\Exception $e) {
        $jsonData = response()->json([
            'fail' => 'This Email is already taken' 
        ]);
        return $jsonData;
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post)
    {
        $rules = [
            'email'=>'required|email',
            'password'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }
        if(count(Post::where('email' ,'=', $request->email)->where('password' ,'=', $request->password)->get()) > 0){
            return response()->json(['success'=>'']);
        }
        return response()->json(['fail'=>'Check Email or Password']);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

    }
}
