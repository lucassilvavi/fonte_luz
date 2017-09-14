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
use Illuminate\Support\Facades\Input;


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
        $destinationPath = 'fotos/' . $this->usuario->find(auth::user()->id)->id;
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        if ($validator->passes()) {
            $file = Input::file('image');
            $rename = time() . '.' . $request->image->getClientOriginalExtension();
            $file->move($destinationPath, $rename);
            $input = $request->all();
            $endArquivoProg = $this->usuario->find(auth::user()->id)->id . '/' . $rename;

            return $this->fotoService->nova($endArquivoProg,$this->usuario->find(auth::user()->id)->id,$input['title']);

        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

}