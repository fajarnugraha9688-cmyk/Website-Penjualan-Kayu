<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerController extends Controller
{
    /**
     * ==========================================================
     * DATA PELANGGAN
     * ==========================================================
     */
    public function index()
    {
        $customers = User::where('role', 'customer')
            ->withCount('orders')
            ->latest()
            ->get();

        return view('admin.customer.index', [

            'title' => 'Data Pelanggan',

            'customers' => $customers

        ]);
    }

        /**
     * ==========================================================
     * DETAIL PELANGGAN
     * ==========================================================
     */
    public function show(User $customer)
    {
        $customer->load([

            'orders.orderItems.jenisKayu'

        ]);

        return view('admin.customer.show', [

            'title'    => 'Detail Pelanggan',

            'customer' => $customer

        ]);
    }

}
