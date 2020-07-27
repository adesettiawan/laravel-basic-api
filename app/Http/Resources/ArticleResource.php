<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        //jika kita ingin menampilkan sebagian data saja 
        return [

            'title' => $this->title,
            'pusblished' => $this->created_at->format("d F Y"),
            'subject' => $this->subject->name,
            'author'  => $this->user->name,

        ];

        // return parent::toArray($request);
    }

    // public function with($request) //menambahkan suatu aksi yang kita hendaki
    // {
    //     return ['status' => 'succes']; 
    // }
}
