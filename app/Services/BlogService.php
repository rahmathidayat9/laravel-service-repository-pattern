<?php 

namespace App\Services;

use App\Repositories\BlogRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DomDocument;

class BlogService
{	
	private $blogRepository;

	public function __construct(BlogRepositoryInterface $blogRepository)
	{
		$this->blogRepository = $blogRepository;
	}

	public function getAllData()
	{
		return $this->blogRepository->getAll();
	}

	public function getPaginateData($limit)
	{
		return $this->blogRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->blogRepository->getById($id);
	}

	public function getBySlugData($slug)
	{
		return $this->blogRepository->getBySlug($slug);
	}

	public function createData($payload)
	{
		/**
		 * Upload thumbnail
		 */
        $file = $payload->file('thumbnail');
        $before_thumbnail_filename = Str::lower(Str::random(9).$file->getClientOriginalName());
        $after_thumbnail_filename = Str::replace([' ','-','_','(',')','%'], '', $before_thumbnail_filename);
        $file->storeAs('public/uploads/images/blogs', $after_thumbnail_filename);

        /**
         * Body untuk konten
         */
        $dom = new DomDocument();
        $dom->loadHtml($payload->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name = "/storage/uploads/images/blogs/". Str::random(9).time().$k.'.png';
            $path = public_path().$image_name;
            File::put($path,$data);
        
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $payload = [
            'user_id' => Auth::user()->id,
            'title' => $payload->title,
            'slug' => Str::slug($payload->title),
            'thumbnail' => $after_thumbnail_filename,
            'body' => $content,
        ];

		return $this->blogRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		return $this->blogRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		$blog = $this->blogRepository->getById($id);
		
		Storage::delete('public/uploads/images/blogs/'.$blog->thumbnail);
		
		$content = $blog->body;
		$dom = new DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
		
		foreach ($images as $img) {
            $data = $img->getAttribute('src');
            File::delete(public_path($data));
        }

		return $this->blogRepository->delete($id);
	}
}