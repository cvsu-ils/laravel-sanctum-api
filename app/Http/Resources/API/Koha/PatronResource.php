<?php

namespace App\Http\Resources\API\Koha;

use Illuminate\Http\Resources\Json\JsonResource;

class PatronResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'cardnumber' => $this->cardnumber,
            'surname' => $this->surname,
            'firstname' => $this->firstname,
            'middle_name' => $this->middle_name,
            'email' => $this->email,
            'branchcode ' => $this->branchcode,
            'categorycode  ' => $this->categorycode,
            'dateenrolled  ' => $this->dateenrolled,
            'dateexpiry  ' => $this->dateexpiry,
            'sort1  ' => !empty($this->sort1) ? $this->sort1 : null,
            'sort2  ' => !empty($this->sort2) ? $this->sort2 : null
        ];
    }
}
