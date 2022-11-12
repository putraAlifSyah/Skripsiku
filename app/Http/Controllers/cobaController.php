<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Artisan;

class cobaController extends Controller
{
    public function tambahColomn(){
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'wartawan_spk');
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          $added= mysqli_query($connection, "ALTER TABLE cobas ADD bayar VARCHAR(50) NOT NULL");

          if($added !== FALSE)
          {
             echo("The column has been added.");
          }else{
             echo("The column has not been added.");
          }
    }
    public function hapusKolom(){
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'wartawan_spk');
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          $added= mysqli_query($connection, "ALTER TABLE cobas DROP bayar");

          if($added !== FALSE)
          {
             echo("The column has been added.");
          }else{
             echo("The column has not been added.");
          }
    }
}
