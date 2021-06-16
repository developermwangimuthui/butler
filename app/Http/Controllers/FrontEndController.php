<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function fleet_safety_policy()
    {
        return view('frontend.fleet-safety-policy');
    }
    public function intergrated_solutions()
    {
        return view('frontend.intergrated-solutions');
    }
    public function management_services()
    {
        return view('frontend.management-services');
    }
    public function solutions()
    {
        return view('frontend.solutions');
    }
    public function transport()
    {
        return view('frontend.transport');
    }
}
