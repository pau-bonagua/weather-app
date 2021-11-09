<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    private $clientId = 'GE2YF1SCPEFSWBWI2WLQ51NFF0MPPSHVAH40TLU4T23S31JC';
    private $clientSecret = 'AKG01DOAOYDO4HL44405WFD0IZ15GZLNDEKWDMBZYU2KU3ZN';

    public function setClientId($id)
    {
        $this->clientId = $id;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientSecret($secret)
    {
        $this->clientSecret = $secret;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }
}
