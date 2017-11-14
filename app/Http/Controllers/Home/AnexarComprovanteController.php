<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 20:18
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;


class AnexarComprovanteController extends Controller
{

    function adicionarComprovante(Request $request)
    {
        $photos = [];
        $photo = $request->image;

//        $filename = $photo->store('comprovantes');
        $photo_object = new \stdClass();
        $photo_object->name = str_replace('photos/', '', $photo->getClientOriginalName());
        //aqui vamos vincular a foto anexada ao usuario
//        $product_photo = ProductPhoto::create([
//            'filename' => $photo_object->name
//        ]);
//        $photo_object->size = round(Storage::size($filename) / 1024, 2);
//        $photo_object->fileID = $product_photo->id;
        $destinationPath = 'comprovantes';

        $rename = rename($photo_object->name,"wdew.png");


        $photo->move($destinationPath, $photo_object->name);
        $photos[] = $photo_object;

        return $photos;
    }

}