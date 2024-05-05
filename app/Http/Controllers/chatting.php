<?php

namespace App\Http\Controllers;
use App\Models\messages;
use Illuminate\Http\Request;
 use Pusher\Pusher;
 use GuzzleHttp\Client;
 use Symfony\Component\Process\Process;
 use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Events\MessageSent;
    class chatting extends Controller
    {

        // public function sendaiMessage(Request $request)
        // {
        //     try {
        //         // Validate input
        //         $request->validate([
        //             'message' => 'required|string|max:255',
        //         ]);

        //         // Send request to OpenAI API
        //         $client = new Client();
        //         $response = $client->post('https://api.openai.com/v1/chat/completions', [
        //             'headers' => [
        //                 'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'), // Access API key from environment variable
        //                 'Content-Type' => 'application/json',
        //             ],
        //             'json' => [
        //                 'model' => 'gpt-3.5-turbo-0125', // Change the model as needed
        //                 'messages' => [
        //                     [
        //                         'role' => 'user',
        //                         'content' => $request->input('message'),
        //                     ]
        //                 ],
        //             ],
        //         ]);

        //         // Process response
        //         $data = json_decode($response->getBody()->getContents(), true);

        //         // Log the response for debugging
        //         \Log::info('OpenAI API Response:', $data);

        //         // Check if $data is an array and if the expected keys exist
        //         if (is_array($data) && isset($data['choices'][0]['message']['content'])) {
        //             // Extract response from OpenAI
        //             $output = '';
        //             // Ensure $data['choices'][0]['message']['content'] is an array before using foreach loop
        //             if (is_array($data['choices'][0]['message']['content'])) {
        //                 foreach ($data['choices'][0]['message']['content'] as $item) {
        //                     if (is_array($item) && isset($item['role']) && $item['role'] == 'assistant') {
        //                         $output .= $item['content'];
        //                     }
        //                 }
        //             } else {
        //                 // Handle the case where $data['choices'][0]['message']['content'] is not an array
        //                 // For now, let's assign an error message to $output
        //                 $output = 'Unexpected data format received from OpenAI API';
        //             }
        //         } else {
        //             // Handle the case where $data is not in the expected format
        //             // For now, let's assign an error message to $output
        //             $output = 'Unexpected response format received from OpenAI API';
        //         }

        //         // Return the output
        //         return response()->json(['output' => $output]);
        //     } catch (\Exception $e) {
        //         // Handle any exceptions that occur during the process
        //         return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        //     }
        // }


        public function sendaiMessage(Request $request)
        {
            try {
                // Validate input
                $request->validate([
                    'message' => 'required|string|max:255',
                ]);

                // Send request to OpenAI API
                $client = new Client();
                $response = $client->post('https://api.openai.com/v1/chat/completions', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'), // Access API key from environment variable
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'model' => 'gpt-3.5-turbo-0125', // Change the model as needed
                        'messages' => [
                            [
                                'role' => 'user',
                                'content' => $request->input('message'),
                            ]
                        ],
                    ],
                ]);

                // Process response
                $data = json_decode($response->getBody()->getContents(), true);

                // Check if $data is an array and if the expected keys exist
                if (is_array($data) && isset($data['choices'][0]['message']['content'])) {
                    // Extract response from OpenAI
                    $output = $data['choices'][0]['message']['content'];
                } else {
                    // Handle the case where $data is not in the expected format
                    // For now, let's assign an error message to $output
                    $output = 'Unexpected response format received from OpenAI API';
                }

                // Return the output
                return response()->json(['output' => $output]);
            } catch (\Exception $e) {
                // Handle any exceptions that occur during the process
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }



        public function trainModelAndReturnJSON()
        {
            try {
                // Run Python script to train the model
                $process = Process::fromShellCommandline('python ' . storage_path('cry_model.h5'));
                $process->run();

                // Check if the process was successful
                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }

                return response()->json(['message' => 'Python script executed successfully']);
            } catch (ProcessFailedException $exception) {
                // An error occurred during the process execution
                return response()->json(['error' => $exception->getMessage()], 500);
            }
        }


        public function sendMessage(Request $request)
        {
            $message = new Messages();
            $message->sender_id = $request->sender_id;
            $message->receiver_id = $request->receiver_id;
            $message->message = $request->message;
            $message->save();

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                [
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'useTLS' => true,
                ]
            );
            $pusher->trigger('chat', 'message-sent', $message);



        // event(new MessageSent($message));

            return response()->json($message);
        }

    }



