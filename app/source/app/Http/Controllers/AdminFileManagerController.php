<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class AdminFileManagerController extends Controller
{

    public function upload(Request $request)
    {



        $file = $request->file('file');
        $name = $request->input('name');

        $date = Carbon::now()->format('Y') . '/' . Carbon::now()->format('m');

        $path = Storage::disk('public')->put($date, $file);



        $message = 'successfully'; //translate message

        return Response::Json(
            [
                'path' => "/storage/$path",
                'created' => true,
                'message'    => $message,
            ],
            200
        );
    }
    public function uploadValidation(Request $request, $format)
    {

        if ($format) {
            $this->validetor($request, $format);
        }

        $file = $request->file('file');
        $name = $request->input('name');

        $date = Carbon::now()->format('Y') . '/' . Carbon::now()->format('m');

        $path = Storage::disk('public')->put($date, $file);



        $message = 'successfully'; //translate message

        return Response::Json(
            [
                'path' => "/storage/$path",
                'created' => true,
                'message'    => $message,
            ],
            200
        );
    }

    private function validetor(Request $request, $format)
    {

        if ($format === 'mpeg') {
            $format = 'mimes:mp4';
        } else if ($format === 'webm') {
            $format = 'mimes:webm';
        } else if ($format === 'image') {
            $format = 'mimes:png,jpg,webp,svg';
        } else {
            abort(
                response()->json([
                    'message'     => ['error' => ['error format']],
                ], 422)
            );
        }

        $request->validate([
            'file' => $format,
        ]);
    }
}
