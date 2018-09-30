<?php
namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{	
	private $document;

	public function __construct(Document $doc)
	{
		$this->document = $doc;
	}

	public function index()
	{
		return view('index');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' 		=> 'required',
			'author'		=> 'required',
			'release_date'	=> 'required',
			'category'		=> 'required'
		]);
		
		return $this->document->createDocument($request);
	}
}