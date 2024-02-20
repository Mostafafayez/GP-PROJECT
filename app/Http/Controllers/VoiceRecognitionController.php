<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class VoiceRecognitionController extends Controller
{
    public function recognize(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'audio_file' => 'required|file|mimetypes:audio/wav,audio/x-wav',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Save the uploaded audio file
        $audioFile = $request->file('audio_file');
        $audioFilePath = $audioFile->storeAs('audio', 'external_audio.wav');

        // Run Python script to perform voice recognition
        $process = new Process(['python', 'path/to/your/python/script.py', storage_path('app/' . $audioFilePath)]);
        $process->run();

        // Check if the process was successful
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Get the output of the Python script
        $result = $process->getOutput();

        // Return the result
        return response()->json(['result' => $result], Response::HTTP_OK);
    }
}
