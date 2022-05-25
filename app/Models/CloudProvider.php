<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class CloudProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'api_token',
        'provider',
        'user_id',
        'is_connected'
    ];

    public function connect(){
        if ($this->provider=='hetzner'){
            return Http::withToken("$this->api_token")
                ->get("https://api.hetzner.cloud/v1/servers");
        }
        elseif ($this->provider=='digitalocean'){
            return Http::withToken("$this->api_token")
                ->get("https://api.digitalocean.com/v2/droplets");
        }
        
    }

    protected function apiToken(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Crypt::encryptString($value),
            get: fn ($value) => Crypt::decryptString($value),
        );
    }

    public static function getAvailable(){
        return [
            'digitalocean'  =>[
                'name' => 'DigitalOcean',
                'text' => 'You can create a new DigitalOcean API access token for yourself or your team from the DigitalOcean API settings panel.',
            ],
            'hetzner'  =>[
                'name' => 'Hetzner',
                'text' => 'You can create a new Hetzner API access token for yourself or your team from the Hetzner Console settings panel.',
            ],
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
