<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\package;
use App\Models\PackageCategory;
use App\Models\Product;
use App\Models\WeightPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= DB::table('packages')
        ->join('customers as t1','t1.id','=','packages.sender_ID')         
        ->join('customers as t2','t2.id','=','packages.receiver_ID')  
        ->select('packages.*','t1.name as sender_name','t1.phone as sender_phone','t1.city as sender_city','t2.name as receiver_name','t2.phone as receiver_phone','t2.city as receiver_city')       
        ->get();

        return view('admin.view_all_products',compact('data'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data= DB::table('branches')->get();
        // dd($data);
        $firstBranch = DB::table('branches')->first();
        $receiversBranch = DB::table('branches')->where('id','<>',$firstBranch->id)->get();
        $category = PackageCategory::all();
        return view('admin.create_product',compact('data', 'firstBranch','category','receiversBranch'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // dd($request->to_branch);
            $data= $request->validate([
                'sender_name' => 'required',
                'sender_phone' => 'required|unique:customers,phone|max:9',
                'from_branch' => 'required',
                'sender_city' => 'required',
                'receiver_name' => 'required',
                'receiver_phone' => 'required|unique:customers,phone|max:9',
                'to_branch' => 'required',
                'receiver_city' => 'required',
                'package_type' => 'required',
                'weight' => 'required',
                'status' => 'required',
               
            ]);
            $senderInfo = customer::create([
                'name' => $request->sender_name,
                'phone' => $request->sender_phone,
                'city' => $request->sender_city,
            
            ]);
            $receiverInfo = customer::create([
                'name' => $request->receiver_name,
                'phone' => $request->receiver_phone,
                'city' => $request->receiver_city,
            ]);
       
            $package = package::create([
                'package_tag' => 'package-'. Str::random(5),
                'package_type' => $request->package_type,
                'sender_ID' => $senderInfo->id,
                'receiver_ID' => $receiverInfo->id,
                'status' => $request->status,
                'from_branch_id' => $request->from_branch,
                'to_branch_id' => $request->to_branch,
                'weight' => $request->weight,
            ]);
            

        return redirect(route('products.index'))->with('success', 'Registration successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.show_product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the product based on the provided ID
       
        $package = package::find($id);
        $customer = customer::find($id);
        // dd($package);
    
        if (!$package || !$customer) {
            // Product with the provided ID does not exist; you can handle this case as per your requirements.
            // For example, you can return an error view or redirect back with a message.
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        return view('admin.edit_product', compact('package',('customer')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function fetchWeight(Request $request){
        $data = WeightPrice::select('id','weight')->where('cat_id',$request->id)->take(10)->get();
        return response()->json($data);  
    }
    public function fetchPrice(Request $request){
        $weight_price = WeightPrice::select('price')->where('id',$request->id)->first();
        return response()->json($weight_price);  
    }
}
