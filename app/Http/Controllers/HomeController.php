<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	ob_start();
    	?>
0000000000KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK0000000000000000000000000000000000000OO
000KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK00000000000000000000
KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK0000000000
KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK0
KKKKKKKKXXXXXXXXXXXXXXXXXXXXXXXXXKKKKKKKXXKKKKXKKKKKKKXXXXXKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKKKXXK0OkkOOOOO000KKXXXXXXXXKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKK0kdoooooolllloodxO0KKXXXXXXXXXXXXXXXXXXXXXKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXK0kxdolllc:::::;;;;:::lodk0XXXXXXXKXXXXXXXXXXXXXXXXXXXXXXXXKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKkdolcc:::;;,,,,,,,,,,,;;;:lk0KXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKOxlcc::;,,,,',,,,,,,,,,;;;;;,;cx0XXXXXXXXXXXXXXXXXXXXXXXKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKOdlc:;,,,,,,;;;,;;;;;;;;;;;;:::;;lkKXXXKKXXXXXXXXXXXXXXXKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXKkolc:;,,;;;;;;;;;;::::;;;;;;;;;::;;cd0XKKXKKKXXXXXKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXKXXKkolc:;:::;;;;;;;;;;;;;;;;;;;;;;:::::;:o0KKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXKXKKXK0ollc::c:::;;;;,,'''''..'''''',,;;;:::::d0KKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXXXXXXXXXXK0xlccccc:;;;,''''',,,,,,,;;;,,''..',;:cc:ckKKKKKKKKKKKKKKKKKKXXXXXXXXKKK
XXXXXXXXXXXXXXXXXXXXXXXXKKKKOocllc:;,'.',;codxxxxxxxkkkkxdolc;'..';cc:o0KKKKKKKKKKKKKKKKKXXXXXXXXKKK
XXXXXXXXXXXXXXXXXXXXXKKKKKKKklloc,'.',:odkkkkkkxxxxxxxxxxxxxxxo:'..,::lOKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXXXXXXKKKKKKKKKKxoo:'...;clllcccclccllllccccccccclll;...';cxKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXXXKKKKKKKKKKKKKK0xo:,'..';:;:;,'''''',;:;,'''''''',;:;'...,:xKKKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXXXXXXXKKKKKKKKKKKKKK0K0kc'...',;;;:;''''',,'',,'.....''',,,,'....,d0KKKKKKKKKKKKKKKKKKKKKKKKKKK
XXXXXKKKKKKKKKKKKKKKKK0K00K0d;...',colcc:;:c::c::dOxl,,,',,,;;;::;''..,o0KKKKKKKKKKKK0000KKKKKKKKKKK
KKKKKKKKKKKKKKKK00000000000Oo,..';lxkkxdoododxocxKKKkl;:cc::cllodl,'..'o0KKKKKKKK0000000000000000000
KKKK000000000000000000000O0kl'..;oodxkkxxddxxlcxKKKK0kc;:llloooddl:'..'lOKKKKKKKK0000000000000OOOkkk
OOOOOOOOOkkkkkkkkkkkkkkOOkOkc...;dkxxddddddocldxxxxxxdoc;;:cllllool,..'lOK00KKKK00000000OOOOkkxxxddo
xxxxxxxxxxxxxxxxxxxxxxxxxxkx:...;dxxkxxxxddlcc,',,,,,,,;::loooooool'..,oO00000000OOOkkkxxxdddoooolll
xxxxxxxxxxxdddddddddddddddddl'.':dxxxxxxkkxkxc,,,'..''.,lolodddolll'..;xOOOOOkkxxxxdddoollllllllllcc
ddddddddddddddddddddddddddooo:''cdkxdxxxkkO0Odc::,''''';ldxddooollc,.'lxxxddddooollllllccccccccccccc
oooooooooooooooooooooooooooool:',lxxdxxxkkdol:;;;:cc:,,,;:coooloolc,,coooollllllcccccccccccc::::::::
lllllllllllllooolllllllllllllllc:lxddxxxdl;,,,,,;::::;,,''',:llolll:colllllllccccccccccc::::::::::::
ccccccllllllllllllllllllllllllllllodxdddoc:clllccccc::cccc:;;clllllllllllccccccccccc::::::::::::::::
cccccccccccccccccclllllllllllllllcloodoolloddlc:,'''',;:lllcccccc:cccccccccccccc::::::::::::::::::::
cccccccccccccccccccccccccclcccccccll:llccloooooodoooolllcccc:;::,',;cccccccc::::::::::::::::::::::;;
ccccccccccccccccccccccccccccccc:,.:dc;:::cldxkOOkddddxxxdoc:;,;,....;:cc:::::::::::::::::::::::::::;
cccccccccccccccccccccccccccclc;.',lko:,,,,;cclolc;;;:cllc:;,',:;'....,:::::::::::::::::::::::::::::;
lllcccccccccccccccccccccccloo:''::cxxl:,'''',,,,,''''',,'''',:c,.,;,'.,:c::::::::::::::::::::::::::;
llllllllllllllllllllccllooodl;,,::;ldol:;''...............',:cc'..,;,'';::::::::::::::::::::::::::::
llllllcllllllllllllllclllllc:;,',:::lolc:;,'.............',:cc;...,::;,;::;:::::::::::::::::::::::::
ccccccccccccccccccclllllolllccc:::c:::::;;;'..''.......',,;::;,..',:l;,;::;;::::::::::::::::::::::::
:::::::::::::::cccclllllllcc::::;;;;;;,,,''...',,,'''...''',,'''',;od:,,,;;,,;::::::::::::::::::::::
:::::::::::::::::::clllc,'.',,''',''''........'',,,'..........'''';cc;;,,,,,,,::::::::::::::::::::::
;;;;;;;;;;;;;;;;;::c::,'.......................'...........''''''''''...'',;;;;:::::::::::::::::::::
;;;;;;;;;;;;;;;;::;,'......................................................,;;;;::::::::;;:::;;;;;;;
;;;;;;;;;::::cccc:;;,.........................................................',;:::::::;;;;;;;;;;;;
;;;;;;:ccllcc::;;,,;,'......'..................................................';:::cc::::;;;;;;;;;;
;;;:clooocccccccc::;,'.....','.................................................',;;;::ccc::;;;;;;;;;
:clollcccllllcccc;,',,.....',,'''..............................................',;;;;;::ccccc:;;;;;;
llc:::cccc:;;,;::,'';;'.....,;,'..................'...........................'',;;;;;;::::ccccc:;;,
c:;;:cc:;,'',;:::,',;;'.....','.'.............................................',,;;;;;;;;;;;;:::::;,
,;;;::,'.',;;:::;;,,;;'......'..'''..........................................'',,,,,,,,;;;;;;;;,,;;;
‘,;,,’..’,,;;::;,,,,;;’……….’………………………….’’’’……..’’’’’’’,,,,;;;;;,,’’,,,.
    	<?php
    	$image = ob_get_clean();
    	$image = nl2br($image);
        return view('home', compact('image'));
    }
}
