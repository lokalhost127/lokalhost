<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, Location $location)
    {
        $this->validate($request, [
            'body' => 'required|min:3'
        ]);

        Comment::create([
            'body' => $request->body,
            'location_id' => $location->id,
            'user_id' => Auth::id()

        ]);
        return back();
    }

    public function destroy(Request $request,Location $location, Comment $comment)
    {
        $comment->delete();
        $request->session()->flash('message', 'Successfully deleted the comment!');
        return back();
    }

}
