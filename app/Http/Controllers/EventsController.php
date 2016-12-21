<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Event;
use Illuminate\Database\Eloquent\Model;
use View;
use Illuminate\Support\Facades\Input;


class EventsController extends Controller
{

  public function index()
  {
    $events = Event::all()->toArray();
    return ($events);
  }

  public function showCreateEvent()
  {
    return View::make('CreateEvent');
  }

  public function doCreateEvent()
  {
    $event = new Event;
    $event -> Name = Input::get('name');
    $event -> Date = Input::get('date');
    $event -> Creator = Input::get('creator');
    $event -> Ticket_Capacity = Input::get('ticketCapacity');;
    $event -> save();
    return View::make('eventCreated');
  }

}
