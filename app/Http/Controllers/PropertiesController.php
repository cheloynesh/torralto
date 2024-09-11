<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Permission;
use App\Propertie;
use App\Status;
use App\PostalCode;
use DB;

class PropertiesController extends Controller
{
    public function index(){
        // $properties = Propertie::get();
        $profile = User::findProfile();
        $perm = Permission::permView($profile,32);
        $perm_btn =Permission::permBtns($profile,32);
        $user = User::user_id();
        $cmbStatus = Status::select('id','name')
        ->where("fk_section","32")
        ->pluck('name','id');
        // dd($perm_btn);
        $agents = User::select('id', DB::raw('CONCAT(name," ",firstname) AS name'))->where("fk_profile","12")->pluck('name','id');
        if($profile != 12)
        {
            $properties = DB::table('Properties')->select('Properties.*','Status.name as statName','Status.id as statId','color')
                ->join('Status','fk_status','=','Status.id')
                ->whereNull('Properties.deleted_at')->get();
        }
        else
        {
            $properties = DB::table('Properties')->select('Properties.*','Status.name as statName','Status.id as statId','color')
                ->join('Status','fk_status','=','Status.id')
                ->where('fk_user',$user)->whereNull('Properties.deleted_at')->get();
        }

        if($perm==0)
        {
            return redirect()->route('home');
        }
        else
        {
            return view('admin.properties.properties', compact('properties','perm_btn','agents','cmbStatus','profile'));
        }
    }

    public function store(Request $request)
    {
        // dd($request->front);
        $profile = User::findProfile();
        $user = User::user_id();

        $properties = new Propertie;
        $properties->name = $request->name;
        $properties->sale_price = $request->sale_price;
        $properties->rent_price = $request->rent_price;
        if($profile != 12)
            $properties->fk_user = $request->fk_user;
        else
            $properties->fk_user = $user;
        $properties->owner = $request->owner;
        $properties->fk_status = $request->fk_status;
        $properties->street = $request->street;
        $properties->e_num = $request->e_num;
        $properties->i_num = $request->i_num;
        $properties->fk_pc = $request->fk_pc;
        $properties->type = $request->type;
        $properties->levels = $request->levels;
        $properties->parking = $request->parking;
        $properties->rooms = $request->rooms;
        $properties->full_rest = $request->full_rest;
        $properties->half_rest = $request->half_rest;
        $properties->antiquity = $request->antiquity;
        $properties->terrain = $request->terrain;
        $properties->construction = $request->construction;
        $properties->front = $request->front;
        $properties->side = $request->side;
        $properties->privates = $request->privates;
        $properties->office = $request->office;
        $properties->level = $request->level;
        $properties->extras = $request->extras;
        $properties->fee = $request->fee;
        $properties->save();

        $perm_btn =Permission::permBtns($profile,32);
        $propertie = $this->ReturnData($profile);

        return response()->json(["status"=>true, "message"=>"Propiedad Creada", "propertie" => $propertie, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $profile = User::findProfile();
        $user = User::user_id();

        $properties = Propertie::where('id',$request->id)->first();
        $properties->name = $request->name;
        $properties->sale_price = $request->sale_price;
        $properties->rent_price = $request->rent_price;
        if($profile != 12)
            $properties->fk_user = $request->fk_user;
        else
            $properties->fk_user = $user;
        $properties->owner = $request->owner;
        $properties->street = $request->street;
        $properties->e_num = $request->e_num;
        $properties->i_num = $request->i_num;
        $properties->fk_pc = $request->fk_pc;
        $properties->type = $request->type;
        $properties->levels = $request->levels;
        $properties->parking = $request->parking;
        $properties->rooms = $request->rooms;
        $properties->full_rest = $request->full_rest;
        $properties->half_rest = $request->half_rest;
        $properties->antiquity = $request->antiquity;
        $properties->terrain = $request->terrain;
        $properties->construction = $request->construction;
        $properties->front = $request->front;
        $properties->side = $request->side;
        $properties->privates = $request->privates;
        $properties->office = $request->office;
        $properties->level = $request->level;
        $properties->extras = $request->extras;
        $properties->fee = $request->fee;
        $properties->save();

        $perm_btn =Permission::permBtns($profile,32);
        $propertie = $this->ReturnData($profile);

        return response()->json(['status'=>true, 'message'=>"Propiedad Actualizada", "propertie" => $propertie, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function GetInfo($id)
    {
        $propertie = DB::table('Properties')->select('*')
            ->join('PostalCode','fk_pc','=','PostalCode.id')
            ->where('Properties.id',$id)->first();

        $ubi = PostalCode::where('pc',$propertie->pc)->orderBy("suburb")->get();
        // dd($profile);
        return response()->json(['status'=>true, "data"=>$propertie, "suburbs"=>$ubi]);
    }

    public function destroy($id)
    {
        $propertie = Propertie::find($id);
        $propertie->delete();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,32);
        $propertie = $this->ReturnData($profile);

        return response()->json(['status'=>true, "message"=>"Propiedad eliminada", "propertie" => $propertie, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function GetinfoStatus($id)
    {
        $propertie = Propertie::where('id',$id)->first();
        // dd($initial->commentary);
        return response()->json(['status'=>true, "data"=>$propertie]);
    }

    public function ReturnData($profile)
    {
        $profile = User::findProfile();
        $user = User::user_id();

        if($profile != 12)
        {
            $properties = DB::table('Properties')->select('Properties.*','Status.name as statName','Status.id as statId','color')
                ->join('Status','fk_status','=','Status.id')
                ->whereNull('Properties.deleted_at')->get();
        }
        else
        {
            $properties = DB::table('Properties')->select('Properties.*','Status.name as statName','Status.id as statId','color')
                ->join('Status','fk_status','=','Status.id')
                ->where('fk_user',$user)->whereNull('Properties.deleted_at')->get();
        }

        return $properties;
    }

    public function updateStatus(Request $request)
    {
        $status = Propertie::where('id',$request->id)->first();
        // dd($status);
        $status->fk_status = $request->status;
        // $status->commentary = $request->commentary;
        $status->save();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,32);
        $propertie = $this->ReturnData($profile);

        return response()->json(['status'=>true, "message"=>"Estatus Actualizado", "propertie" => $propertie, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function GetSuburb($pc)
    {
        $ubi = PostalCode::where('pc',$pc)->orderBy("suburb")->get();
        // dd($ubi);
        return response()->json(['status'=>true, "data"=>$ubi]);
    }

    public function GetUbi($id)
    {
        $ubi = PostalCode::where('id',$id)->first();
        // dd($ubi);
        return response()->json(['status'=>true, "data"=>$ubi]);
    }
}
