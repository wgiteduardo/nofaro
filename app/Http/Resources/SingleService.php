<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleService extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->date)->format('d/m/Y');
        return [
            'id' => $this->id,
            'pet' => $this->pet->name,
            'date' => $date,
            'message' => "Em ${date} o pet " . $this->pet->name . "(" . ($this->pet->specie == 'C' ? 'cão' : 'gato') . "): " . ($this->description != null ? $this->description : 'Não informado')
        ]; 
    }
}
