<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IpkController extends Controller
{
    public function form(Request $request): View|RedirectResponse
    {
        if ($request->filled(['ip1', 'ip2'])) {
            return redirect()->route('ipk.hitung', [
                'ip1' => $request->string('ip1')->toString(),
                'ip2' => $request->string('ip2')->toString(),
            ]);
        }

        return view('ipk.form');
    }

    public function hitung(string $ip1, string $ip2): View
    {
        $nilaiIp1 = (float) $ip1;
        $nilaiIp2 = (float) $ip2;
        $isValid = $nilaiIp1 <= 4.00 && $nilaiIp2 <= 4.00;

        return view('ipk.hasil', [
            'ip1' => $nilaiIp1,
            'ip2' => $nilaiIp2,
            'isValid' => $isValid,
            'total' => $nilaiIp1 + $nilaiIp2,
            'rataRata' => ($nilaiIp1 + $nilaiIp2) / 2,
        ]);
    }
}
