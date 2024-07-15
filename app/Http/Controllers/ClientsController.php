<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Permission;
use App\User;

class ClientsController extends Controller
{
    public function index(){
        $clients = Client::get();
        $profile = User::findProfile();
        $perm = Permission::permView($profile,5);
        $perm_btn =Permission::permBtns($profile,5);
        // dd($clients);
        if($perm==0)
        {
            return redirect()->route('home');
        }
        else
        {
            return view('admin.client.clients', compact('clients','perm_btn'));
        }
    }

    public function GetInfo($id)
    {
        $client = Client::where('id',$id)->first();
        // dd($client);
        return response()->json(['status'=>true, "data"=>$client]);

    }

    public function store(Request $request)
    {
        // dd($request->all());
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

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return response()->json(['status'=>true, "message"=>"cliente eliminado"]);

    }
}
