@extends('layouts.public')

@section('content')
    <main class="homepage">
        <div class="grid-x grid-padding-x">
            <div class="large-6 cell">
                <h1>David Olson</h1>
                <h2 class="intro-sub">Full Stack Web Development
                    <br>Charleston, SC</h2>
                <p><a href="/pdf/David-Olson-Resume.pdf">Download Resume</a></p>
                {{-- <p><a href="#" class="twitter no-ul">{{ '@davewritescode' }}</a> <a href="#" class="insta no-ul">{{ '@davidolson' }}</a></p> --}}
                <div class="grid-x">
                    <div class="large-12 cell large-order-1 medium-order-2 small-order-2">
                        <div class="image">
                            <p id="image">{!! $image !!}</p>
                        </div>
                    </div>
                    <div class="large-12 cell large-order-2 medium-order-1 small-order-1"><p>Full-stack web developer with experience in web applications, front-end development, design, and advertising. Self-taught in web development after starting a design career in advertising. Eager to expand knowledge of programming and software development. Driven to make any application or website accessible for all users so they can accomplish their goals easily, quickly, and efficiently.</p></div>
                </div>
                <div class="now-playing">

                </div>
            </div>
            <div class="large-4 large-offset-2 cell large-text-right">
                <div class="block">
                    <h2>Portfolio</h2>
                    <a class="portfolio-link" href="{{ route('public.projects.index') }}">View Recent Projects</a>
                </div>
                <div class="block">
                    <h2>Skills</h2>
                    <p>PHP, HTML, JavaScript, CSS, NPM, Composer, Git, Laravel, WordPress, Craft, MySQL, Adobe Creative Suite</p>
                </div>
                <div class="block">
                    <h2>Disciplines</h2>
                    <p>Full-Stack Web Development, Application Architecture, Responsive Design/Development, Web Accessibility, Web Animations</p>
                </div>
                <div class="block">
                    <h2>Work History</h2>
                    <div class="job">
                        <p><small>2017 - Present</small></p>
                        <h3>Full-Stack Web Developer
                            <br>Blue Ion</h3>
                        <a href="http://www.blueion.com" target="_blank">www.blueion.com</a>
                    </div>
                    <div class="job">
                        <p><small>2015-2017</small></p>
                        <h3>Visual Designer
                            <br>Premier Inc.</h3>
                        <a href="https://www.premierinc.com/" target="_blank">www.premierinc.com</a>
                    </div>
                    <div class="job">
                        <p><small>2014-2015</small></p>
                        <h3>Digital Designer
                            <br>Mythic</h3>
                        <a href="https://mythic.us/" target="_blank">www.mythic.us</a>
                    </div>
                </div>
                <div class="block">
                    <h2>Interests</h2>
                    <p>Coffee, PC Building, Mechanical Keyboards, Whisky, Fixed Gear Bicycles, The Detroit Lions, Rangers FC, Fly Fishing, Cooking, Hot Sauce, Photography, Art Museums, Golf, Herman Miller Furniture, Watches, Wikipedia</p>
                </div>
                <div class="block">
                    <h2>Other</h2>
                    <p><a href="https://en.wikipedia.org/wiki/Indentation_style" target="_blank">Tabs</a>, <a href="https://en.wikipedia.org/wiki/Editor_war" target="_blank">Vim</a>, <a href="https://en.wikipedia.org/wiki/Yanny_or_Laurel" target="_blank">Laurel</a>, <a href="https://packagecontrol.io/packages/Material%20Theme" target="_blank">Dark Mode</a>, <a href="http://howtoreallypronouncegif.com/" target="_blank">"Gif"</a>, <a href="https://www.independent.co.uk/life-style/food-and-drink/pizza-pineapple-it-acceptable-chefs-expert-opinion-a8074571.html" target="_blank">Pinapple on Pizza</a>, <a href="https://en.wikipedia.org/wiki/The_dress" target="_blank">Blue and Black</a>, <a href="https://en.wikipedia.org/wiki/Serial_comma" target="_blank">Oxford Commas</a>, <a href="https://www.blueion.com/blog/a-chip-off-the-old-block/" target="_blank">Award Winning Chip Enthusiast</a></p>
                </div>
            </div>
        </div>
    </main>
@endsection
