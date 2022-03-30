<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//Clases para sentinel
use DB;
use Yajra\DataTables\DataTables;


use App\Equipos;
use App\Categorias;
use App\Grupo;
use App\GrupoEquipos;
use App\GrupoPartidos;
use App\Partidos;
use App\Ranking;


//Clase Mail
//use Mail; //de momento no la necesitamos. Descomentar cuando sea necesario

class IndexController extends Controller {
	//
	

	public function index() {
		
		$grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		$grupsdist = Partidos::distinct()->whereIn('grupo',$grups)->orderBy('grupo','ASC')->get(['grupo']);
		$catsdist = Partidos::distinct()->orderBy('cat_name','DESC')->get(['cat_name']);
		
		$grups = array();
		$cats = array();
		foreach ($grupsdist as $j => $vj) {
			$grups[]= $vj->grupo;
		}
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	
		 //$cats = Categorias::get();
		
		$result = array();
		$resultsimple = array();
		foreach ($cats as $cat) {
			$result[$cat] =array();
			
			foreach ($grups as $grup) {
						
					$partits= Partidos::where('cat_name','=',$cat)->where('grupo','=',$grup)->orderBy('ordre','ASC')->get();

					//$ranking = Ranking::where('categoria','=',$cat)->where('grupo','=',$grup)->orderBy('orden','ASC')->get();

					if(count($partits)!=0){
						$result[$cat][$grup]= $partits;
						//$result[$cat][$grup]['ranking'] = $ranking;
					}
			}
		
		}
		 
		//die(json_encode($result));
		$this->html->result = $result;
		return view('public.index') -> with('html', $this -> html);
	}



	public function livebase() {
		
		$grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		$grupsdist = Partidos::distinct()->whereIn('grupo',$grups)->orderBy('grupo','ASC')->get(['grupo']);
		$catsdist = Partidos::distinct()->orderBy('cat_name','DESC')->get(['cat_name']);
		
		$grups = array();
		$cats = array();
		foreach ($grupsdist as $j => $vj) {
			$grups[]= $vj->grupo;
		}
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	
		 //$cats = Categorias::get();
		
		$result = array();
		$resultsimple = array();
		foreach ($cats as $cat) {
			$result[$cat] =array();
			
			foreach ($grups as $grup) {
					$partits= Partidos::where('cat_name','=',$cat)->where('grupo','=',$grup)->orderBy('ordre','ASC')->get();
					if(count($partits)!=0){
						$result[$cat][$grup]= $partits;
						$resultsimple[]=$partits;
					}
			}
		
		}
		
		
		
		//die(json_encode($resultsimple));
		$this->html->result = $resultsimple;
		$this->html->resultfinal = $this->livefinalreturn();
		//$this->html->livefinal = $this->livefinal();
		return view('public.live') -> with('html', $this -> html);
	}


	public function livefinal() {
		
		$grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		$grupsdist = Partidos::distinct()->whereNotIn('grupo',$grups)->orderBy('grupo','ASC')->get(['grupo']);
		$catsdist = Partidos::distinct()->orderBy('cat_name','DESC')->get(['cat_name']);
		
		$grups = array();
		$cats = array();
		foreach ($grupsdist as $j => $vj) {
			$grups[]= $vj->grupo;
		}
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	
		 //$cats = Categorias::get();
		$today=date('d');
		//$today = 17;
		$result = array();
		$resultsimple = array();
		foreach ($cats as $cat) {
			$result[$cat] =array();
			
			foreach ($grups as $grup) {
					$partits= Partidos::where('cat_name','=',$cat)->where('grupo','=',$grup)->where('dia','=',$today)->orderBy('ordre','ASC')->get();
					if(count($partits)!=0){
						$result[$cat][$grup]= $partits;
						$resultsimple[]=$partits;
					}
			}
		
		}
		$this->html->resultfinal = $resultsimple;
		//return $resultsimple;
		return view('public.livefinal') -> with('html', $this -> html);
	}



	public function livefinalreturn() {
		
		$grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		$grupsdist = Partidos::distinct()->whereNotIn('grupo',$grups)->orderBy('grupo','ASC')->get(['grupo']);
		$catsdist = Partidos::distinct()->orderBy('cat_name','DESC')->get(['cat_name']);
		
		$grups = array();
		$cats = array();
		foreach ($grupsdist as $j => $vj) {
			$grups[]= $vj->grupo;
		}
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	
		 //$cats = Categorias::get();
		$today=date('d');
		//$today = 17;
		$result = array();
		$resultsimple = array();
		foreach ($cats as $cat) {
			$result[$cat] =array();
			
			foreach ($grups as $grup) {
					$partits= Partidos::where('cat_name','=',$cat)->where('grupo','=',$grup)->where('dia','=',$today)->orderBy('ordre','ASC')->get();
					if(count($partits)!=0){
						$result[$cat][$grup]= $partits;
						$resultsimple[]=$partits;
					}
			}
		
		}
		return $resultsimple;
		//return $resultsimple;
		//return view('public.livefinal') -> with('html', $this -> html);
	}

