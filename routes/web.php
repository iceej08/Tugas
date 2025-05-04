<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerMahasiswa;

Route::resource('mahasiswa', ControllerMahasiswa::class);

?>