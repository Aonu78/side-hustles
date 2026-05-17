<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $service
    ) {}

    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $posts = $this->service->search($search);
        } else {
            $posts = $this->service->index();
        }

        if ($posts->count() === 0) {
            $posts = $this->fallbackArticles($search);
        }

        return view('resources.blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = $this->service->show($slug);
        $post ??= $this->fallbackArticles()->firstWhere('slug', $slug);

        abort_unless($post, 404);

        return view('blog.show', compact('post'));
    }

    private function fallbackArticles(?string $search = null): Collection
    {
        $articles = collect([
            [
                'title' => 'How I Paid Off $20,000 in Student Loans in 18 Months',
                'slug' => 'how-i-paid-off-20000-in-student-loans-in-18-months',
                'category' => 'Success Stories',
                'read_time' => '10 min',
                'excerpt' => 'A step-by-step breakdown of the strategies and habits that can help accelerate a debt payoff plan.',
                'date' => '2025-03-15',
            ],
            [
                'title' => 'The 50/30/20 Budget Rule Explained Simply',
                'slug' => 'the-50-30-20-budget-rule-explained-simply',
                'category' => 'Personal Finance',
                'read_time' => '5 min',
                'excerpt' => 'A simple way to split income between needs, wants, and future goals without making budgeting feel heavy.',
                'date' => '2025-03-12',
            ],
            [
                'title' => '5 Side Hustles You Can Start This Weekend',
                'slug' => '5-side-hustles-you-can-start-this-weekend',
                'category' => 'Side Hustles',
                'read_time' => '10 min',
                'excerpt' => 'Low-friction ideas you can test quickly, with practical notes on setup time and first customers.',
                'date' => '2025-03-10',
            ],
            [
                'title' => 'Debt Snowball vs Avalanche: Which Is Right for You?',
                'slug' => 'debt-snowball-vs-avalanche-which-is-right-for-you',
                'category' => 'Debt Management',
                'read_time' => '15+ min',
                'excerpt' => 'Compare motivation-first and interest-first repayment methods so you can choose a plan you will keep using.',
                'date' => '2025-03-08',
            ],
            [
                'title' => 'How to Build a $1,000 Emergency Fund in 30 Days',
                'slug' => 'how-to-build-a-1000-emergency-fund-in-30-days',
                'category' => 'Saving Strategies',
                'read_time' => '5 min',
                'excerpt' => 'A focused month-long plan for finding cash, trimming leaks, and protecting the money once it is saved.',
                'date' => '2025-03-05',
            ],
            [
                'title' => 'Tax Basics Every Side Hustler Must Know',
                'slug' => 'tax-basics-every-side-hustler-must-know',
                'category' => 'Personal Finance',
                'read_time' => '10 min',
                'excerpt' => 'Track income, save for taxes, and keep cleaner records before your side hustle gets busy.',
                'date' => '2025-02-25',
            ],
        ])->map(function (array $article) {
            $content = '<p>'.$article['excerpt'].'</p>'
                .'<p>Start by writing down your current numbers, choosing one next action, and reviewing your progress weekly. Small repeatable systems beat big plans that only live in your head.</p>'
                .'<p>Use the finance tools and free resources on this site to turn the advice into a practical worksheet or calculator result.</p>';

            return new Fluent([
                'title' => $article['title'],
                'slug' => $article['slug'] ?? Str::slug($article['title']),
                'excerpt' => $article['excerpt'],
                'content' => $content,
                'category' => new Fluent(['name' => $article['category']]),
                'user' => new Fluent(['name' => 'Hustle Fundamentals']),
                'views' => 0,
                'read_time' => $article['read_time'],
                'published_at' => Carbon::parse($article['date']),
            ]);
        });

        if ($search) {
            $query = Str::lower($search);

            return $articles->filter(function (Fluent $article) use ($query) {
                return Str::contains(Str::lower($article->title), $query)
                    || Str::contains(Str::lower($article->excerpt), $query)
                    || Str::contains(Str::lower($article->category->name), $query);
            })->values();
        }

        return $articles;
    }
}

