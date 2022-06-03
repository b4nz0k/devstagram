<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request) {
        $imagen = $request->file('file');
        // $input = $request->all();

        $nombreImagen = Str::uuid(). "." . $imagen->extension();

        $imagenServidor = Image::make($imagen);

        $imagenServidor->fit(1000,1000);

        $imagenPath = public_path('uploads'. '/' . $nombreImagen);

        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
        // return response()->json($input);
    }
}
