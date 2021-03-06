<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingLogsByBatchNnumberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'line_id' => $this->id,                         //own tabe
            'batch_number_id' => $this->batch_number_id,   //own table
            'batch_number' => $this->batch_number->batch_number,  //belongs to relatioship in batch_number
            'item_name' => $this->item->name,           //belongs to relationship
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'cost' => $this->cost,
            // 'receiving_items' => $this->receiving_items
            // 'batch_number' => new BatchNumberShowResource($this->batch_number),  //belongs to relatioship in batch_number
            'date' => $this->receiving->date,
            'receiving_details' => [
                'date' => $this->receiving->date,
                'supplier_name' => $this->receiving->supplier->name,
                'po' => $this->receiving->po,
                'invoice_no' => $this->receiving->invoice_no,
                'delivery_note' => $this->receiving->delivery_note,
            ],

            'expiry_date' => $this->batch_number->expiry_date,
            'expiry_date_forHuman' =>  Carbon::now()->diffForHumans($this->batch_number->expiry_date)
        ];
    }
}
