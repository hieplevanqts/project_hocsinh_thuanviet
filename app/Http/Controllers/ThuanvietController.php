<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThuanvietController extends Controller
{
    //

    public function gioithieu(){
        return view('canans.gioithieu.index');
    }

    public function giupviecgiadinh(){
        return view('canans.product.giupviecgiadinh');
    }

    public function giupviectheogio(){
        return view('canans.product.giupviectheogio');
    }

    public function tapvuvanphong(){
        return view('canans.product.tapvuvanphong');
    }

    public function dichvutrongtre(){
        return view('canans.product.dichvutrongtre');
    }

    public function chamsocnguoigia(){
        return view('canans.product.chamsocnguoigia');
    }

    public function giupviecphothong(){
        return view('canans.product.giupviecphothong');
    }

    public function doingunhanvien(){
        return view('canans.product.doingunhanvien');
    }

    public function camket(){
        return view('canans.product.camket');
    }

    public function banggia(){
        return view('canans.product.banggia');
    }

    public function lienhe(){
        return view('canans.product.lienhe');
    }
}
