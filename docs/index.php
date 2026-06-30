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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        code,
        pre {
            font-family: 'JetBrains Mono', monospace !important;
            font-size: 0.875rem !important;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar for sidebar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    <header class="sticky top-0 z-50 bg-white/80 border-b border-slate-200 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-tr from-indigo-600 to-violet-500 text-white p-2 rounded-xl shadow-md shadow-indigo-100">
                    <i class="fa-solid fa-layer-group text-lg"></i>
                </div>
                <div>
                    <span class="text-lg font-bold text-slate-900 tracking-tight">WpAdapter</span>
                    <span class="ml-2 px-2.5 py-0.5 text-[11px] font-semibold bg-indigo-50 text-indigo-700 rounded-full border border-indigo-100">v1.0.0</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="https://github.com/adnzaki/wp-adapter" target="_blank" class="text-slate-500 hover:text-slate-900 transition-colors">
                    <i class="fa-brands fa-github text-xl"></i>
                </a>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-12">

            <aside class="lg:w-64 shrink-0">
                <nav class="sticky top-28 space-y-1 max-h-[calc(100vh-10rem)] overflow-y-auto pr-2 custom-scrollbar text-sm">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 mb-2">1. Foundations</p>
                    <a href="#philosophy" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">Philosophy & Concept</a>
                    <a href="#installation" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">Installation & Setup</a>

                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 pt-6 mb-2">2. Fluent Interface</p>
                    <a href="#fluent-chaining" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">How Chaining Works</a>
                    <a href="#object-schema" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">Output Object Structure</a>

                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 pt-6 mb-2">3. Advanced Architectures</p>
                    <a href="#architecture-pagination" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">Pagination & Taxonomies</a>
                    <a href="#architecture-hybrid" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">Hybrid Data Patterns</a>
                    <a href="#architecture-interaction" class="block px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">SEO & Comments Flow</a>
                </nav>
            </aside>

            <main class="flex-1 min-w-0 bg-white border border-slate-200 rounded-3xl p-6 md:p-12 shadow-sm space-y-16">

                <section id="philosophy" class="scroll-mt-28">
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-4">Philosophy & Core Concepts</h1>
                    <p class="text-slate-600 leading-relaxed mb-4">
                        <strong>WpAdapter</strong> is built with one primary goal: to serve as an ultra-lightweight, zero-dependency bridge between your PHP application and a Headless WordPress installation via the WordPress REST API.
                    </p>
                    <p class="text-slate-600 leading-relaxed">
                        This library does not make assumptions about the framework you are using. It works silently under the hood to handle HTTP requests, parse complex JSON payloads, and transform them into clean, structured, and consistent PHP objects ready for your application.
                    </p>
                </section>

                <section id="installation" class="scroll-mt-28 border-t border-slate-100 pt-10">
                    <h2 class="text-2xl font-bold text-slate-900 mb-3">Installation & Setup</h2>
                    <p class="text-slate-600 mb-6">Follow these simple steps to integrate the library smoothly into your project environment:</p>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-base font-semibold text-slate-800 mb-1.5 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs font-bold text-white bg-slate-700 rounded-full">1</span>
                                Install via Composer
                            </h3>
                            <p class="text-slate-600 mb-2 text-sm">Run the package requirement command in your terminal inside the project root path:</p>
                            <pre><code class="language-bash">composer require adnzaki/wp-adapter</code></pre>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-slate-800 mb-1.5 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs font-bold text-white bg-slate-700 rounded-full">2</span>
                                Include the Autoloader
                            </h3>
                            <p class="text-slate-600 mb-2 text-sm">Ensure Composer's native vendor autoloader file is included at your application entry point:</p>
                            <pre><code class="language-php">require_once __DIR__ . '/vendor/autoload.php';</code></pre>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-slate-800 mb-1.5 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs font-bold text-white bg-slate-700 rounded-full">3</span>
                                Define a Global Helper (Recommended)
                            </h3>
                            <p class="text-slate-600 mb-2 text-sm">To streamline usage across various controllers or modules without repeating configuration values, register a global helper function:</p>
                            <pre><code class="language-php">function wp() {
    return new \WpAdapter('https://cms.your-domain.com');
}</code></pre>
                        </div>
                    </div>
                </section>

                <section id="fluent-chaining" class="scroll-mt-28 border-t border-slate-100 pt-10">
                    <h2 class="text-2xl font-bold text-slate-900 mb-3">Understanding the Fluent Interface (Method Chaining)</h2>
                    <p class="text-slate-600 mb-4">
                        Before executing an API request, you can dynamically modify the internal configuration of the <code>WpAdapter</code> instance using Method Chaining. Each setter function alters the state and returns the instance itself (<code>return $this;</code>).
                    </p>

                    <div class="overflow-x-auto border border-slate-200 rounded-2xl mb-6 text-sm">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50 text-slate-700 font-semibold">
                                <tr>
                                    <th class="px-4 py-3 text-left">Setter Method</th>
                                    <th class="px-4 py-3 text-left">Effect on API Request</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-600 font-mono text-xs">
                                <tr>
                                    <td class="px-4 py-3 text-indigo-600 font-semibold">setPerPage(int $limit)</td>
                                    <td class="px-4 py-3 font-sans">Sets the maximum number of posts to retrieve in a single page request.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-indigo-600 font-semibold">startFrom(int $offset)</td>
                                    <td class="px-4 py-3 font-sans">Skips a specified number of initial posts. Essential for custom application pagination synchronization.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-indigo-600 font-semibold">setSinglePostUrl(string $prefix)</td>
                                    <td class="px-4 py-3 font-sans">Modifies the dynamic routing prefix generated on post objects for localized link handling.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-indigo-600 font-semibold">setIds(array $ids)</td>
                                    <td class="px-4 py-3 font-sans">Restricts the query payload to filter strictly by a specified array of entity IDs.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-indigo-600 font-semibold">setOrder(string $by, string $direction)</td>
                                    <td class="px-4 py-3 font-sans">Configures sorting properties. Pass <code>'include'</code> to precisely maintain the order sequence of IDs given in the array.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-slate-600 text-sm mb-4">Example of chained configuration sequence:</p>
                    <pre><code class="language-php">$wp->setPerPage(5)
   ->setSinglePostUrl('read')
   ->setOrder('title', 'asc');</code></pre>
                </section>

                <section id="object-schema" class="scroll-mt-28 border-t border-slate-100 pt-10">
                    <h2 class="text-2xl font-bold text-slate-900 mb-3">Normalized Output Object Schema</h2>
                    <p class="text-slate-600 mb-4">
                        The WordPress REST API returns deeply nested JSON trees. <code>WpAdapter</code> simplifies this data, normalizing it into clean, flat PHP properties ready for your UI presentation layer:
                    </p>

                    <div class="bg-slate-900 rounded-2xl p-6 text-emerald-400 font-mono text-sm space-y-2 shadow-inner">
                        <p><span class="text-purple-400">$post->id</span> <span class="text-slate-500">// Unique Post ID (Integer)</span></p>
                        <p><span class="text-purple-400">$post->title</span> <span class="text-slate-500">// Clean rendered title string (String)</span></p>
                        <p><span class="text-purple-400">$post->excerpt</span> <span class="text-slate-500">// Plain-text trimmed summary abstract without HTML elements (String)</span></p>
                        <p><span class="text-purple-400">$post->content</span> <span class="text-slate-500">// Full body layout document keeping original markup elements (String)</span></p>
                        <p><span class="text-purple-400">$post->singlePostImage</span> <span class="text-slate-500">// Resolved direct URL string to the attachment Featured Image (String)</span></p>
                        <p><span class="text-purple-400">$post->url</span> <span class="text-slate-500">// Dynamically computed local route mapping (e.g., /read/article-slug)</span></p>
                    </div>
                </section>

                <section id="architecture-pagination" class="scroll-mt-28 border-t border-slate-100 pt-10 space-y-4">
                    <h2 class="text-2xl font-bold text-slate-900">Advanced Architecture 1: Custom Pagination & Taxonomy Filtering</h2>
                    <p class="text-slate-600 leading-relaxed">
                        When building production architectures, you need to seamlessly sync your application's presentation pagination with the WordPress collection count metrics. Leverage <code>getTotalPost()</code> to extract the WordPress metadata headers (<code>X-WP-Total</code>) for overhead-free calculations, combined with <code>startFrom()</code> to pull clean, sliced datasets.
                    </p>
                    <pre><code class="language-php">// Scenario: Calculating matching documents filtered under dynamic taxonomies or search terms
$taxonomyFilters = [];
if ($taxonomyType === 'category') {
    // Resolve dynamic string slug markers into internal WordPress unique primary key integers
    $category = $wp->categorySlug($slugValue)->getCategories(1);
    $taxonomyFilters = ['categories' => $category[0]->id];
}

// 1. Fetch total matching records globally from the WordPress server
$totalRecords = $wp->getTotalPost(array_merge(['search' => $searchQuery], $taxonomyFilters));

// 2. Query precisely sliced record offsets corresponding with local calculation values
$postsResult = $wp->setPerPage(10)
                  ->setSinglePostUrl('read')
                  ->startFrom($calculatedLocalOffset)
                  ->getPosts($currentPage, ['media', 'category'], $searchQuery, $taxonomyType, $slugValue);</code></pre>
                </section>

                <section id="architecture-hybrid" class="scroll-mt-28 border-t border-slate-100 pt-10 space-y-4">
                    <h2 class="text-2xl font-bold text-slate-900">Advanced Architecture 2: Hybrid Data Synchronization (Popular Posts Model)</h2>
                    <p class="text-slate-600 leading-relaxed">
                        Frequently, you might want to track highly write-intensive interactive values (like page view counters or clicks) inside a fast, local transactional database, while keeping structural content management centralized inside WordPress.
                    </p>
                    <p class="text-slate-600 leading-relaxed">
                        The solution: Fetch the sorted primitive post IDs matching your local analytical matrix rankings, and feed them into <code>setIds()</code>. Enforce <code>setOrder('include')</code> to guarantee that the WordPress engine respects and retains your exact local sort structure.
                    </p>
                    <pre><code class="language-php">// Scenario: Enriched hydration linking localized metric sorting with remote WordPress schemas
// Retrieve top 5 unique tracking IDs from your application data engine
$localPopularIds = [241, 102, 88, 514, 19]; 

// Hydrate the empty array sequence with full structural metadata layouts
$popularPostsList = $wp->setPerPage(5)
                        ->setSinglePostUrl('read')
                        ->setIds($localPopularIds)
                        ->setOrder('include') // CRITICAL: Ensures content blocks remain aligned with local view sorting
                        ->getPosts(1, ['media', 'category'])['data'];</code></pre>
                </section>

                <section id="architecture-interaction" class="scroll-mt-28 border-t border-slate-100 pt-10 space-y-4">
                    <h2 class="text-2xl font-bold text-slate-900">Advanced Architecture 3: Dynamic SEO Metadata Mapping & Threaded Comments</h2>
                    <p class="text-slate-600 leading-relaxed">
                        While loading targeted document views, you can directly map normalized object attributes to populate HTML OpenGraph headers for search engine optimization (SEO). Concurrently, retrieve ready-to-render multi-threaded/nested comment trees to any architectural depth limit via a single function execution call.
                    </p>
                    <pre><code class="language-php">// 1. Retrieve a single structured document using path slug queries
$postDetails = $wp->setSinglePostUrl('read')->readPost($articleSlug);

if (!empty($postDetails)) {
    // Dynamically assign properties to map OpenGraph layout variables
    $openGraphMetadata = [
        'og:title'       => $postDetails->title,
        'og:description' => $postDetails->excerpt,
        'og:image'       => $postDetails->singlePostImage,
        'og:url'         => $postDetails->url
    ];

    // 2. Fetch comments recursively constructed into hierarchical response elements automatically
    $commentThreads = $wp->getCommentsWithReplies($postDetails->id);
}

// 3. Dispatching New Interaction Transactions (Supports Multi-Tier Reply Nodes)
$submissionResult = $wp->addComment(
    $targetPostId, 
    $commentMessageBody, 
    ['author_name' => $senderName, 'author_email' => $senderEmail], 
    $parentCommentId // Set 0 for root-level nodes, pass target comment unique ID to execute a reply
);</code></pre>
                </section>

            </main>
        </div>
    </div>

    <footer class="bg-white border-t border-slate-200 mt-24 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm text-slate-500">
            <p>&copy; 2026 WpAdapter Library. Crafted by Adnan Zaki. Released under the MIT License.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>

</html>