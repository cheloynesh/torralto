<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Permission;
use App\Client;
use App\Status;
use App\Agenda;
use App\Propertie;
use DB;

class AgendaController extends Controller
{
    public function index(){
        $profiles = Profile::get();
        $profile = User::findProfile();
        $user = User::user_id();
        $perm = Permission::permView($profile,34);
        $perm_btn = Permission::permBtns($profile,34);
        $clients = DB::table('Client')->select(DB::raw('CONCAT(IFNULL(Client.name, "")," ",IFNULL(Client.firstname, "")," ",IFNULL(Client.lastname, "")) AS cname'),'id')
            ->whereNull('Client.deleted_at')->get();
        $properties = DB::table('Properties')->select('Properties.*','Status.name as statName','Status.id as statId','color')
            ->join('Status','fk_status','=','Status.id')
            ->whereNull('Properties.deleted_at')->get();
        $agents = User::select('id', DB::raw('CONCAT(IFNULL(name, "")," ",IFNULL(firstname, "")," ",IFNULL(lastname, "")) AS name'))->where("fk_profile","12")->pluck('name','id');
        $cmbStatus = Status::select('id','name')
        ->where("fk_section","34")
        ->pluck('name','id');

        if($profile != 12)
            $dates = DB::select('call GetAgenda(?)',['%']);
        else
            $dates = DB::select('call GetAgenda(?)',[$user]);
        // dd($agents);
        if($perm==0)
        {
            return redirect()->route('home');
        }
        else
        {
            return view('process.agenda.agenda', compact('profiles','perm_btn','clients','properties','agents','dates','cmbStatus'));
        }
    }

    public function returnData($profile)
    {
        $user = User::user_id();
        if($profile != 12)
            $dates = DB::select('call GetAgenda(?)',['%']);
        else
            $dates = DB::select('call GetAgenda(?)',[$user]);
        return $dates;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $agenda = new Agenda;
        $agenda->fk_client = $request->fk_client;
        $agenda->fk_user = $request->fk_user;
        $agenda->fk_propertie = $request->fk_propertie;
        $agenda->appointment_date = $request->appointment_date;
        $agenda->save();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,32);
        $dates = $this->ReturnData($profile);

        return response()->json(["status"=>true, "message"=>"Cita agendada", "dates" => $dates, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function updateStatus(Request $request)
    {
        $status = Agenda::where('id',$request->id)->first();
        // dd($status);
        $status->fk_status = $request->status;
        $status->commentary = $request->commentary;
        $status->save();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,32);
        $dates = $this->ReturnData($profile);

        return response()->json(['status'=>true, "message"=>"Estatus Actualizado", "dates" => $dates, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function GetinfoStatus($id)
    {
        $date = Agenda::where('id',$id)->first();
        // dd($initial->commentary);
        return response()->json(['status'=>true, "data"=>$date]);
    }

    public function GetInfo($id)
    {
        $dates = DB::table('Agenda')->select('*')
            ->join('Properties','fk_propertie','=','Properties.id')
            ->where('Agenda.id',$id)->first();

        // dd($profile);
        return response()->json(['status'=>true, "data"=>$dates]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $agenda = Agenda::where('id',$request->id)->first();
        $agenda->fk_client = $request->fk_client;
        $agenda->fk_user = $request->fk_user;
        $agenda->fk_propertie = $request->fk_propertie;
        $agenda->appointment_date = $request->appointment_date;
        $agenda->save();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,32);
        $dates = $this->ReturnData($profile);

        return response()->json(['status'=>true, 'message'=>"Propiedad Actualizada", "dates" => $dates, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,32);
        $dates = $this->ReturnData($profile);

        return response()->json(['status'=>true, "message"=>"Propiedad eliminada", "dates" => $dates, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function GetInfoClient($id)
    {
        $propertie = null;
        $client = Client::where('id',$id)->first();
        if($client->propertie_pref != 0)
            $propertie = Propertie::select('id','name')->where('id',$client->propertie_pref)->first();
        return response()->json(['status'=>true, "data"=>$client, "propertie"=>$propertie]);

    }
}
