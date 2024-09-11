<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Permission;
use App\Propertie;
use App\User;
use DB;

class ClientsController extends Controller
{
    public function index(){
        $clients = Client::get();
        $profile = User::findProfile();
        $user = User::user_id();
        $perm = Permission::permView($profile,5);
        $perm_btn =Permission::permBtns($profile,5);
        $properties = DB::table('Properties')->select('Properties.*','Status.name as statName','Status.id as statId','color')
            ->join('Status','fk_status','=','Status.id')
            ->whereNull('Properties.deleted_at')->get();

        if($profile != 12)
            $clients = Client::get();
        else
            $clients = Client::where("fk_user",$user)->get();
        // dd($clients);
        if($perm==0)
        {
            return redirect()->route('home');
        }
        else
        {
            return view('admin.client.clients', compact('clients','perm_btn','properties'));
        }
    }

    public function GetInfo($id)
    {
        $propertie = null;
        $client = Client::where('id',$id)->first();
        if($client->propertie_pref != 0)
            $propertie = Propertie::select('id','name')->where('id',$client->propertie_pref)->first();
        return response()->json(['status'=>true, "data"=>$client, "propertie"=>$propertie]);

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = User::user_id();
        $client = new Client;
        $client->name = $request->name;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->cellphone = $request->cellphone;
        $client->email = $request->email;
        $client->name_contact = $request->name_contact;
        $client->phone_contact = $request->phone_contact;
        $client->status = $request->status;
        $client->fk_user = $user;
        $client->save();
        return response()->json(["status"=>true, "message"=>"Persona Física Creada"]);
    }

    public function update(Request $request)
    {
        // dd($request->id);
        if($request->id == 0)
        {
            $client = new Client;
            $client->name = $request->name;
            $client->firstname = $request->firstname;
            $client->lastname = $request->lastname;
            $client->cellphone = $request->cellphone;
            $client->email = $request->email;
            $client->name_contact = $request->name_contact;
            $client->phone_contact = $request->phone_contact;
            $client->status = $request->status;
            $client->save();
            return response()->json(["status"=>true, "message"=>"Persona Física Creada", "id"=>$client->id]);
        }
        else
        {
            $client = Client::where('id',$request->id)
            ->update(['name'=>$request->name, 'firstname'=>$request->firstname,'lastname'=>$request->lastname,
                'cellphone'=>$request->cellphone,'email'=>$request->email,
                'name_contact'=>$request->name_contact,'phone_contact'=>$request->phone_contact]);
            return response()->json(['status'=>true, 'message'=>"Cliente Actualizado"]);
        }

    }

    public function UpdatePreferences(Request $request)
    {
        $client = Client::where('id',$request->id)
        ->update(['levels'=>$request->levels, 'parking'=>$request->parking,'rooms'=>$request->rooms,
            'full_rest'=>$request->full_rest,'half_rest'=>$request->half_rest,
            'min_price'=>$request->min_price,'max_price'=>$request->max_price,
            'propertie_pref'=>$request->propertie_pref]);
        return response()->json(['status'=>true, 'message'=>"Preferencias Actualizadas"]);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return response()->json(['status'=>true, "message"=>"cliente eliminado"]);

    }
}
