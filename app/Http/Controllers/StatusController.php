<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
 public function show(Status $status) {
        return    view('tasks.status-tasks' , ['status' => $status]);
 }

}
