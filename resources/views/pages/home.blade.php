<x-layouts.app>
    <!-- 1. Hero Section -->
    <x-hero />

    <!-- 2. About Me Section -->
    <x-about />

    <!-- 3. Core Skills Section -->
    <x-skills :skills="$skills" />

    <!-- 4. Featured Work Section -->
    <x-projects :projects="$projects" />

    <!-- 5. Professional Journey Section -->
    <x-experience :experiences="$experiences" />

    <!-- 6. Certifications Section -->
    <x-certifications :certifications="$certifications" />

    <!-- 7. Contact Section -->
    <x-contact />
</x-layouts.app>
