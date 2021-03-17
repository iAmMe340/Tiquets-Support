<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Ticket;

class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $totalTickets = Ticket::whereHas('category', function($query){
                        $query->where('category_id', '=' , auth()->user()->category_id);
        })->count();
        $openTickets = Ticket::whereHas('status', function($query) {
            $query->whereName('Abierto')
                   ->where('category_id', '=' , auth()->user()->category_id);
        })->count();
        $closedTickets = Ticket::whereHas('status', function($query) {
            $query->whereName('Cerrado')
                    ->where('category_id', '=' , auth()->user()->category_id);
        })->count();

        return view('home', compact('totalTickets', 'openTickets', 'closedTickets'));
    }
}
