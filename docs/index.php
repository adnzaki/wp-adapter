<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WpAdapter — Elegant WordPress REST API Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        code: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        flashcyan: '#06b6d4',
                        flashblue: '#3b82f6',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .code-font {
            font-family: 'JetBrains Mono', monospace;
        }

        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #155e75;
            border-radius: 2px;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-slate-900 text-slate-100 min-h-screen selection:bg-cyan-500 selection:text-white">

    <!-- Ambient Glow / Background Aura -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[600px] pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-40 left-1/4 w-[600px] h-[600px] bg-cyan-500/20 rounded-full blur-[140px]"></div>
        <div class="absolute -top-20 right-1/4 w-[500px] h-[500px] bg-blue-500/20 rounded-full blur-[120px]"></div>
        <div class="absolute top-40 left-1/3 w-[300px] h-[300px] bg-teal-500/10 rounded-full blur-[100px]"></div>
    </div>

    <!-- Sticky Header -->
    <header class="sticky top-0 z-50 bg-slate-900/80 border-b border-slate-700/60 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-tr from-cyan-500 to-blue-600 text-white p-2 rounded-xl shadow-md shadow-cyan-950/40">
                    <i class="fa-solid fa-layer-group text-lg"></i>
                </div>
                <div>
                    <span class="text-lg font-bold text-white tracking-tight">WpAdapter</span>
                    <span class="ml-2 px-2.5 py-0.5 text-[11px] font-code font-semibold bg-cyan-950/60 text-cyan-300 rounded-full border border-cyan-800/60">v1.0.3</span>
                </div>
            </div>
            <a href="https://github.com/adnzaki/wp-adapter" target="_blank" class="text-slate-400 hover:text-white transition-colors">
                <i class="fa-brands fa-github text-xl"></i>
            </a>
        </div>
    </header>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-16">
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Sidebar Nav -->
            <aside class="lg:w-64 shrink-0">
                <nav class="sticky top-28 space-y-1 max-h-[calc(100vh-10rem)] overflow-y-auto pr-2 custom-scrollbar text-sm">
                    <p class="text-xs font-code font-bold text-cyan-500/70 uppercase tracking-wider px-3 mb-2">1. Foundations</p>
                    <a href="#philosophy" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">Philosophy & Concept</a>
                    <a href="#installation" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">Installation & Setup</a>

                    <p class="text-xs font-code font-bold text-cyan-500/70 uppercase tracking-wider px-3 pt-6 mb-2">2. Fluent Interface</p>
                    <a href="#fluent-chaining" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">How Chaining Works</a>
                    <a href="#object-schema" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">Output Object Structure</a>

                    <p class="text-xs font-code font-bold text-cyan-500/70 uppercase tracking-wider px-3 pt-6 mb-2">3. Advanced Architectures</p>
                    <a href="#architecture-pagination" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">Pagination & Taxonomies</a>
                    <a href="#architecture-hybrid" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">Hybrid Data Patterns</a>
                    <a href="#architecture-interaction" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800/70 hover:text-cyan-300 transition-colors">SEO & Comments Flow</a>
                </nav>
            </aside>

            <!-- Content -->
            <div class="flex-1 min-w-0 space-y-12">

                <!-- Hero -->
                <header class="text-center mb-4 space-y-4">
                    <div class="inline-flex items-center space-x-2 bg-cyan-950/60 border border-cyan-500/40 px-4 py-1.5 rounded-full backdrop-blur-sm shadow-lg">
                        <i class="fa-solid fa-arrows-left-right text-cyan-400 animate-bounce text-xs"></i>
                        <span class="text-xs font-code text-cyan-300 font-medium uppercase tracking-wider">Headless WordPress, Simplified</span>
                    </div>

                    <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight bg-gradient-to-r from-white via-cyan-300 to-blue-400 bg-clip-text text-transparent">
                        WpAdapter
                    </h1>

                    <p class="text-slate-300 max-w-xl mx-auto text-base sm:text-lg leading-relaxed">
                        An ultra-lightweight, zero-dependency bridge between your PHP application and a Headless WordPress installation via the WordPress REST API.
                    </p>
                </header>

                <!-- Composer Box -->
                <div class="group relative bg-gradient-to-b from-slate-800/80 via-slate-900/90 to-slate-950/90 border border-slate-700/60 hover:border-cyan-500/50 rounded-3xl p-6 sm:p-8 transition-all duration-300 backdrop-blur-md shadow-2xl">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="bg-cyan-500/20 border border-cyan-500/40 text-cyan-400 p-3 rounded-2xl">
                                <i class="fa-solid fa-terminal text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Instantly Bridged</h3>
                                <p class="text-xs text-slate-400">Zero dependencies, drop-in ready</p>
                            </div>
                        </div>
                        <span class="w-fit font-code text-xs text-cyan-400 bg-cyan-950/80 px-3 py-1.5 rounded-md border border-cyan-800/60 font-semibold tracking-wide block">
                            STABLE • v1.0.3
                        </span>
                    </div>

                    <div class="bg-slate-950 border border-slate-800 rounded-xl p-4 font-code text-xs text-slate-300 shadow-inner overflow-x-auto whitespace-nowrap scrollbar-none">
                        <div class="flex items-center space-x-2 text-cyan-400 mb-2">
                            <i class="fa-solid fa-code text-[10px]"></i>
                            <span class="font-bold text-[11px] uppercase tracking-wider text-slate-500">Composer Command</span>
                        </div>
                        <div class="text-slate-300 select-all">
                            <span class="text-cyan-500">$</span> composer require adnzaki/wp-adapter
                        </div>
                    </div>
                </div>

                <!-- Philosophy -->
                <section id="philosophy" class="scroll-mt-28 space-y-4">
                    <h2 class="text-2xl font-extrabold text-white flex items-center gap-2">
                        <i class="fa-solid fa-circle-info text-cyan-400 text-lg"></i> Philosophy & Core Concepts
                    </h2>
                    <p class="text-slate-300 leading-relaxed">
                        <strong class="text-cyan-200">WpAdapter</strong> is built with one primary goal: to serve as an ultra-lightweight, zero-dependency bridge between your PHP application and a Headless WordPress installation via the WordPress REST API.
                    </p>
                    <p class="text-slate-300 leading-relaxed">
                        This library does not make assumptions about the framework you are using. It works silently under the hood to handle HTTP requests, parse complex JSON payloads, and transform them into clean, structured, and consistent PHP objects ready for your application.
                    </p>
                </section>

                <!-- Installation -->
                <section id="installation" class="scroll-mt-28 space-y-6">
                    <h2 class="text-2xl font-extrabold text-white flex items-center gap-2">
                        <i class="fa-solid fa-download text-cyan-400 text-lg"></i> Installation & Setup
                    </h2>
                    <p class="text-slate-300">Follow these simple steps to integrate the library smoothly into your project environment:</p>

                    <div class="space-y-4">
                        <div class="bg-slate-800/40 border border-slate-700/60 p-5 rounded-xl hover:border-cyan-500/30 transition-colors">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-cyan-600 rounded-full">1</span>
                                <h3 class="text-sm font-bold text-cyan-300">Install via Composer</h3>
                            </div>
                            <p class="text-xs text-slate-400 mb-3">Run the package requirement command in your terminal inside the project root path:</p>
                            <div class="bg-slate-950 border border-slate-800 rounded-lg p-3 font-code text-xs text-slate-300 overflow-x-auto scrollbar-none">
                                <span class="text-cyan-500">$</span> composer require adnzaki/wp-adapter
                            </div>
                        </div>

                        <div class="bg-slate-800/40 border border-slate-700/60 p-5 rounded-xl hover:border-cyan-500/30 transition-colors">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-cyan-600 rounded-full">2</span>
                                <h3 class="text-sm font-bold text-cyan-300">Include the Autoloader</h3>
                            </div>
                            <p class="text-xs text-slate-400 mb-3">Ensure Composer's native vendor autoloader file is included at your application entry point:</p>
                            <div class="bg-slate-950 border border-slate-800 rounded-lg p-3 font-code text-xs text-slate-300 overflow-x-auto scrollbar-none">
                                <span class="text-purple-400">require_once</span> __DIR__ . <span class="text-emerald-400">'/vendor/autoload.php'</span>;
                            </div>
                        </div>

                        <div class="bg-slate-800/40 border border-slate-700/60 p-5 rounded-xl hover:border-cyan-500/30 transition-colors">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-cyan-600 rounded-full">3</span>
                                <h3 class="text-sm font-bold text-cyan-300">Define a Global Helper (Recommended)</h3>
                            </div>
                            <p class="text-xs text-slate-400 mb-3">To streamline usage across various controllers or modules without repeating configuration values, register a global helper function:</p>
                            <div class="bg-slate-950 border border-slate-800 rounded-lg p-3 font-code text-xs text-slate-300 overflow-x-auto scrollbar-none space-y-1">
                                <p><span class="text-purple-400">function</span> <span class="text-cyan-400">wp</span>() {</p>
                                <p class="pl-4"><span class="text-purple-400">return new</span> \<span class="text-teal-400">WpAdapter</span>(<span class="text-emerald-400">'https://cms.your-domain.com'</span>);</p>
                                <p>}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Fluent Chaining -->
                <section id="fluent-chaining" class="scroll-mt-28 space-y-4">
                    <h2 class="text-2xl font-extrabold text-white flex items-center gap-2">
                        <i class="fa-solid fa-link text-cyan-400 text-lg"></i> Understanding the Fluent Interface (Method Chaining)
                    </h2>
                    <p class="text-slate-300 leading-relaxed">
                        Before executing an API request, you can dynamically modify the internal configuration of the <code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">WpAdapter</code> instance using Method Chaining. Each setter function alters the state and returns the instance itself (<code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">return $this;</code>).
                    </p>

                    <div class="overflow-x-auto border border-slate-700/60 rounded-2xl">
                        <table class="min-w-full divide-y divide-slate-700/60 text-sm">
                            <thead class="bg-slate-800/60 text-slate-200 font-semibold">
                                <tr>
                                    <th class="px-4 py-3 text-left font-code text-xs uppercase tracking-wider text-cyan-400">Setter Method</th>
                                    <th class="px-4 py-3 text-left font-code text-xs uppercase tracking-wider text-cyan-400">Effect on API Request</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800 text-slate-300">
                                <tr class="hover:bg-slate-800/30">
                                    <td class="px-4 py-3 text-cyan-300 font-code text-xs font-semibold whitespace-nowrap">setPerPage(int $limit)</td>
                                    <td class="px-4 py-3 text-xs">Sets the maximum number of posts to retrieve in a single page request.</td>
                                </tr>
                                <tr class="hover:bg-slate-800/30">
                                    <td class="px-4 py-3 text-cyan-300 font-code text-xs font-semibold whitespace-nowrap">startFrom(int $offset)</td>
                                    <td class="px-4 py-3 text-xs">Skips a specified number of initial posts. Essential for custom application pagination synchronization.</td>
                                </tr>
                                <tr class="hover:bg-slate-800/30">
                                    <td class="px-4 py-3 text-cyan-300 font-code text-xs font-semibold whitespace-nowrap">setSinglePostUrl(string $prefix)</td>
                                    <td class="px-4 py-3 text-xs">Modifies the dynamic routing prefix generated on post objects for localized link handling.</td>
                                </tr>
                                <tr class="hover:bg-slate-800/30">
                                    <td class="px-4 py-3 text-cyan-300 font-code text-xs font-semibold whitespace-nowrap">setIds(array $ids)</td>
                                    <td class="px-4 py-3 text-xs">Restricts the query payload to filter strictly by a specified array of entity IDs.</td>
                                </tr>
                                <tr class="hover:bg-slate-800/30">
                                    <td class="px-4 py-3 text-cyan-300 font-code text-xs font-semibold whitespace-nowrap">setOrder(string $by, string $direction)</td>
                                    <td class="px-4 py-3 text-xs">Configures sorting properties. Pass <code class="text-cyan-300">'include'</code> to precisely maintain the order sequence of IDs given in the array.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-slate-900/80 border border-slate-700/70 rounded-2xl overflow-hidden shadow-xl">
                        <div class="bg-slate-800/90 px-5 py-3 border-b border-slate-700/60 flex justify-between items-center">
                            <span class="text-xs font-code text-slate-200 font-medium"><i class="fa-solid fa-circle-chevron-right text-cyan-400 mr-2"></i>Example chained configuration</span>
                            <span class="text-[10px] font-code bg-cyan-950 text-cyan-400 border border-cyan-900/50 px-2 py-0.5 rounded">WpAdapter.php</span>
                        </div>
                        <div class="p-5 font-code text-xs sm:text-sm bg-slate-950 text-slate-300 overflow-x-auto scrollbar-none space-y-1 leading-relaxed whitespace-nowrap">
                            <p><span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">setPerPage</span>(<span class="text-orange-400">5</span>)</p>
                            <p class="pl-4">-&gt;<span class="text-amber-400">setSinglePostUrl</span>(<span class="text-emerald-400">'read'</span>)</p>
                            <p class="pl-4">-&gt;<span class="text-amber-400">setOrder</span>(<span class="text-emerald-400">'title'</span>, <span class="text-emerald-400">'asc'</span>);</p>
                        </div>
                    </div>
                </section>

                <!-- Object Schema -->
                <section id="object-schema" class="scroll-mt-28 space-y-4">
                    <h2 class="text-2xl font-extrabold text-white flex items-center gap-2">
                        <i class="fa-solid fa-cube text-cyan-400 text-lg"></i> Normalized Output Object Schema
                    </h2>
                    <p class="text-slate-300 leading-relaxed">
                        The WordPress REST API returns deeply nested JSON trees. <code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">WpAdapter</code> simplifies this data, normalizing it into clean, flat PHP properties ready for your UI presentation layer:
                    </p>

                    <div class="bg-slate-900/80 border border-slate-700/70 rounded-2xl overflow-hidden shadow-xl">
                        <div class="bg-slate-800/90 px-5 py-3 border-b border-slate-700/60 flex justify-between items-center">
                            <span class="text-xs font-code text-slate-200 font-medium"><i class="fa-solid fa-circle-chevron-right text-cyan-400 mr-2"></i>Post object properties</span>
                            <span class="text-[10px] font-code bg-cyan-950 text-cyan-400 border border-cyan-900/50 px-2 py-0.5 rounded">Post.php</span>
                        </div>
                        <div class="p-5 font-code text-xs sm:text-sm bg-slate-950 text-slate-300 overflow-x-auto scrollbar-none space-y-1.5 leading-relaxed whitespace-nowrap">
                            <p><span class="text-blue-400">$post</span>-&gt;<span class="text-cyan-300">id</span> <span class="text-slate-500">// Unique Post ID (Integer)</span></p>
                            <p><span class="text-blue-400">$post</span>-&gt;<span class="text-cyan-300">title</span> <span class="text-slate-500">// Clean rendered title string (String)</span></p>
                            <p><span class="text-blue-400">$post</span>-&gt;<span class="text-cyan-300">excerpt</span> <span class="text-slate-500">// Plain-text trimmed summary abstract without HTML elements (String)</span></p>
                            <p><span class="text-blue-400">$post</span>-&gt;<span class="text-cyan-300">content</span> <span class="text-slate-500">// Full body layout document keeping original markup elements (String)</span></p>
                            <p><span class="text-blue-400">$post</span>-&gt;<span class="text-cyan-300">singlePostImage</span> <span class="text-slate-500">// Resolved direct URL string to the attachment Featured Image (String)</span></p>
                            <p><span class="text-blue-400">$post</span>-&gt;<span class="text-cyan-300">url</span> <span class="text-slate-500">// Dynamically computed local route mapping (e.g., /read/article-slug)</span></p>
                        </div>
                    </div>
                </section>

                <!-- Implementation Playground -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-extrabold text-white flex items-center gap-2 pt-4">
                        <i class="fa-solid fa-bolt-lightning text-blue-400 text-lg"></i> Implementation Playground
                    </h3>

                    <!-- Pagination -->
                    <section id="architecture-pagination" class="scroll-mt-28 space-y-3">
                        <h4 class="text-lg font-bold text-white">Custom Pagination & Taxonomy Filtering</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            When building production architectures, you need to seamlessly sync your application's presentation pagination with the WordPress collection count metrics. Leverage <code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">getTotalPost()</code> to extract the WordPress metadata headers (<code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">X-WP-Total</code>) for overhead-free calculations, combined with <code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">startFrom()</code> to pull clean, sliced datasets.
                        </p>

                        <div class="bg-slate-900/80 border border-slate-700/70 rounded-2xl overflow-hidden shadow-xl">
                            <div class="bg-slate-800/90 px-5 py-3 border-b border-slate-700/60 flex justify-between items-center">
                                <span class="text-xs font-code text-slate-200 font-medium"><i class="fa-solid fa-circle-chevron-right text-cyan-400 mr-2"></i>1. Pagination & Taxonomy Sync</span>
                                <span class="text-[10px] font-code bg-cyan-950 text-cyan-400 border border-cyan-900/50 px-2 py-0.5 rounded">WpAdapter.php</span>
                            </div>
                            <div class="p-5 font-code text-xs sm:text-sm bg-slate-950 text-slate-300 overflow-x-auto scrollbar-none space-y-1 leading-relaxed whitespace-nowrap">
                                <p><span class="text-slate-500">// Scenario: Calculating matching documents filtered under dynamic taxonomies or search terms</span></p>
                                <p><span class="text-blue-400">$taxonomyFilters</span> = [];</p>
                                <p><span class="text-purple-400">if</span> (<span class="text-blue-400">$taxonomyType</span> === <span class="text-emerald-400">'category'</span>) {</p>
                                <p class="pl-4"><span class="text-slate-500">// Resolve dynamic string slug markers into internal WordPress unique primary key integers</span></p>
                                <p class="pl-4"><span class="text-blue-400">$category</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">categorySlug</span>(<span class="text-blue-400">$slugValue</span>)-&gt;<span class="text-amber-400">getCategories</span>(<span class="text-orange-400">1</span>);</p>
                                <p class="pl-4"><span class="text-blue-400">$taxonomyFilters</span> = [<span class="text-emerald-400">'categories'</span> =&gt; <span class="text-blue-400">$category</span>[<span class="text-orange-400">0</span>]-&gt;<span class="text-cyan-300">id</span>];</p>
                                <p>}</p>
                                <br>
                                <p><span class="text-slate-500">// 1. Fetch total matching records globally from the WordPress server</span></p>
                                <p><span class="text-blue-400">$totalRecords</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">getTotalPost</span>(<span class="text-amber-400">array_merge</span>([<span class="text-emerald-400">'search'</span> =&gt; <span class="text-blue-400">$searchQuery</span>], <span class="text-blue-400">$taxonomyFilters</span>));</p>
                                <br>
                                <p><span class="text-slate-500">// 2. Query precisely sliced record offsets corresponding with local calculation values</span></p>
                                <p><span class="text-blue-400">$postsResult</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">setPerPage</span>(<span class="text-orange-400">10</span>)</p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">setSinglePostUrl</span>(<span class="text-emerald-400">'read'</span>)</p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">startFrom</span>(<span class="text-blue-400">$calculatedLocalOffset</span>)</p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">getPosts</span>(<span class="text-blue-400">$currentPage</span>, [<span class="text-emerald-400">'media'</span>, <span class="text-emerald-400">'category'</span>], <span class="text-blue-400">$searchQuery</span>, <span class="text-blue-400">$taxonomyType</span>, <span class="text-blue-400">$slugValue</span>);</p>
                            </div>
                        </div>
                    </section>

                    <!-- Hybrid -->
                    <section id="architecture-hybrid" class="scroll-mt-28 space-y-3">
                        <h4 class="text-lg font-bold text-white">Hybrid Data Synchronization (Popular Posts Model)</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Frequently, you might want to track highly write-intensive interactive values (like page view counters or clicks) inside a fast, local transactional database, while keeping structural content management centralized inside WordPress.
                        </p>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            The solution: Fetch the sorted primitive post IDs matching your local analytical matrix rankings, and feed them into <code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">setIds()</code>. Enforce <code class="text-cyan-300 bg-slate-950 px-1.5 py-0.5 rounded font-code text-xs">setOrder('include')</code> to guarantee that the WordPress engine respects and retains your exact local sort structure.
                        </p>

                        <div class="bg-slate-900/80 border border-slate-700/70 rounded-2xl overflow-hidden shadow-xl">
                            <div class="bg-slate-800/90 px-5 py-3 border-b border-slate-700/60 flex justify-between items-center">
                                <span class="text-xs font-code text-slate-200 font-medium"><i class="fa-solid fa-circle-chevron-right text-cyan-400 mr-2"></i>2. Popular Posts Hydration</span>
                                <span class="text-[10px] font-code bg-cyan-950 text-cyan-400 border border-cyan-900/50 px-2 py-0.5 rounded">WpAdapter.php</span>
                            </div>
                            <div class="p-5 font-code text-xs sm:text-sm bg-slate-950 text-slate-300 overflow-x-auto scrollbar-none space-y-1 leading-relaxed whitespace-nowrap">
                                <p><span class="text-slate-500">// Scenario: Enriched hydration linking localized metric sorting with remote WordPress schemas</span></p>
                                <p><span class="text-slate-500">// Retrieve top 5 unique tracking IDs from your application data engine</span></p>
                                <p><span class="text-blue-400">$localPopularIds</span> = [<span class="text-orange-400">241</span>, <span class="text-orange-400">102</span>, <span class="text-orange-400">88</span>, <span class="text-orange-400">514</span>, <span class="text-orange-400">19</span>];</p>
                                <br>
                                <p><span class="text-slate-500">// Hydrate the empty array sequence with full structural metadata layouts</span></p>
                                <p><span class="text-blue-400">$popularPostsList</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">setPerPage</span>(<span class="text-orange-400">5</span>)</p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">setSinglePostUrl</span>(<span class="text-emerald-400">'read'</span>)</p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">setIds</span>(<span class="text-blue-400">$localPopularIds</span>)</p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">setOrder</span>(<span class="text-emerald-400">'include'</span>) <span class="text-slate-500">// CRITICAL: Ensures content blocks remain aligned with local view sorting</span></p>
                                <p class="pl-4">-&gt;<span class="text-amber-400">getPosts</span>(<span class="text-orange-400">1</span>, [<span class="text-emerald-400">'media'</span>, <span class="text-emerald-400">'category'</span>])[<span class="text-emerald-400">'data'</span>];</p>
                            </div>
                        </div>
                    </section>

                    <!-- SEO & Comments -->
                    <section id="architecture-interaction" class="scroll-mt-28 space-y-3">
                        <h4 class="text-lg font-bold text-white">Dynamic SEO Metadata Mapping & Threaded Comments</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            While loading targeted document views, you can directly map normalized object attributes to populate HTML OpenGraph headers for search engine optimization (SEO). Concurrently, retrieve ready-to-render multi-threaded/nested comment trees to any architectural depth limit via a single function execution call.
                        </p>

                        <div class="bg-slate-900/80 border border-slate-700/70 rounded-2xl overflow-hidden shadow-xl">
                            <div class="bg-slate-800/90 px-5 py-3 border-b border-slate-700/60 flex justify-between items-center">
                                <span class="text-xs font-code text-slate-200 font-medium"><i class="fa-solid fa-circle-chevron-right text-blue-400 mr-2"></i>3. SEO Mapping & Comment Threads</span>
                                <span class="text-[10px] font-code bg-blue-950 text-blue-400 border border-blue-900 px-2 py-0.5 rounded">WpAdapter.php</span>
                            </div>
                            <div class="p-5 font-code text-xs sm:text-sm bg-slate-950 text-slate-300 overflow-x-auto scrollbar-none space-y-1 leading-relaxed whitespace-nowrap">
                                <p><span class="text-slate-500">// 1. Retrieve a single structured document using path slug queries</span></p>
                                <p><span class="text-blue-400">$postDetails</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">setSinglePostUrl</span>(<span class="text-emerald-400">'read'</span>)-&gt;<span class="text-amber-400">readPost</span>(<span class="text-blue-400">$articleSlug</span>);</p>
                                <br>
                                <p><span class="text-purple-400">if</span> (!<span class="text-amber-400">empty</span>(<span class="text-blue-400">$postDetails</span>)) {</p>
                                <p class="pl-4"><span class="text-slate-500">// Dynamically assign properties to map OpenGraph layout variables</span></p>
                                <p class="pl-4"><span class="text-blue-400">$openGraphMetadata</span> = [</p>
                                <p class="pl-8"><span class="text-emerald-400">'og:title'</span> =&gt; <span class="text-blue-400">$postDetails</span>-&gt;<span class="text-cyan-300">title</span>,</p>
                                <p class="pl-8"><span class="text-emerald-400">'og:description'</span> =&gt; <span class="text-blue-400">$postDetails</span>-&gt;<span class="text-cyan-300">excerpt</span>,</p>
                                <p class="pl-8"><span class="text-emerald-400">'og:image'</span> =&gt; <span class="text-blue-400">$postDetails</span>-&gt;<span class="text-cyan-300">singlePostImage</span>,</p>
                                <p class="pl-8"><span class="text-emerald-400">'og:url'</span> =&gt; <span class="text-blue-400">$postDetails</span>-&gt;<span class="text-cyan-300">url</span></p>
                                <p class="pl-4">];</p>
                                <br>
                                <p class="pl-4"><span class="text-slate-500">// 2. Fetch comments recursively constructed into hierarchical response elements automatically</span></p>
                                <p class="pl-4"><span class="text-blue-400">$commentThreads</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">getCommentsWithReplies</span>(<span class="text-blue-400">$postDetails</span>-&gt;<span class="text-cyan-300">id</span>);</p>
                                <p>}</p>
                                <br>
                                <p><span class="text-slate-500">// 3. Dispatching New Interaction Transactions (Supports Multi-Tier Reply Nodes)</span></p>
                                <p><span class="text-blue-400">$submissionResult</span> = <span class="text-blue-400">$wp</span>-&gt;<span class="text-amber-400">addComment</span>(</p>
                                <p class="pl-4"><span class="text-blue-400">$targetPostId</span>,</p>
                                <p class="pl-4"><span class="text-blue-400">$commentMessageBody</span>,</p>
                                <p class="pl-4">[<span class="text-emerald-400">'author_name'</span> =&gt; <span class="text-blue-400">$senderName</span>, <span class="text-emerald-400">'author_email'</span> =&gt; <span class="text-blue-400">$senderEmail</span>],</p>
                                <p class="pl-4"><span class="text-blue-400">$parentCommentId</span> <span class="text-slate-500">// Set 0 for root-level nodes, pass target comment unique ID to execute a reply</span></p>
                                <p>);</p>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Native Instance Callout -->
                <div class="bg-gradient-to-r from-cyan-950/40 to-slate-900/60 border border-cyan-500/40 rounded-2xl p-5 flex items-start gap-4 shadow-xl backdrop-blur-sm">
                    <div class="bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 p-2.5 rounded-xl mt-0.5">
                        <i class="fa-solid fa-unlock-keyhole text-base"></i>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-cyan-300 font-code">$wp</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            WpAdapter does not lock you in. Every fluent setter simply mutates internal request state and returns the same instance, so you stay in full control of how requests to your Headless WordPress backend are composed and dispatched.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="relative z-10 border-t border-slate-800 bg-slate-950/80 backdrop-blur-md py-6 text-center text-xs text-slate-400 font-code">
        <div>
            &copy; 2026 Powered by <span class="text-cyan-400 font-sans font-semibold">WpAdapter</span>. Crafted by <span class="text-slate-300 font-sans font-semibold">Adnan Zaki</span>. Released under the MIT License.
        </div>
    </footer>

</body>

</html>