<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Util;
use App\Contracts\DocumentResource as Helper;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Document extends Model implements Util
{
	use Helper;
	protected $table = 'docs';
	protected $fillable = [
		'isbn',
		'title',
		'author',
		'doc_num',
		'category',
		'description',
		'release_date',
	];

	/**
	 * Create New Document
	 * 
	 * @param  $request
	 * @return $this
	 */
	public function createDocument(object $request)
	{
		if ($this->documentExist($request->title)) return $this->asJson(Util::RESPONSE_EXIST, []);
		return $this->storeDocument($request);
	}

	/**
	 * Document Existence in Model
	 * 
	 * @param  string $title
	 * @return int
	 */
	public function documentExist(string $title) : int
	{
		$rows = $this->exist('title', $title);
		return $rows->count();
	}

	/**
	 * Store Document to Model
	 * 
	 * @param  object $request
	 * @return json
	 */
	private function storeDocument(object $request)
	{
		return $this->asJson(Util::RESPONSE_SUCCESS, $this->create($request->all()));
	}


}