<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\User;
use App\Models\Order;
use App\Models\Destination;
use App\Models\MeetingPoint;
use App\Models\TourSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $userId = Auth::id();

        $tours = Tour::whereHas('order', function($query) use ($userId) {
            $query->where('user_id', $userId); // Cari pemesanan dengan ID pengguna yang sama
        })->with('order')->get();
        // dd($tours);
        return view("admin.order.index", compact("tours"));
    }

    public function setujui(User $user,Tour $tour){
        try {
            DB::table('orders')->where("user_id",$user->id)->where("tour_id",$tour->tour_id)->update([
                "status" => "disetujui"
            ]);
            return redirect()->back()->with('success',"Berhasil Update Status");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',"Gagal Update Status");

        }
    }
    public function tolak(User $user,Tour $tour){
        try {
            DB::table('orders')->where("user_id",$user->id)->where("tour_id",$tour->tour_id)->update([
                "status" => "ditolak"
            ]);
            return redirect()->back()->with('success',"Berhasil Update Status");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',"Gagal Update Status");

        }
    }
    public function showOrder(Tour $plan){
        // dd($plan);
        $plan->load("tour_guide");
        $meetingPoint = MeetingPoint::where("tour_id",$plan->tour_id)->get();
        $destination = Destination::where("tour_id",$plan->tour_id)->get();
        $schedule = TourSchedule::where("tour_id",$plan->tour_id)->orderBy("schedule_time",'asc')->get();

        // dd($groupedOrders);
        return view('admin.order.show', compact('plan','meetingPoint','destination','schedule'));
    }
}
