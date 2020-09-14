<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects[] = Project::create([
        	'title' => 'Congressional Medal of Honor Society',
        	'is_blue_ion' => 1,
        	'tech' => 'Laravel',
        	'role' => 'Back-End, Application Architecture',
        	'order' => 0,
        	'site_address' => 'https://www.cmohs.org',
        	'description' => '<p>The Congressional Medal of Honor Society approached Blue Ion to rebuild their website and resource databases from the ground up. Details of recipients were stored across multiple sources making it difficult to manage and identify a single source of truth for data. Additionally, there were education resources and additional data stored in a way that was difficult to manage.</p><p>My role in the project was designing the back end application to power the recipient database and search, the education lessons, and other adminable aspects of the application. I was also responsible for programming the back end and a few various front end aspects of the site.</p>',
        	'challenges' => '<p>We faced significant challenges in importing the data. We had to run the imported data through multiple scripts to clean up inconsistencies across various areas.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'Overcoming Obstacles',
        	'is_blue_ion' => 1,
        	'tech' => 'Laravel',
        	'role' => 'Full-Stack, Application Architecture',
        	'order' => 1,
        	'description' => '<p>Overcoming Obstacles is a learning resource provider for educators. Blue Ion has managed their site and application for several years. Recently, we were tasked with a revamp of how the lessons and curriculum of the program were stored and managed. In the last iteration, individual lessons and curriculum were stored as PDFs. In the new version, they are stored as a solution which allows for full text search. We also added the ability for users to customize their own versions of the lessons.</p>',
        	'challenges' => '<p>One of the many challenges we solved was making sure only users who created custom versions could only be accessed by them and admins. We also had to give admins the ability to present customized lessons to the community when the users had agreed.</p><p>The site and curriculum has also been translated into multiple languages, making it necessary to include translations within the app and the ability for users to set their preferred language as well as switch between them.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'National Real Estate Advisors',
        	'is_blue_ion' => 1,
        	'tech' => 'WordPress',
        	'role' => 'Full-Stack',
        	'order' => 2,
        	'site_address' => 'https://natadvisors.com/',
        	'description' => '<p>National Real Estate Advisors worked with Blue Ion to rework their website from the ground up. The keystone of the new site was the portfolio of real estate holdings. These needed to be displayed in a map view as well as a list view. We built the site in WordPress to allow for easy content management across the site, as well as allowing management of the portfolio items. It was also important to make the site WCAG Compliant due to the nature of the business.</p>',
        	'challenges' => '<p>Importing the property data and presenting it in map form presented a set of challenges. We first needed to obtain latitude and longitude coordinates of each property using the Google Maps API and the addresses of each item. Then we had utilize a plugin to provide better search indexing of the properties to allow users of the site to more easily search. Finally we had to differentiate between completed and new properties and give users a way to toggle between them on the map.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'Go2Group',
        	'is_blue_ion' => 1,
        	'tech' => 'WordPress',
        	'role' => 'Full-Stack',
        	'order' => 3,
        	'site_address' => 'https://www.go2group.com/',
        	'description' => '<p>Go2Group is an IT Consulting company specializing in DevOps, Cloud, and Application Modernization. Blue Ion was tasked with designing and building a new website to showcase the wide range of areas the business was involved in. The site consisted of more than 18 pages of specialized content as well as various resource, blog, and event content managed by the client. We delivered an easy to navigate website that clearly organizes their business branches into clear categories.</p>',
        	'challenges' => '<p>The navigation for this site proved to be a challenge. We needed to organize it in a way that not only visually made sense to the front end user, but also made sense from a schematics view with URL and page structure.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'Right Direction',
        	'is_blue_ion' => 1,
        	'tech' => 'WordPress',
        	'role' => 'Full-Stack',
        	'order' => 4,
        	'site_address' => 'https://www.rightdirectionforme.com/',
        	'description' => '<p>Right Direction provides resources for employers and employees suffering from depression and other mental health conditions in the work place. Blue Ion delivered a site which clearly organized their offerings between Employer Resources and Employee Resources, and organized each into several different categories. There were a variety of custom post types and taxonomy types used to achieve this. Some Employer Resources are hidden behind an email sign up wall. We integrated the site with the Mailchimp API to sign users up in line and validate that they had already signed up once they returned to the site.</p>',
        	'challenges' => '<p>The client did not want to require users to enter a password to view the protected resources, just validate that they had signed up for an email. To solve for this, I programmed a registration / log in -like service which interfaced with the Mailchimp API and set a session variable (and a cookie in the users’ browser if they checked “Remember Me”) to validate that they were logged in.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'ArtBooth Competition Application',
        	'is_blue_ion' => 1,
        	'tech' => 'Laravel',
        	'role' => 'Back-End',
        	'order' => 5,
        	'description' => '<p>ArtFields is an annual, nine-day art competition and exhibition in Lake City, South Carolina which awards over $100,000 in cash prizes to artists from across the Southeast. We at Blue Ion were approached with a better way of handling the entries to the competition and the judging of those entries. We programmed a custom entry collection system which allowed users to sign up, upload information and photos about their entry, and pay for their entry. Admins could moderate the process and determine which entries were available for judging. Judges could log in and provide scores, after which admins could notify accepted applicants. We also provided the ability to create contracts between accepted entries and the venues that would display their work.</p>',
        	'challenges' => '<p>There were a wide variety of challenges associated with this project. My biggest challenge was producing an admin system which allowed for easy filtering, categorization, and updates to entries to the various competitions. I ended up producing an admin from the ground up, utilizing the Foundation Framework to make the process faster.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'Dutch Dialogues Charleston',
        	'is_blue_ion' => 1,
        	'tech' => 'HTML, CSS, JavaScript',
        	'role' => 'Web Design, Front-End',
        	'order' => 6,
        	'site_address' => 'https://www.historiccharleston.org/dutch-dialogues/',
        	'description' => '<p>Dutch Dialogues is a collaborative effort bringing together national and international water experts working alongside Charleston’s local teams to conceptualize a Living With Water future. While working at Blue Ion, I was offered the opportunity to design and develop a single page site for Dutch Dialogues Charleston. This allowed me to draw on my experience in advertising as designer to provide a finished product.</p>',
        	'challenges' => '<p>The deadline was very tight, so I was required to create all of the design assets (logo, chosen stock photography, website design) very quickly before starting on programming. Once approval of design was received, I was able to move fast through programming and get the site out the door on time.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'D’Alberto & Graham',
        	'is_blue_ion' => 1,
        	'tech' => 'HTML, CSS, JavaScript',
        	'role' => 'Front-End, Animation Design',
        	'order' => 7,
        	'site_address' => 'https://www.dalbertograham.com/',
        	'description' => '<p>D’Alberto and Graham are attorneys and advisors specializing in business law and consulting. Blue Ion worked with them to provide a website for their firm. I worked closely with the designer to create the animations of the illustrations used throughout the site.</p>',
        	'challenges' => '<p>I had to work to achieve the animations I wanted while keeping it subtle. I also worked hard to reduce performance lag on the more animation intense parts of the site such as the consulting page.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'Middleton Place',
        	'is_blue_ion' => 1,
        	'tech' => 'HTML, CSS, JavaScript, WordPress',
        	'role' => 'Front-End',
        	'order' => 8,
        	'site_address' => 'https://www.middletonplace.org/',
        	'description' => '<p>My first project I was given at Blue Ion was the programming of the website for Middleton Place, a National Historic Landmark, and home to the oldest landscaped gardens in America. The site was a major upgrade from the previous one, and gave us the opportunity to help tell the story of a major part of Charleston’s history. The site featured a fairly complex structure as well as a news and events section built on a custom WordPress theme using an events plugin.</p>',
        	'challenges' => '<p>Making the site’s design, video elements, and animations work across all devices was a major challenge for me coming from a role where I had primarily been a designer. I was able to learn quickly and provide a product which the client was happy with.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => '6AM City Dashboard',
        	'is_blue_ion' => 1,
        	'tech' => 'Laravel',
        	'role' => 'Full Stack',
        	'order' => 9,
        	'site_address' => 'https://www.middletonplace.org/',
        	'description' => '<p>6AM City is a hyper-local media company, focused on activating communities. They needed a better way to communicate their reader engagement to their advertisers working in less traditional ways such as email banners and promoted posts. They also wanted a way to provide a quick view of their various market websites. Working with Blue Ion, I was able to produce a dashboard which integrated with Google Analytics, Facebook, Instagram, Twitter, and Mailchimp APIs to provide a month to month snapshot of their performance. Advertising clients were provided access code logins which reduced login complexity and allowed for wider use among their teams.</p>',
        	'challenges' => '<p>Working with the (seemingly) moving target of the Facebook API regulations proved to be a challenge for me. We finally reached a solution where we had the appropriate permissions to pull their pages data, and the permissions could be granted straight from the dashboard Application.</p>'
        ]);

        $projects[] = Project::create([
        	'title' => 'Previous Work',
        	'is_blue_ion' => 0,
        	'tech' => 'PHP, HTML, CSS, JS, Adobe Creative Suite, Sketch',
        	'role' => 'Design, Web Development, Strategy',
        	'order' => 10,
        	'description' => '<p>Here is a small cross section of my previous work from Advertising and Marketing.</p>',
        	'challenges' => '<p></p>'
        ]);
    }
}
