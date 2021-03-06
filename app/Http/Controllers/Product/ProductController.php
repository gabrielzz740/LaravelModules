<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Entity\Product\ProductLogic;
use App\Entity\Utils\UtilsLogic;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            $utils = new UtilsLogic();
            $be = new ProductLogic();
            $list = $be->getProductList();
            $jsonResponse = new \stdClass();
            $jsonResponse->companyObject = $utils->getCompanyById($user->com_companies_id);
            $jsonResponse->user = $user;
            $jsonResponse->products = $list;
            $jsonResponse->tittle = 'Lista de productos';
            $view = view('Product.product', compact('jsonResponse', $jsonResponse));
        } else {
            $view = view('errors.404');
        }
        return $view;
    }
}
