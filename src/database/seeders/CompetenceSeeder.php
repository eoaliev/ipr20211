<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competence;

class CompetenceSeeder extends Seeder
{
    public function run()
    {
        Competence::factory(100)->create();

        $competences = Competence::orderBy('id', 'asc')->get();
        foreach ($competences as $competence) {
            // DEPTH 0
            if ($competence->id <= 10) {
                continue;
            }

            // DEPTH 1
            if ($competence->id <= 30) {
                $competence->path = [ceil(($competence->id - 10) / 2)];
                $competence->save();
                continue;
            }

            // DEPTH 2
            if ($competence->id <= 90) {
                $competence->path = [ceil(($competence->id - 30) / 6), ceil(($competence->id - 30) / 3) + 10];
                $competence->save();
                continue;
            }

            // DEPTH 3
            $path = [];
            $path[0] = $competence->id - 90;
            $path[1] = $path[0] * 2 + 10;
            $path[2] = $path[0] * 6 + 30;
            $competence->path = $path;
            $competence->save();
        }
    }
}
