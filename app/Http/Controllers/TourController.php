<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tour;
use App\Models\Order;
use App\Models\TourGuide;
use App\Models\Destination;
use Illuminate\Support\Str;
use App\Models\MeetingPoint;
use App\Models\TourSchedule;
use Illuminate\Http\Request;
use App\DataTables\TourDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function index(TourDataTable $dataTable)
    {
        return $dataTable->render('admin.tour.rencanaTour');
    }
    public function create(){
        $tourGuide = TourGuide::all();
        return view('admin.tour.create',compact('tourGuide'));
    }
    public function store(Request $request){
        // dd($request->meeting_point_name);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'max_participant' => 'required',
            'tour_guide_id' => 'required',
            'location' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'image' => 'required|image|file|max:3072'
        ]);

        try {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $uuid = Str::uuid()->toString();
            DB::table('tours')->insert([
                'tour_id'=> $uuid,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'max_participant' => $validated['max_participant'],
                'price' => $validated['price'],
                'tour_guide_id' => $validated['tour_guide_id'],
                'banner_path' => $request->file('image')->store('bannerImg'),
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'duration' => $start_date->diffInDays($end_date),
                'location' => $validated['location'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($request->meeting_point_name) {
                foreach ($request->meeting_point_name as $mpn) {
                    DB::table('meeting_points')->insert([
                        'meeting_point_id'=> Str::uuid()->toString(),
                        'meeting_point_name'=> $mpn,
                        'tour_id'=> $uuid,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            if ($request->destination_name) {
                foreach ($request->destination_name as $dn) {
                    DB::table('destinations')->insert([
                        'destination_id'=> Str::uuid()->toString(),
                        'destination_name'=> $dn,
                        'tour_id'=> $uuid,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            if ($request->activity) {
                foreach ($request->activity as $key => $act) {
                    DB::table('tour_schedules')->insert([
                        'tour_schedule_id'=> Str::uuid()->toString(),
                        'activity'=> $act,
                        'tour_id'=> $uuid,
                        'schedule_time'=> $request->schedule_time[$key],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return redirect()->route('tourPlan')->with('success','Rencana '.ucwords($request->title).' berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('tourPlan')->with('error','Rencana '.ucwords($request->title).' gagal ditambahkan');

        }
    }

    public function show(Tour $plan){
        // dd($plan);
        $plan->load("tour_guide");
        $meetingPoint = MeetingPoint::where("tour_id",$plan->tour_id)->get();
        $destination = Destination::where("tour_id",$plan->tour_id)->get();
        $schedule = TourSchedule::where("tour_id",$plan->tour_id)->orderBy("schedule_time",'asc')->get();
        $orders = Order::where("tour_id",$plan->tour_id)->with("user")->get();
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->user->name;
        });
        $totalOrder = $orders->where("status","disetujui")->count();
        // dd($groupedOrders);
        return view('admin.tour.show', compact('plan','meetingPoint','destination','schedule','orders',"groupedOrders","totalOrder"));
    }

    public function rencanaTourList(){
        $listTours = Tour::all();
        return view('admin.tour.daftarRencanaTour', compact('listTours'));
    }

    public function edit(Tour $plan){
        $plan->load(['tour_guide','meeting_point','tour_schedule','destination']);
        $tourGuide = TourGuide::all();
        return view("admin.tour.edit",compact('plan','tourGuide'));
    }

    public function update(Request $request,Tour $plan){
        // Ambil data Plan yang mau di update
        $plan->load(['tour_guide','meeting_point','tour_schedule','destination']);

        // dd($request);

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'max_participant' => 'required',
            'tour_guide_id' => 'required',
            'location' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:3072'
        ]);

        try {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);

            $plan->title = $validated['title'];
            $plan->description = $validated['description'];
            $plan->max_participant = $validated['max_participant'];
            $plan->price = $validated['price'];
            $plan->tour_guide_id = $validated['tour_guide_id'];
            $plan->start_date = $validated['start_date'];
            $plan->end_date = $validated['end_date'];
            $plan->end_date = $validated['end_date'];
            $plan->duration = $start_date->diffInDays($end_date);
            $plan->location = $validated['location'];
            $plan->updated_at = now();

            if ($request->file("image")) {
                Storage::delete($plan->banner_path);
                $plan->banner_path = $request->file("image")->store("bannerIMG","public");
            }

            $plan->save();

            $updatedMP[] = $request->meeting_point_name_update;
            foreach ($plan->meeting_point as $key => $mp) {
                $mp->meeting_point_name = $updatedMP[0][$key];
                $mp->save();
            }
            $updatedDestination[] = $request->destination_name_update;
            foreach ($plan->destination as $key => $des) {
                $des->destination_name = $updatedDestination[0][$key];
                $des->save();
            }
            $updatedActivity[] = $request->activity_update;
            $updatedSchedule[] = $request->schedule_time_update;
            foreach ($plan->tour_schedule as $key => $jadwal) {
                $jadwal->activity = $updatedActivity[0][$key];
                $jadwal->schedule_time = $updatedSchedule[0][$key];
                $jadwal->save();
            }

            if ($request->meeting_point_name) {
                foreach ($request->meeting_point_name as $mpn) {
                    DB::table('meeting_points')->insert([
                        'meeting_point_id'=> Str::uuid()->toString(),
                        'meeting_point_name'=> $mpn,
                        'tour_id'=> $plan->tour_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            if ($request->destination_name) {
                foreach ($request->destination_name as $dn) {
                    DB::table('destinations')->insert([
                        'destination_id'=> Str::uuid()->toString(),
                        'destination_name'=> $dn,
                        'tour_id'=> $plan->tour_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            if ($request->activity) {
                foreach ($request->activity as $key => $act) {
                    DB::table('tour_schedules')->insert([
                        'tour_schedule_id'=> Str::uuid()->toString(),
                        'activity'=> $act,
                        'tour_id'=> $plan->tour_id,
                        'schedule_time'=> $request->schedule_time[$key],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            return redirect()->route('showPlan',$plan->tour_id)->with('success','Rencana '.ucwords($request->title).' berhasil diUpdate');

        } catch (\Throwable $th) {
            return redirect()->route('showPlan',$plan->tour_id)->with('error','Rencana '.ucwords($request->title).' gagal diUpdate');

        }
    }

    public function destroy(Tour $plan){
        try {
            $plan->delete();
            return redirect()->route("tourPlan")->with('success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()->route("tourPlan")->with('error', 'Data gagal dihapus!');
        }
    }

    // ====================================================================================================================================
    // DAFTAR TOUR
    public function daftar(Tour $plan){
        return view("admin.daftarTour.daftarTourUser",compact("plan"));
    }
    public function daftarPost(Request $request){
        // dd(auth()->user()->id);
        $request->validate([
            "nama_peserta.*" => "required|string|max:255",
            "telepon_peserta.*" => "required|numeric|digits_between:10,15",
            "bukti_bayar" => "required|image|file|max:3072",
        ],[
            'nama_peserta.*.required' => 'Nama peserta harus diisi.',
            'nama_peserta.*.string' => 'Nama peserta harus berupa teks.',
            'nama_peserta.*.max' => 'Nama peserta tidak boleh lebih dari 255 karakter.',
            'telepon_peserta.*.required' => 'Nomor telepon peserta harus diisi.',
            'telepon_peserta.*.numeric' => 'Nomor telepon peserta harus berupa angka.',
            'telepon_peserta.*.digits_between' => 'Nomor telepon peserta harus antara 10 hingga 15 digit.',
            'bukti_bayar.required' => 'Bukti pembayaran harus diunggah.',
            'bukti_bayar.image' => 'Bukti pembayaran harus berupa gambar.',
            'bukti_bayar.file' => 'Bukti pembayaran harus berupa file.',
            'bukti_bayar.max' => 'Ukuran bukti pembayaran tidak boleh lebih dari 3 MB.',
        ]);

        try {
            $buktiBayar = $request->file('bukti_bayar')->store('buktiBayar');

            foreach ($request->nama_peserta as $key => $nama) {
                DB::table("orders")->insert([
                    "order_id" => Str::uuid(),
                    "user_id" => auth()->user()->id,
                    "tour_id" => $request->tour_id,
                    "nama_peserta" => $nama,
                    "nomor_telepon" => $request->telepon_peserta[$key],
                    "bukti_bayar" => $buktiBayar,
                    "booking_date" => now(),
                    "status" => "Menunggu konfirmasi",
                    "created_at" => now(),
                    "updated_at" => now(),

                ]);
            }
            return redirect()->route("rencanaTourList")->with('success',"Berhasil Pesan");
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route("rencanaTourList")->with('error',"Gagal Pesan");
        }

    }



    // ====================================================================================================================================
    // Hapus Meet Point
    public function hapusMeetPoint(MeetingPoint $meetPoint){
        try {
            $planId = $meetPoint->tour_id;
            $MPName = $meetPoint->meeting_point_name;
            $meetPoint->delete();
            return redirect()->route('showPlan',$planId)->with('success','Meeting Point '.ucwords($MPName).' berhasil diHapus');

        } catch (\Throwable $th) {
            return redirect()->route('showPlan',$planId)->with('error','Meeting Point '.ucwords($MPName).' gagal diHapus');


        }
    }
    // Hapus Destinasi
    public function hapusDestination(Destination $destination){
        try {
            $planId = $destination->tour_id;
            $destinationName = $destination->destination_name;
            $destination->delete();
            return redirect()->route('showPlan',$planId)->with('success','Destinasi '.ucwords($destinationName).' berhasil diHapus');

        } catch (\Throwable $th) {
            return redirect()->route('showPlan',$planId)->with('error','Destinasi '.ucwords($destinationName).' gagal diHapus');


        }
    }
    // Hapus Jadwal
    public function hapusSchedule(TourSchedule $schedule){
        try {
            $planId = $schedule->tour_id;
            $activityName = $schedule->activity;
            $schedule->delete();
            return redirect()->route('showPlan',$planId)->with('success','Jadwal '.ucwords($activityName).' berhasil diHapus');

        } catch (\Throwable $th) {
            return redirect()->route('showPlan',$planId)->with('error','Jadwal '.ucwords($activityName).' gagal diHapus');


        }
    }
}