	public function admin() {
		
		
	
		$grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		$cats = Categorias::get();
		
		$catsdist = Partidos::distinct()->orderBy('cat_name','DESC')->get(['cat_name']);
		$cats = array();
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	
		

		$this->html->cats = $cats;
		//return $cats;
		return view('admin.admin') -> with('html', $this -> html);
	}


	public function cat($cat) {
		
		
		 $grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		//$cats = Categorias::where('nombre','=',$cat)->get();

		$grupsdist = Partidos::distinct()->whereIn('grupo',$grups)->orderBy('grupo','ASC')->get(['grupo']);
		$catsdist = Partidos::distinct()->get(['cat_name']);
		
		$grups = array();
		$cats = array();
		foreach ($grupsdist as $j => $vj) {
			$grups[]= $vj->grupo;
		}
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	

		$result = array();
		$cat = strtoupper($cat);
		$result[$cat] =array();		
		foreach ($grups as $grup) {
				$partits = Partidos::where('cat_name','=',$cat)->where('grupo','=',$grup)->orderBy('ordre','ASC')->get();
				if(count($partits)!=0){
					$result[$cat][$grup]= $partits;
				}	
		}	
		
		
		
		$this->html->result = $result;
		

		
		return view('admin.cat') -> with('html', $this -> html);
	}
	
	public function catFinals($cat) {
		
		
		$grups = ['A','B','C','D','E','F','G','H','I','J','K','K','L','M','N','O','P','Q','R','S','T'];
		// $cats = Categorias::where('nombre','=',$cat)->get();

		$grupsdist = Partidos::distinct()->whereNotIn('grupo',$grups)->orderBy('grupo','ASC')->get(['grupo']);
		$catsdist = Partidos::distinct()->get(['cat_name']);
		
		$grups = array();
		$cats = array();
		foreach ($grupsdist as $j => $vj) {
			$grups[]= $vj->grupo;
		}
		foreach ($catsdist as $l => $vl) {
			$cats[]= $vl->cat_name;
		}
	

		$result = array();
		$cat = strtoupper($cat);
		$result[$cat] =array();		
		foreach ($grups as $grup) {
				$partits = Partidos::where('cat_name','=',$cat)->where('grupo','=',$grup)->orderBy('ordre','ASC')->get();
				if(count($partits)!=0){
					$result[$cat][$grup]= $partits;
				}	
		}	
	
		
		
		$this->html->result = $result;
		
		
		return view('admin.cat') -> with('html', $this -> html);
	}



	public function wsedit() {
		
		$request = $this->html->request;
		$match = $request->match;
		$name_colum = $request->name;
		$value = $request->value;


		$partido = Partidos::find($match);
		$partido->{$name_colum} = $value;
		$partido->save();
		
		
		return array("SUCCESS"=>true);
	}

	public function editranking() {
		
		
		
		$request = $this->html->request;
		
		
		$ranking = $request->match;
		$name_colum = $request->name;
		$value = $request->value;


		$rank = Ranking::find($ranking);
		$rank->{$name_colum} = $value;
		$rank->save();
		
		
		return array("SUCCESS"=>true);
	}
	
	public function wslive() {
		
		$request = $this->html->request;
		$match = $request->match;
		


		$partido = Partidos::find($match);
	
		if($partido){
			
			return array("SUCCESS"=>true,"VALUE"=>$partido);
		}
		return array("SUCCESS"=>false);
		
	}
	
	public function wsranking() {
	
		$request = $this->html->request;
		$categoria = $request->categoria;
		$grupo = $request->grupo;


		$ranking = Ranking::where('categoria','=',$categoria)->where('grupo','=',$grupo)->orderBy('orden','ASC')->get();
	
		if($ranking){
			
			return array("SUCCESS"=>true,"VALUE"=>$ranking);
		}
		return array("SUCCESS"=>false);
		
	}
	
	public function datatable(){
		
	    $select = array('id','dia','hora','campo','cat_name','grupo','equipo1_name','equipo2_name');
	 
		$query = Partidos::select($select);		
	
	    return Datatables::of($query)
		->removeColumn('id')
		->addColumn('options',
		//'<a href="javascript:;"  onClick="executeSetup({{$id}})" ><i class="fa fa-rocket"></i></a>')
  	    //'<a target="_blank" href="{{url("admin/setup/ajax/executeSetup")}}?id={{$id}}" title="Ejecutar receta"  ><i class="fa fa-rocket"></i></a>&nbsp;&nbsp;&nbsp;
  	    '<a href="/admin/{{$cat_name}}/#{{$id}}"><i class="fa fa-eye"></i></a>')
	  
	    ->escapeColumns(['options'])		
	    ->make(false);
	}

}



