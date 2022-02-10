<?php

namespace App\Http\Controllers;

use App\Models\Product_images;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User_order;

class firstController extends Controller
{
    public function salesReport()
    {
        $sales = DB::select(DB::raw("select sum(product_quantity) as total,product_name as name from user_orders group by product_name "));
        $data = "";
        foreach ($sales as $i) {
            $data .= " ['" . $i->name . "'," . $i->total . "],";
        }
        $details = $data;
        return view('chart', compact('details'));
    }
    public function userReport()
    {
        $users = DB::select(DB::raw("select count(*) as total,role_type as name from users group by role_type "));
        $data = "";
        foreach ($users as $i) {
            $data .= " ['" . $i->name . "'," . $i->total . "],";
        }
        $user_details = $data;
        return view('userChart', compact('user_details'));
    }
    public function couponReport()
    {
        $coupons = DB::select(DB::raw("select count(*) as total,status from coupons  group by status "));
        $data = "";
        foreach ($coupons as $i) {
            $data .= " ['" . $i->status . "'," . $i->total . "],";
        }
        $coupons_details = $data;
        return view('couponChart', compact('coupons_details'));
    }
    public function getTrack($id)
    {
        $data = User_order::where('orderId', $id)->get();
        return response()->json(["track" => $data]);
    }
    public function deleteImages($id)
    {
        $images = Product_images::find($id);
        unlink("uploads/$images->image_path");
        $images->delete();
        return back()->with("msg", "deleted successfully");
    }
}
