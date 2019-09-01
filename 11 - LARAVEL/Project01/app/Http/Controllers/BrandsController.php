<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Country;
use App\Provider;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$brands = Brand::get();
		return view("brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::get();
		$providers = Provider::get();
        return view("brands.create", compact("countries", "providers"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = [
			"name" => $request->name,
			"logo" => $request->logo,
			"country_id" => $request->country_id,
			"provider_id" => $request->provider_id
		];

		$brand = Brand::create($data);
		return redirect("brands");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$brand = Brand::find($id);
		return view("brands.show", compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$brand = Brand::find($id);
		$countries = Country::get();
		$providers = Provider::get();
		return view("brands.edit", compact("brand", "countries", "providers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
			"name" => $request->name,
			"logo" => $request->logo,
			"country_id" => $request->country_id,
			"provider_id" => $request->provider_id
		];

		$brand = Brand::find($id)->update($data);
		return redirect("brands");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$brand = Brand::destroy($id);
		return redirect("brands");
    }
}
