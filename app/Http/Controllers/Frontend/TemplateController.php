<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Welcome Page Of Frontend
     * @param Nill
     * @return View
     * @author Shani Singh
     */
    public function welcome()
    {
        // return view('frontend.home');
        return view('errors.503');
    }


    /**
     * About Us Page Of Frontend
     * @param Nill
     * @return View
     * @author Shani Singh
     */
    public function aboutUs()
    {
        return view('frontend.about');
    }


    /**
     * Services Page Of Frontend
     * @param Nill
     * @return View
     * @author Shani Singh
     */
    public function services()
    {
        return view('frontend.services');
    }
    
    /**
     * Service Details Page Of Frontend
     * @param Nill
     * @return View
     * @author Shani Singh
     */
    public function getServiceDetails()
    {
        return view('frontend.service-details');
    }

    /**
     * Contact Page Of Frontend
     * @param Nill
     * @return View
     * @author Shani Singh
     */
    public function contactUs()
    {
        return view('frontend.contact');
    }
}
