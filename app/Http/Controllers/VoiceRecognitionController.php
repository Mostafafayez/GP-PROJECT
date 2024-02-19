<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class VoiceRecognitionController extends Controller
{
    public function recognizeVoice(Request $request)
    {
        $request->validate([
            'audio_file' => 'required|mimes:wav,mp3|max:10240', // Adjust max file size as needed
        ]);
    
        $audioFile = $request->file('audio_file');
    
        $path = $audioFile->storeAs('audio', $audioFile->getClientOriginalName()); // Store uploaded file and get the path
    
        // Call Python script to process audio file
        $process = new Process(['C:\Python311\python.exe', 'F:\model\model.py',  storage_path('app/' . $path)]);
        $process->run();
    
        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }
    
        return response()->json([
            'result' => $process->getOutput(),
        ]);
    }
}
