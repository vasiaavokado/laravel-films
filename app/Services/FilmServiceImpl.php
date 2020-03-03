<?php


namespace App\Services;


use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmServiceImpl implements FilmService
{
    /**
     * @var ActorsService
     */
    private $actorsService;

    public function __construct(ActorsService $actorsService){
       $this->actorsService = $actorsService;
    }

    public function getPagination(){
        return Film::latest('id')->paginate(9);
    }

    public function get(int $id):Film{
        return Film::findOrFail($id);
    }

    public function addFilm(Request $request,string $img,string $banner,array $genre,array $actors){
        DB::transaction(function () use ($request, $img, $banner, $genre, $actors) {
            $film = new Film();
            $film->name = $request->post("name");
            $film->year = (int)$request->post("year");
            $film->rate = 5;
            $film->img = $img;
            $film->banner = $banner;
            $film->description = $request->post("desc");
            $film->save();

            foreach ($genre as $g) {
                $film->genres()->attach((int)$g);
            }

            foreach ($actors as $a) {
                $a = trim($a);
                if (empty($a)) continue;
                $this->actorsService->createActor($film,$a);
            }
        });
    }
}