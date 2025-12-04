<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class TelegramService
{
    protected $baseUrl = 'https://api.telegram.org/bot';
    protected $token;
    protected $client;

    public function __construct()
    {
        $this->token = config('services.telegram.bot_token');
        $this->client = new Client([
            'base_uri' => $this->baseUrl . $this->token . '/',
            'timeout'  => 2.0,
        ]);
    }

    public function sendTelegramMessage(Request $request)
    {
        $message = $request->input('message');
        $chatId = '521930849'; // Replace with your actual chat ID logic

        try {
            $this->sendMessageToTelegram($chatId, $message);
            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
        }
    }

    private function sendMessageToTelegram($chatId, $message)
    {
        try {
            $response = $this->client->post('sendMessage', [
                'form_params' => [
                    'chat_id' => $chatId,
                    'text' => $message,
                ],
            ]);

            $body = json_decode($response->getBody(), true);
            // Process the response body as needed
            return $body;
        } catch (RequestException $e) {
            // Handle request exception
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                // Handle error response
                throw new \Exception('Telegram API error: ' . $statusCode . ' - ' . $body);
            }
            throw new \Exception('Telegram API request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            // Handle client exception
            throw new \Exception('Telegram API client error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            throw new \Exception('Telegram API error: ' . $e->getMessage());
        }
    }

    public function sendPhoto($chatId, $photoUrl, $caption = '')
    {
        try {
            $response = $this->client->post('sendPhoto', [
                'form_params' => [
                    'chat_id' => $chatId,
                    'photo' => $photoUrl,
                    'caption' => $caption,
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Handle request exception
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                // Handle error response
                throw new \Exception('Telegram API error: ' . $statusCode . ' - ' . $body);
            }
            throw new \Exception('Telegram API request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            // Handle client exception
            throw new \Exception('Telegram API client error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            throw new \Exception('Telegram API error: ' . $e->getMessage());
        }
    }
}

