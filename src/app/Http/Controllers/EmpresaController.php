<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    function index(Request $request){
        if($request->isJson()){
            $empresas = Empresa::all();
            return response()->json($empresas, status:200) ;

        }else{
            return response()->json(['error' => 'Unauthorized'], status:401) ;
        }
    }

    function createEmpresa (Request $request){
        if($request->isJson()){
            $data = $this->validate($request,[
                'nombre' => 'required|max:40',
                'email_contacto' => 'required|max:100',
            ]);
            $empresa = Empresa::create([
                'nombre' => $data['nombre'],
                'email_contacto' => $data['email_contacto']
            ]);
            return response()->json($empresa, status:201) ;
        }else{
            return response()->json(['error' => 'Unauthorized'], status:401) ;
        }
    }

    public function updateEmpresa(Request $request, $id){
        if($request->isJson()){
            try{
                $data = $this->validate($request,[
                    'nombre' => 'required|max:40',
                    'email_contacto' => 'required|max:100',
                ]);

                $empresa = Empresa::findOrFail($id);
                $empresa->nombre = $data['nombre'];
                $empresa->email_contacto = $data['email_contacto'];
                $empresa->save();

                return response()->json($empresa, 200);

            }catch(ModelNotFoundException $e){
                return response()->json(['Error'=>'No Content'],406,[]);
            }
        }else{
            return response()->json(['Error'=>'Unauthorized'],401,[]);
        }
    }

    public function deleteEmpresa(Request $request, $id){
        if(empty($id)){
            return- response()->json(['Error'=>'No content'],406);
        }
        if($request->isJson()){
            try{
                $empresa = Empresa::findOrFail($id);
                $empresa->delete();
                return response()->json($empresa, 200);

            }catch(ModelNotFoundException $e){
                return response()->json(['Error'=>'No Content'],406,[]);
            }
        }else{
            return response()->json(['Error'=>'Unauthorized'],401,[]);
        }
    }

    public function getEmpresa(Request $request, $id){
        if($request->isJson()){
            try{
                $empresa = Empresa::findOrFail($id);
                return response()->json($empresa,200);
            }catch(ModelNotFoundException $e){
                return response()->json(['Error'=>'No content'],406);
            }
        }else{
            return response()->json(['Error'=>'Unauthorized'],401,[]);
        }
    }



}
