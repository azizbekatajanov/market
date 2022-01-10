<?php

namespace App\Http\Resources\Dashboard;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($request->isMethod('GET')){
            return [
                'id' => $this->id,
                'username' => $this->username,
                'full_name' => $this->full_name,
                'email' => $this->email,
                'avatar' => $this->avatar
            ];
        }
        if ($request->isMethod('POST') OR $request->isMethod('PUT')){
            return [
                'id' => $this->id,
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'avatar' => $this->avatar
            ];
        }
    }
}
