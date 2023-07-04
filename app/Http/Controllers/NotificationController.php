<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\AppConst;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->all();
        if (!isset($param['name'])) {
            $keyword = '';
        } else {
            $keyword = $param['name'];
        }
        
        $notifications = Notification::filter($param)->paginate(AppConst::PER_PAGE);
        return view('notification.list',compact('notifications','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notification.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationRequest $request)
    {   
        $notification = new Notification;
        $notification->fill($request->all())->save();
        return back()->with('success',  trans('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        return view('notification.edit',compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(NotificationRequest $request, Notification $notification)
    {
        $notification->fill($request->all())->save();
        return redirect()->route('notification.index')->with('success',  trans('message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notification.index')->with('success',  config('flashMessage.success.delete'));
    }
}
