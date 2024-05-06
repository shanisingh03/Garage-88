<?php


namespace App\Traits;

use Illuminate\Support\Facades\Http;

class SmsMessage
{

    protected string $apiKey;
    protected string $to;
    protected string $from;
    protected string $baseUrl;
    protected array  $lines;

    /**
     * SmsMessage constructor.
     * @param array $lines
     */
    public function __construct($lines = [])
    {
        $this->lines = $lines;
        $this->apiKey = config('services.sms.key');
        $this->from = "TXTLCL";
        $this->to = "";
    }

    public function line($line = ''): self
    {
        $this->lines[] = $line;

        return $this;
    }

    public function to($to): self
    {
        $this->to = $to;

        return $this;
    }

    public function from($from): self
    {
        $this->from = $from;

        return $this;
    }

    public function send(): mixed
    {
        if (!$this->from || !$this->to || !count($this->lines)) {
            throw new \Exception('SMS not correct.');
        }

        $data = [
            'apikey' => $this->apiKey,
            'numbers' => $this->to,
            'sender' => $this->from,
            'message' => $this->lines,
        ];

        $response =  Http::post('https://api.textlocal.in/send/', [
            'form_params' => $data,
        ]);
    }

    
}
