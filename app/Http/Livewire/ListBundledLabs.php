<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LabBundle;
use Illuminate\Support\Facades\DB;

class ListBundledLabs extends Component
{
	public $selectedLab;

    public function render()
    {
    	$response = $this->getLabItemsWithPagination();
    	
        return view('livewire.list-bundled-labs',['labs'=>$response]);
    }

    public function getLabItemsWithPagination(){
    
	  $data = DB::table('pvt_bundled_lab_items as p')
            ->join('lab_category as c', 'c.id', '=', 'p.lab_item_id')
            ->join('bundle_lab_categories as b', 'b.id', '=', 'p.bundled_lab_id')->groupBy('p.bundled_lab_id')
            ->select(DB::raw('SUM(c.price) as price,b.bundle_name,b.img_url,b.id,b.package_code'))
            ->get();	
      return $data;

	}



	public function addToCart($id,$price,$name,$code){
		$selectedLab = ['id'=>$id,'price'=>$price];
		$packageName = str_replace("'", "", $name);
		
		session([
      	'bundleId' => $id,
      	'price' => $price,
      	'packageName'=>$packageName,
      	'packageCode'=>$code
    	]);
		$this->emit('item_added');
		return redirect()->to('/labs/users');
	}
}
