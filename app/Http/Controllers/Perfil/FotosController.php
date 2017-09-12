<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 10/09/2017
 * Time: 14:38
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Services\FotoService;


class FotosController extends Controller
{
    private $usuario;
    private $auth;
    private $fotoService;


    public function __construct(Usuario $usuario,
                                Auth $auth,
                                FotoService $fotoService)
    {
        $this->usuario = $usuario;
        $this->auth = $auth;
        $this->fotoService = $fotoService;
    }

    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function savePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->passes()) {
            $input = $request->all();
            $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads', $input['image']);
            $oi=$this->fotoService->nova( $input['image'],$this->usuario->find(auth::user()->id));
            dd($oi);
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

}