<?php

namespace App\Http\Controllers\Backend;

use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    //
    public function __invoke()
    {
        return view('backend.inbox');
    }

    public function allInbox()
    {
        return response()->json([
            'inboxes'=>Inbox::all()
        ]);
    }
}
