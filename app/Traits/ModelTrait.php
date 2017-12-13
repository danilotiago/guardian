<?php

namespace App\Traits;

Trait ModelTrait
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->resource_view . '.index');
    }
}