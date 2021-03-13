<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Product;
use \App\Models\Vendor;
use \App\Models\Order;
use DateTime;
use DB;
use \Carbon\Carbon;

class PurchaseOrder extends Component
{
    public $folio, $date = '2021-03-13', $idVendor=0,  $comment, $idProduct=0;
    public $idOrder;
   
    public  $accion = "crear";

    public function render()
    {
        $product = Product::all();
        $vendor = Vendor::all();
        $order = DB::table('purchaseorders')
                ->join('vendors', 'purchaseorders.idVendor' , "=" , "vendors.idVendor")
                ->join('products', 'purchaseorders.idProduct' , "=" , "products.idProduct")
                ->get();
    
        return view('livewire.purchase-order')->with('product',$product)->with('vendor',$vendor)->with('order',$order);
    }

    public function create(){

        DB::table('purchaseorders')->insert([
            'idVendor' => $this->idVendor,
            'idProduct' => $this->idProduct,
            'date' => $this->date,
            'foli' => $this->folio,
            'comments' => $this->comment
        ]);

        $this->reset(['folio','date', 'idVendor', 'comment', 'idProduct']);
    }

    public function edit($order ,$pos ){
        $this->idOrder = $order[$pos]['idOrder'];
        $this->folio = $order[$pos]['foli'];
        $this->date = $order[$pos]['date'];
       $this->idVendor = $order[$pos]['idVendor'];
         $this->comment= $order[$pos]['comments'];
          $this->idProduct=  $order[$pos]['idProduct'];
          $this->accion = "editar";
    }

    public function update( ){
        DB::table('purchaseorders')
        ->where('idOrder',$this->idOrder)
        ->update([
            'idVendor' => $this->idVendor,
            'idProduct' => $this->idProduct,
            'date' => $this->date,
            'foli' => $this->folio,
            'comments' => $this->comment
        ]);
        $this->reset(['folio','date', 'idVendor', 'comment', 'idProduct', 'idOrder', 'accion']);
    }

    public function cancelar(){
        $this->reset(['folio','date', 'idVendor', 'comment', 'idProduct', 'idOrder', 'accion']);  
        }
    

    public function delete($order ,$pos ){
        $this->idOrder = $order[$pos]['idOrder'];
        DB::table('purchaseorders')
        ->where('idOrder',$this->idOrder)
        ->delete();

        //if(blank($project)){
       //     abort(404);
       // }
            
        $this->reset(['folio','date', 'idVendor', 'comment', 'idProduct', 'idOrder', 'accion']);
    }

    public function cambiaEstado($order ,$pos){
        if( $order[$pos]['status'] == 'Pendiente'){
            $this->idOrder = $order[$pos]['idOrder'];
            DB::table('purchaseorders')
            ->where('idOrder',$this->idOrder)
            ->update([
                'status' => 'Aceptado',
            ]);
        }else{

            if ($order[$pos]['status'] == 'Aceptado') {
                $this->idOrder = $order[$pos]['idOrder'];
                DB::table('purchaseorders')
                ->where('idOrder',$this->idOrder)
                ->update([
                    'status' => 'Rechazado',
                ]);
            }else{


                if ($order[$pos]['status'] == 'Rechazado') {
                    $this->idOrder = $order[$pos]['idOrder'];
                    DB::table('purchaseorders')
                    ->where('idOrder',$this->idOrder)
                    ->update([
                        'status' => 'Pendiente',
                    ]);
                }else{
                    $this->idOrder = $order[$pos]['idOrder'];
                    DB::table('purchaseorders')
                    ->where('idOrder',$this->idOrder)
                    ->update([
                        'status' => 'Aceptado',
                    ]);
                }
                 
              
            }
           
        }
       

        $this->reset(['folio','date', 'idVendor', 'comment', 'idProduct', 'idOrder', 'accion']);
    }
    

}
