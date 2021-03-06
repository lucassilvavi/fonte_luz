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
        $this->middleware('auth');
    }

    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function savePhoto(Request $request)
    {
        $valida = $this->valida($request);
        if ($valida != 'certo') {
            return $valida;
        } else {
            $destinationPath = 'fotos/' . $request->get('usuario');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file = Input::file('image');
            $rename = time() . '.' . $request->image->getClientOriginalExtension();
            $file->move($destinationPath, $rename);
            $input = $request->all();
            $endArquivoProg = $request->get('usuario') . '/' . $rename;
            return $this->fotoService->nova($endArquivoProg, $request->get('usuario'), $input['title']);
        }

    }

    public function valida($request)
    {
        if (!isset($request->image) && $request->title == null) {
            return 'image and title';
        } elseif (!isset($request->image)) {
            return 'image';
        } elseif ($request->title == null) {
            return 'title';
        }
        return 'certo';


    }

    public function changePhoto($co_seq_foto, $usuario)
    {
        $desativada = $this->fotoService->desativar($usuario);
        if ($desativada == 'true') {
            return $this->fotoService->ativar($co_seq_foto);
        }
        return 'erro';

    }

    public function deletePhoto($co_seq_foto)
    {
        return $this->fotoService->delete($co_seq_foto);
    }

}