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
        // public function sendMessages(Request $request)
        // {
        //     // Validate request data
        //     $request->validate([
        //         'sender_id' => 'required',
        //         'receiver_id' => 'required',
        //         'message' => 'required',
        //     ]);

        //     // Create a new message
        //     $message = messages::create([
        //         'sender_id' => $request->sender_id,
        //         'receiver_id' => $request->receiver_id,
        //         'message' => $request->message,
        //     ]);

        //     // Send message via Pusher
        //     $pusher = new Pusher(
        //         env('PUSHER_APP_KEY'),
        //         env('PUSHER_APP_SECRET'),
        //         env('PUSHER_APP_ID'),
        //         [
        //             'cluster' => env('PUSHER_APP_CLUSTER'),
        //             'encrypted' => true
        //         ]
        //     );

        //     // Trigger an event to send the message to the frontend
        //     $pusher->trigger('messages', 'new-message', $message);

        //     return response()->json(['message' => 'Message sent successfully', 'data' => $message], 200);
        // }

        // public function receiveMessages(Request $request)
        // {
        //     // Validate request data
        //     $request->validate([
        //         'sender_id' => 'required',
        //         'receiver_id' => 'required',
        //         'message' => 'required',
        //     ]);

        //     // Create a new message
        //     $message = messages::create([
        //         'sender_id' => $request->sender_id,
        //         'receiver_id' => $request->receiver_id,
        //         'message' => $request->message,
        //     ]);

        //     // Return a success response
        //     return response()->json(['message' => 'Message received successfully', 'data' => $message], 200);
        // }




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






        public function sendaiMessage(Request $request)
        {
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
                    "usage" => [
                        "temperature" => 1,
                        "max_tokens" => 256,
                        "top_p" => 1,
                        "frequency_penalty" => 0,
                        "presence_penalty" => 0
                    ]
                ],
            ]);

            // Process response
            $data = json_decode($response->getBody()->getContents(), true);

            // Extract response from OpenAI
            $output = '';
            foreach ($data['choices'][0]['message']['content'] as $item) {
                if ($item['role'] == 'assistant') {
                    $output .= $item['content'];
                }
            }

            // Return the response
            return response()->json(['response' => $output]);
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

    }



