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
            'primary_tech' => [
                ['name' => 'Laravel', 'category' => 'Backend Framework', 'type' => 'web', 'color' => '#FF2D20', 'glow' => 'rgba(255, 45, 32, 0.45)', 'icon' => 'laravel'],
                ['name' => 'PHP', 'category' => 'Backend Language', 'type' => 'web', 'color' => '#777BB4', 'glow' => 'rgba(119, 123, 180, 0.45)', 'icon' => 'php'],
                ['name' => 'MySQL', 'category' => 'Relational DB', 'type' => 'web', 'color' => '#00758F', 'glow' => 'rgba(0, 117, 143, 0.45)', 'icon' => 'mysql'],
                ['name' => 'MongoDB', 'category' => 'NoSQL Database', 'type' => 'web', 'color' => '#47A248', 'glow' => 'rgba(71, 162, 72, 0.45)', 'icon' => 'mongodb'],
                ['name' => 'Tailwind CSS', 'category' => 'Utility-First CSS', 'type' => 'web', 'color' => '#06B6D4', 'glow' => 'rgba(6, 182, 212, 0.45)', 'icon' => 'tailwind'],
                ['name' => 'JavaScript', 'category' => 'Interactive Web', 'type' => 'web', 'color' => '#F7DF1E', 'glow' => 'rgba(247, 223, 30, 0.45)', 'icon' => 'javascript'],
                ['name' => 'React', 'category' => 'Frontend UI Lib', 'type' => 'web', 'color' => '#61DAFB', 'glow' => 'rgba(97, 218, 251, 0.45)', 'icon' => 'react'],
                ['name' => 'Postman', 'category' => 'API Testing & Dev', 'type' => 'tools', 'color' => '#FF6C37', 'glow' => 'rgba(255, 108, 55, 0.45)', 'icon' => 'postman'],
                ['name' => 'Figma', 'category' => 'UI/UX & Prototype', 'type' => 'design', 'color' => '#F24E1E', 'glow' => 'rgba(242, 78, 30, 0.45)', 'icon' => 'figma'],
                ['name' => 'Canva', 'category' => 'Visual Branding', 'type' => 'design', 'color' => '#00C4CC', 'glow' => 'rgba(0, 196, 204, 0.45)', 'icon' => 'canva'],
                ['name' => 'VS Code', 'category' => 'Primary Code Editor', 'type' => 'tools', 'color' => '#007ACC', 'glow' => 'rgba(0, 122, 204, 0.45)', 'icon' => 'vscode'],
                ['name' => 'Git & GitHub', 'category' => 'Version Control', 'type' => 'tools', 'color' => '#10B981', 'glow' => 'rgba(16, 185, 129, 0.45)', 'icon' => 'github'],
            ],
            'web' => [
                ['name' => 'Laravel', 'category' => 'Web Development', 'icon' => 'flame'],
                ['name' => 'PHP', 'category' => 'Web Development', 'icon' => 'cpu'],
                ['name' => 'JavaScript', 'category' => 'Web Development', 'icon' => 'file-code'],
                ['name' => 'React', 'category' => 'Web Development', 'icon' => 'code'],
                ['name' => 'Tailwind CSS', 'category' => 'Web Development', 'icon' => 'layers'],
                ['name' => 'MySQL', 'category' => 'Web Development', 'icon' => 'database'],
                ['name' => 'MongoDB', 'category' => 'Web Development', 'icon' => 'database'],
            ],
            'design' => [
                ['name' => 'Figma', 'category' => 'Graphic Design', 'icon' => 'figma'],
                ['name' => 'Canva', 'category' => 'Graphic Design', 'icon' => 'palette'],
                ['name' => 'UI/UX Design', 'category' => 'Graphic Design', 'icon' => 'pen-tool'],
                ['name' => 'Poster Design', 'category' => 'Graphic Design', 'icon' => 'layout'],
                ['name' => 'Banner Design', 'category' => 'Graphic Design', 'icon' => 'sparkles'],
            ],
            'soft' => [
                ['name' => 'Problem Solving', 'category' => 'Soft Skills', 'icon' => 'puzzle'],
                ['name' => 'Kerja Sama Tim', 'category' => 'Soft Skills', 'icon' => 'users'],
                ['name' => 'Komunikasi Efektif', 'category' => 'Soft Skills', 'icon' => 'message-circle'],
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
