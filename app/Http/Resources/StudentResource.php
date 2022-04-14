<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'registration_number' => $this->registration_number,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'class_id' => $this->class_id,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ];
    }
}
