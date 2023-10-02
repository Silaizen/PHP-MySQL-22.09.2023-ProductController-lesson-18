<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function index(): View {
        $title = 'Main Page';
        $categories = Category::all();
        //$subtitle = '<em>Welcome</em>!';
        //$users = ['Tom', 'Bob'];
 
        //dd($categories);

        return view('home', compact('title', 'categories'));
    }

    function contacts(): View
    {
        return view('contacts');
    }

    function sendMail(Request $request)
    {
       $request->validate([
        'name' => 'required|min:2|max:32',
        'email' => 'required|email',
        'message' => 'required'
       ]);

       $name = $request->name;
       $email = $request->email;
       $message = $request->message;

       //dump($request->all());

       //send mail
       return redirect('/contacts')->with('success', 'Thank!');
    }

}
