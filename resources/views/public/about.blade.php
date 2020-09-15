@extends('layouts.public')

@section('content')
    <header>
        <div class="grid-x grid-padding-x">
            <div class="auto cell">
                <h1>davewritesco.de</h1>
            </div>
            <div class="shrink cell">
                @include('public.components.nav')
            </div>
        </div>
    </header>
    <main class="homepage">
        <div class="grid-x grid-padding-x">
            <div class="large-6 cell">
                <h2>David Olson</h2>
                <h2 class="intro-sub">Full Stack Web Development
                    <br>Charleston, SC</h2>
                <p><a href="#" class="twitter no-ul">{{ '@davewritescode' }}</a> <a href="#" class="insta no-ul">{{ '@davidolson' }}</a></p>
                <p>Full stack web developer with experience in web applications, front-end development, design, and advertising. After starting a career in advertising I turned to attention to the web.</p>
                <p>Out of necessity I taught myself to code in order to bring projects from design to interaction, all while continuing to hone UX/UI skills with agency experience.</p>
                <p>At my core there is a drive to make any application or website digital experiences accessible for all users so they can accomplish their goals easily, quickly, and efficiently.</p>
                <hr>
                <p>I live in Charleston with my beautiful wife Rebecca and our dog Genevieve. I drink what is probably considered an agressive amount of coffee, typcally in the form of espresso. I will correct you if you say e<b>s</b>presso wrong. My wife will too. We play a lot of board games around here, so be prepared for me to ask you about your strategy in Catan (2 wheats for 1 rock? Anyone?) or explain why Contessa / Assassin is the best combo in Coup. I keep track of scores and have winning percentages and point differentials on everyone who has played a game at my house for the last 2 years or so.</p>
                <p>Before quarantine you may have found me at one of my favorite neighborhood bbq bars, coffee shops, or parks. Now I spend my time in places as diverse as my couch, my desk chair, or the other chair that is next to my couch.</p>
            </div>
            <div class="large-4 large-offset-2 cell text-right">
                <div class="block">
                    <h2>Interests</h2>
                    <p><small>You may have already read these on the homepage but here they are again.</small></p>
                    <p>Whisky, Coffee, PC Building, Mechanical Keyboards, Fixed Gear Bicycles, The Detroit Lions, Rangers FC, Fly Fishing, Cooking, Hot Sauce, Photography, Art Museums, Golf, Herman Miller Furniture, Watches, Wikipedia</p>
                </div>
                <div class="block">
                    <h2>Other</h2>
                    <p><small>See above about homepage and how this is repeated. Maybe this time click some links. Maybe these strong opinions will help me make some friends (or enemies).</small></p>
                    <p><a href="https://en.wikipedia.org/wiki/Indentation_style" target="_blank">Tabs</a>, <a href="https://en.wikipedia.org/wiki/Editor_war" target="_blank">Vim</a>, <a href="https://en.wikipedia.org/wiki/Yanny_or_Laurel" target="_blank">Laurel</a>, <a href="https://packagecontrol.io/packages/Material%20Theme" target="_blank">Dark Mode</a>, <a href="http://howtoreallypronouncegif.com/" target="_blank">"Gif"</a>, <a href="https://www.independent.co.uk/life-style/food-and-drink/pizza-pineapple-it-acceptable-chefs-expert-opinion-a8074571.html" target="_blank">Pinapple on Pizza</a>, <a href="https://en.wikipedia.org/wiki/The_dress" target="_blank">Blue and Black</a>, <a href="https://en.wikipedia.org/wiki/Serial_comma" target="_blank">Oxford Commas</a>, <a href="https://www.blueion.com/blog/a-chip-off-the-old-block/" target="_blank">Award Winning Chip Enthusiast</a></p>
                </div>
                <div class="block using">
                    <h2>What I'm Using</h2>
                    <p><small>As if anyone cares about this.</small><br><br></p>
                    <p><b>Chair:</b> Herman Mill Aeron</p>
                    <p><b>Mouse:</b> Logitec MX Master</p>
                    <p><b>Keyboard:</b> Rosewill NEON K85 RGB - Blue Switches</p>
                    <p><b>Headphones:</b> Sennheiser HD 4.40</p>
                    <p><b>CPU:</b> AMD Ryzen 5</p>
                    <p><b>MOBO:</b> ASRock B450M</p>
                    <p><b>GPU:</b> Radeon RX 580</p>
                    <p><b>Primary Storage:</b> WDBlue M.2 NVMe</p>
                    <p><b>Editor:</b> Sublime</p>
                    <p><b>Database:</b> SequelPro</p>
                    <p><b><a href="https://www.reddit.com/r/detroitlions/comments/8mrre2/ftp/" target="_blank">FTP</a>:</b> Filezilla</p>
                </div>
            </div>
        </div>
    </main>
@endsection
