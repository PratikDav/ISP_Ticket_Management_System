<?php

namespace App\Http\Controllers;

use App\Models\ResponseMessage;
use App\Models\SupportCategory;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{

/************************
Admin Section Start
 **************************/
    public function ticketHistoryAdmin()
    {
        $data = Ticket::join('support_categories', 'tickets.category_id', '=', 'support_categories.id')
            ->join('users', 'tickets.user_id', '=', 'users.id')
            ->select('support_categories.id as category_id', 'support_categories.category as category', 'tickets.message as ticket_message', 'tickets.status as ticket_status', 'tickets.id as ticket_id', 'tickets.user_id as user_id', 'users.name as user_name', 'users.number as user_number', 'users.address as user_address')
            ->where('tickets.status', '=', '1')
            ->get();
        return view('admin.pages.ticket.ticket_history', compact('data'));
    }
    public function pendingTicketAdmin()
    {
        $data = Ticket::join('support_categories', 'tickets.category_id', '=', 'support_categories.id')
            ->join('users', 'tickets.user_id', '=', 'users.id')
            ->select('support_categories.id as category_id', 'support_categories.category as category', 'tickets.message as ticket_message', 'tickets.status as ticket_status', 'tickets.id as ticket_id', 'tickets.user_id as user_id', 'users.name as user_name', 'users.number as user_number', 'users.address as user_address')
            ->where('tickets.status', '=', '0')
            ->get();
        return view('admin.pages.ticket.pending_ticket', compact('data'));
    }

    public function acceptTicket($id)
    {
        Ticket::where('id', '=', $id)
            ->update(['status' => true]);
        return redirect()->back()->with('success', 'Ticket Accepted Successfully!');

    }

    public function makePendingTicket($id)
    {
        Ticket::where('id', '=', $id)
            ->update(['status' => false]);
        return redirect()->back()->with('success', 'Ticket Went to Pending List');

    }
/************************
Admin Section End
 **************************/

/************************
Client Section Start
 **************************/
    public function showCreateTicketPage()
    {
        $category = SupportCategory::all();
        return view('client.ticket.create_ticket', compact('category'));
    }
    public function showTicketHistoryPage()
    {
        $data = Ticket::join('support_categories', 'tickets.category_id', '=', 'support_categories.id')
            ->select('support_categories.id as category_id', 'support_categories.category as category', 'tickets.message as ticket_message', 'tickets.status as ticket_status', 'tickets.user_id as user_id','tickets.id as ticket_id')
            ->get();
        return view('client.ticket.ticket_history', compact('data'));
    }

    public function createTicket(Request $request)
    {
        $ticket = new Ticket();

        $request->validate([

            'category' => 'required',
            'problem_message' => 'required',

        ]);

        $userId = Session::get('user_id');
        $exists_complaint = Ticket::where('category_id', '=', $request->category)->where('user_id','=', $userId)->first();
        if ($exists_complaint) {
            return redirect()->back()->with('failed', 'Already Sent the Request for this Type! Please, wait for Response');
        } else {
            $ticket->category_id = $request->category;
            $ticket->message = ucwords($request->problem_message);
            $ticket->user_id = $userId;
            if ($ticket->save()) {
                return redirect()->back()->with('success', 'Ticket Submitted Successfully!');
            } else {
                return redirect()->back()->with('failed', 'Something Went Wrong!');

            }

        }

    }
/************************
Client Section Start
 **************************/

}
