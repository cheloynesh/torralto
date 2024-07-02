<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use App\Permission;
use App\Initial;
use App\Currency;
use App\Insurance;
use App\Paymentform;
use App\Charge;
use App\Branch;
use App\Application;
use App\Client;
use App\Branch_assign;
use App\Status_History;
use DB;
use Carbon\Carbon;
use App\Policy;
use App\Exports\ExportInitial;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class InitialController extends Controller
{
    public function index()
    {
        // $initials = Initial::get();

        // dd($initials);

        $clients = Client::get();
        $agents = User::select('id', DB::raw('CONCAT(name," ",firstname) AS name'))->orderBy('name')->whereIn("fk_profile",[12,2])->pluck('name','id');
        $currencies = Currency::pluck('name','id');
        $insurances = Insurance::orderBy('name')->pluck('name','id');
        $paymentForms = Paymentform::pluck('name','id');
        $charges = Charge::pluck('name','id');
        $branches = Branch::pluck('name','id');
        $applications = Application::pluck('name','id');
        $estatusExc = Status::select('id', 'name')->where("fk_section","14")->pluck('name','id');
        $branchesExc = Branch::select('id', 'name')->pluck('name','id');
        $cmbStatus = Status::select('id','name')
        ->where("fk_section","14")
        ->pluck('name','id');
        // $status = DB::table("Status")
        //     ->select('Status.id as id','Status.name as name')
        //     ->join('Initials','Initials.fk_status','=','Status.id')
        //     ->get();
        // dd($status);
        $profile = User::findProfile();
        $perm = Permission::permView($profile,14);
        $perm_btn =Permission::permBtns($profile,14);
        $user = User::user_id();
        if($profile != 12)
        {
            $initials = DB::table("Status")
                ->select('Status.id as statId','Status.name as name','Initials.id as id', 'rfc', 'Initials.name as client',
                'Initials.firstname','Initials.lastname','color','Insurance.name as insurance','Branch.name as branch',
                DB::raw('CONCAT(users.name," ",users.firstname) AS agent'),'Initials.created_at as date','folio')
                ->join('Initials','Initials.fk_status','=','Status.id')
                ->join('Insurance','Insurance.id','=','Initials.fk_insurance')
                ->join('Branch','Branch.id','=','Initials.fk_branch')
                ->join('users','users.id','=','Initials.fk_agent')
                ->where('Status.id','<>','4')
                ->where('Status.id','!=','20')
                ->where('Status.id','!=','23')
                ->whereNull('Initials.deleted_at')
                ->get();
        }
        else
        {
            $initials = DB::table("Status")
                ->select('Status.id as statId','Status.name as name','Initials.id as id', 'rfc', 'Initials.name as client',
                'Initials.firstname','Initials.lastname','color','Insurance.name as insurance','Branch.name as branch',
                DB::raw('CONCAT(users.name," ",users.firstname) AS agent'),'Initials.created_at as date','folio')
                ->join('Initials','Initials.fk_status','=','Status.id')
                ->join('Insurance','Insurance.id','=','Initials.fk_insurance')
                ->join('Branch','Branch.id','=','Initials.fk_branch')
                ->join('users','users.id','=','Initials.fk_agent')
                ->where('Status.id','<>','4')
                ->where('Status.id','!=','20')
                ->where('Status.id','!=','23')
                ->where('fk_agent',$user)
                ->whereNull('Initials.deleted_at')
                ->get();
        }
        if($perm==0)
        {
            return redirect()->route('home');
        }
        else
        {
            return view('processes.OT.Initials.initial',
            compact('initials','agents','clients','currencies','insurances','paymentForms','charges','branches','applications','perm_btn','cmbStatus','estatusExc','branchesExc'));
        }
    }

    public function ReturnData($profile)
    {
        $user = User::user_id();
        if($profile != 12)
        {
            $initials = DB::table("Status")
                ->select('Status.id as statId','Status.name as name','Initials.id as id', 'rfc',
                DB::raw('CONCAT(IFNULL(Initials.name, "")," ",IFNULL(Initials.firstname, "")," ",IFNULL(Initials.lastname, "")) AS cname'),'color','Insurance.name as insurance',
                'Branch.name as branch', DB::raw('CONCAT(users.name," ",users.firstname) AS agent'),'Initials.created_at as date','folio')
                ->join('Initials','Initials.fk_status','=','Status.id')
                ->join('Insurance','Insurance.id','=','Initials.fk_insurance')
                ->join('Branch','Branch.id','=','Initials.fk_branch')
                ->join('users','users.id','=','Initials.fk_agent')
                ->where('Status.id','<>','4')
                ->where('Status.id','!=','20')
                ->where('Status.id','!=','23')
                ->whereNull('Initials.deleted_at')
                ->get();
        }
        else
        {
            $initials = DB::table("Status")
                ->select('Status.id as statId','Status.name as name','Initials.id as id', 'rfc',
                DB::raw('CONCAT(IFNULL(Initials.name, "")," ",IFNULL(Initials.firstname, "")," ",IFNULL(Initials.lastname, "")) AS cname'),'color','Insurance.name as insurance',
                'Branch.name as branch', DB::raw('CONCAT(users.name," ",users.firstname) AS agent'),'Initials.created_at as date','folio')
                ->join('Initials','Initials.fk_status','=','Status.id')
                ->join('Insurance','Insurance.id','=','Initials.fk_insurance')
                ->join('Branch','Branch.id','=','Initials.fk_branch')
                ->join('users','users.id','=','Initials.fk_agent')
                ->where('Status.id','<>','4')
                ->where('Status.id','!=','20')
                ->where('Status.id','!=','23')
                ->where('fk_agent',$user)
                ->whereNull('Initials.deleted_at')
                ->get();
        }
        return $initials;
    }

    public function GetInfo($id)
    {
        $initial = Initial::where('id',$id)->first();

        $brnchAss = Branch_assign::select('id')->where('fk_insurance',$initial->fk_insurance)->where('fk_branch',$initial->fk_branch)->first();

        $assignedBranches = DB::table('Branch_assign')->select('fk_branch AS id','name')
            ->join('Branch','fk_branch','=','Branch.id')
            ->orderBy('name')
            ->where('fk_insurance',$initial->fk_insurance)
            ->whereNull('Branch_assign.deleted_at')->get();

        $assignedPlans = DB::table('Plans_assign')->select('fk_plans AS id','name')
            ->join('Plans','fk_plans','=','Plans.id')
            ->orderBy('name')
            ->where('fk_brnchass',$brnchAss->id)
            ->whereNull('Plans_assign.deleted_at')->get();

        // dd($assignedBranches, $assignedPlans);
        return response()->json(['status'=>true, "data"=>$initial, "branches" => $assignedBranches, "plans" => $assignedPlans]);
    }

    public function store(Request $request)
    {
        $initial = new Initial;
        $initial->fk_agent = $request->agent;
        $initial->name = $request->name;
        $initial->firstname = $request->firstname;
        $initial->lastname = $request->lastname;
        $initial->rfc = $request->rfc;
        $initial->insured = $request->insured;
        $initial->type = $request->type;
        $initial->promoter_date = $request->promoter;
        $initial->system_date = $request->system;
        $initial->folio = $request->folio;
        $initial->fk_insurance = $request->insurance;
        $initial->fk_branch = $request->branch;
        $initial->fk_plan = $request->plan;
        $initial->fk_application = $request->application;
        $initial->pna = $request->pna;
        $initial->fk_payment_form = $request->paymentForm;
        $initial->fk_currency = $request->currency;
        $initial->fk_charge = $request->charge;
        $initial->guide = $request->guide;
        $initial->save();

        $today = new DateTime();
        $user = User::user_id();
        $history = new Status_History;
        $history->fk_status = 1;
        $history->fk_user = $user;
        $history->id_origin = $initial->id;
        $history->change_date = $today->format('Y-m-d');
        $history->save();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,14);
        $initials = $this->ReturnData($profile);

        return response()->json(["status"=>true, "message"=>"Inicial creada", "initials" => $initials, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $initial = Initial::where('id',$request->id)->
        update(['fk_agent'=>$request->agent,
        'name'=>$request->name,
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'rfc' => $request->rfc,
        'promoter_date' => $request->promoter,
        'system_date' => $request->system,
        'folio' => $request->folio,
        'fk_insurance' => $request->insurance,
        'fk_branch' => $request->branch,
        'fk_plan' => $request->plan,
        'fk_application' => $request->application,
        'pna' => $request->pna,
        'fk_payment_form' => $request->paymentForm,
        'fk_currency' => $request->currency,
        'guide' => $request->guide,
        'initial_comm' => $request->initial_comm,
        'fk_charge' => $request->charge]);

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,14);
        $initials = $this->ReturnData($profile);

        return response()->json(['status'=>true, 'message'=>"Inicial actualizada", "initials" => $initials, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function destroy($id)
    {
        $initial = Initial::find($id);
        $initial->delete();

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,14);
        $initials = $this->ReturnData($profile);

        return response()->json(['status'=>true, "message"=>"Inicial eliminada", "initials" => $initials, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function updateStatus(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        // dd($request->all());
        $status = Initial::where('id',$request->id)->first();
        // dd($status);
        $status->fk_status = $request->status;
        $status->commentary=$request->commentary;
        if($request->sub_status == null) $request->sub_status = 0;
        $status->sub_stat=$request->sub_status;
        $status->save();

        // dd($today);
        $user = User::user_id();
        $history = Status_History::where('id_origin',$request->id)->where('fk_status',$request->status)->first();
        // dd($history);
        if($history == null)
        {
            $today = new DateTime();
            $history = new Status_History;
            $history->fk_status = $request->status;
            $history->fk_user = $user;
            $history->id_origin = $request->id;
            $history->change_date = $today->format('Y-m-d');
            $history->save();
        }
        // dd($history->change_date);

        $profile = User::findProfile();
        $perm_btn =Permission::permBtns($profile,14);
        $initials = $this->ReturnData($profile);

        return response()->json(['status'=>true, "message"=>"Estatus Actualizado", "initials" => $initials, "profile" => $profile, "permission" => $perm_btn]);
    }

    public function GetinfoStatus($id)
    {
        $initial = Initial::where('id',$id)->first();
        // dd($initial->commentary);
        return response()->json(['status'=>true, "data"=>$initial]);
    }

    public function getBranches($id)
    {
        $assignedBranches = DB::table('Branch_assign')->select('fk_branch AS id','name')
            ->join('Branch','fk_branch','=','Branch.id')
            ->where('fk_insurance',$id)
            ->orderBy('name')
            ->whereNull('Branch_assign.deleted_at')->get();
        // dd($id);

        return response()->json(['status'=>true, "branches" => $assignedBranches]);
    }

    public function getPlans($insurance, $branch)
    {
        if($branch != 0)
        {
            $brnchAss = Branch_assign::select('id')->where('fk_insurance',$insurance)->where('fk_branch',$branch)->first();

            $assignedPlans = DB::table('Plans_assign')->select('fk_plans AS id','name')
                ->join('Plans','fk_plans','=','Plans.id')
                ->where('fk_brnchass',$brnchAss->id)
                ->orderBy('name')
                ->whereNull('Plans_assign.deleted_at')->get();
        }
        else
        {
            $assignedPlans = [];
        }

        return response()->json(['status'=>true, "branches" => $assignedPlans]);
    }

    public function ExportInitials($status,$branch)
    {
        // dd("entre");
        $nombre = "Iniciales.xlsx";
        $sheet = new ExportInitial($status, $branch);
        // dd($sheet);
        return Excel::download($sheet,$nombre);
    }
    public function GetPolicyInfo($id)
    {
        $initial = Initial::where('id',$id)->first();
        $brnchAss = Branch_assign::select('id')->where('fk_insurance',$initial->fk_insurance)->where('fk_branch',$initial->fk_branch)->first();
        $assignedBranches = DB::table('Branch_assign')->select('fk_branch AS id','name')
            ->join('Branch','fk_branch','=','Branch.id')
            ->where('fk_insurance',$initial->fk_insurance)
            ->orderBy('name')
            ->whereNull('Branch_assign.deleted_at')->get();
        $assignedPlans = DB::table('Plans_assign')->select('fk_plans AS id','name')
            ->join('Plans','fk_plans','=','Plans.id')
            ->where('fk_brnchass',$brnchAss->id)
            ->orderBy('name')
            ->whereNull('Plans_assign.deleted_at')->get();
        $client = null;
        $policy = null;
        // dd($policy);
        return response()->json(['status'=>true, "data"=>$policy, "branches" => $assignedBranches, "plans" => $assignedPlans, "initial" => $initial, "client" => $client]);
    }
}
