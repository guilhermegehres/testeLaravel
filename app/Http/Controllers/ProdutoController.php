<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;

use App\Produto;

class ProdutoController extends Controller
{
    //
    private $error = 
        [
            'error' => 'Error', 
            'message' => 'Um erro foi encontrado, verifique os campos e parâmetros passados'
        ];

    private $success = [
        'success' => 'succsess' 
    ];

    public function getProdutos($id = null){
        if(!empty($id)){
            return json_encode(Produto::find($id), JSON_PRETTY_PRINT);
        }
        return json_encode(Produto::all(), JSON_PRETTY_PRINT);
    }

    public function storeProduto(Request $r ,$id = null){
        
        try{
            if(!empty($id)){
                $produto = Produto::find($id);
            }else{
                $produto = new Produto();
            }
            $produto->product_name = $r->input('product_name');
            $produto->product_description = $r->input('product_description');
            $produto->product_price = $r->input('product_price');
            $produto->product_amount = $r->input('product_amount');
            $produto->is_active = $r->input('is_active');
            $produto->save();
            return json_encode($this->success , JSON_PRETTY_PRINT);
        }catch(Exception $e){
            return json_encode($this->error, JSON_PRETTY_PRINT);
        }
    }

    public function deleteProduto($id){
        try{
            Produto::destroy($id);
            return json_encode($this->success , JSON_PRETTY_PRINT);
        }catch(Exception $e){
            return json_encode($this->error, JSON_PRETTY_PRINT);
        }
    }

    public function getProdutosByFiltro(Request $r){
        try{
            $produtos = Produto::where(function ($query) use($r) {
                        $query->orWhere('product_name', 'like', "%".$r->product_name."%")
                        ->orWhere('product_description', 'like', "%".$r->product_description."%");
            })->get();
           
            return json_encode($produtos, JSON_PRETTY_PRINT);
        }catch(Exception $e){
            return json_encode($this->error, JSON_PRETTY_PRINT);
        }
    }
}
