<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Support\Facades\Artisan;

class PortfolioController extends Controller
{
    /**
     * Display the main single-page portfolio.
     */
    public function index()
    {
        try {
            $projects = Project::orderBy('sort_order', 'asc')->get();
            $experiences = Experience::orderBy('sort_order', 'asc')->get();
            $certifications = Certification::orderBy('sort_order', 'asc')->get();
        } catch (\Throwable $e) {
            try {
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('db:seed', ['--force' => true]);
                $projects = Project::orderBy('sort_order', 'asc')->get();
                $experiences = Experience::orderBy('sort_order', 'asc')->get();
                $certifications = Certification::orderBy('sort_order', 'asc')->get();
            } catch (\Throwable $migrationError) {
                $projects = collect();
                $experiences = collect();
                $certifications = collect();
            }
        }

        $skills = [
            'web' => [
                ['name' => 'HTML', 'category' => 'Web Development', 'icon' => 'code'],
                ['name' => 'CSS', 'category' => 'Web Development', 'icon' => 'layout'],
                ['name' => 'JavaScript', 'category' => 'Web Development', 'icon' => 'file-code'],
                ['name' => 'PHP', 'category' => 'Web Development', 'icon' => 'cpu'],
                ['name' => 'Laravel', 'category' => 'Web Development', 'icon' => 'flame'],
                ['name' => 'MySQL', 'category' => 'Web Development', 'icon' => 'database'],
                ['name' => 'Tailwind CSS', 'category' => 'Web Development', 'icon' => 'layers'],
            ],
            'design' => [
                ['name' => 'Canva', 'category' => 'Graphic Design', 'icon' => 'palette'],
                ['name' => 'Figma', 'category' => 'Graphic Design', 'icon' => 'figma'],
                ['name' => 'UI/UX Design', 'category' => 'Graphic Design', 'icon' => 'pen-tool'],
                ['name' => 'Poster Design', 'category' => 'Graphic Design', 'icon' => 'layout'],
                ['name' => 'Banner Design', 'category' => 'Graphic Design', 'icon' => 'sparkles'],
            ],
            'soft' => [
                ['name' => 'Problem Solving', 'category' => 'Soft Skills', 'icon' => 'puzzle'],
                ['name' => 'Kerja Sama', 'category' => 'Soft Skills', 'icon' => 'users'],
                ['name' => 'Komunikasi', 'category' => 'Soft Skills', 'icon' => 'message-circle'],
                ['name' => 'Manajemen Waktu', 'category' => 'Soft Skills', 'icon' => 'clock'],
                ['name' => 'Cepat Beradaptasi', 'category' => 'Soft Skills', 'icon' => 'zap'],
            ],
        ];

        return view('pages.home', compact('projects', 'experiences', 'certifications', 'skills'));
    }

    /**
     * Display the detailed project case study.
     */
    public function show(Project $project)
    {
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        $prevProject = Project::where('sort_order', '<', $project->sort_order)
            ->orderBy('sort_order', 'desc')
            ->first() ?? Project::orderBy('sort_order', 'desc')->first();

        $nextProject = Project::where('sort_order', '>', $project->sort_order)
            ->orderBy('sort_order', 'asc')
            ->first() ?? Project::orderBy('sort_order', 'asc')->first();

        return view('pages.project-detail', compact('project', 'relatedProjects', 'prevProject', 'nextProject'));
    }

    /**
     * Download the CV PDF.
     */
    public function downloadCv()
    {
        $cvPath = public_path('assets/cv/reyno-andrean-wijaksono-cv.pdf');

        if (file_exists($cvPath)) {
            return response()->download($cvPath, 'Reyno-Andrean-Wijaksono-CV.pdf');
        }

        return redirect()->route('home')->with('info', 'CV will be available shortly.');
    }
}
