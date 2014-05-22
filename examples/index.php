<html>
<head>
    <meta charset="utf-8"><style>html { font-size: 100%; overflow-y: scroll; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }

        body{
            color:#444;
            font-family:Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman',
            "Hiragino Sans GB", "STXihei", "微软雅黑", serif;
            font-size:12px;
            line-height:1.5em;
            background:#fefefe;
            width: 45em;
            margin: 10px auto;
            padding: 1em;
            outline: 1300px solid #FAFAFA;
        }

        a{ color: #0645ad; text-decoration:none;}
        a:visited{ color: #0b0080; }
        a:hover{ color: #06e; }
        a:active{ color:#faa700; }
        a:focus{ outline: thin dotted; }
        a:hover, a:active{ outline: 0; }

        span.backtick {
            border:1px solid #EAEAEA;
            border-radius:3px;
            background:#F8F8F8;
            padding:0 3px 0 3px;
        }

        ::-moz-selection{background:rgba(255,255,0,0.3);color:#000}
        ::selection{background:rgba(255,255,0,0.3);color:#000}

        a::-moz-selection{background:rgba(255,255,0,0.3);color:#0645ad}
        a::selection{background:rgba(255,255,0,0.3);color:#0645ad}

        p{
            margin:1em 0;
        }

        img{
            max-width:100%;
        }

        h1,h2,h3,h4,h5,h6{
            font-weight:normal;
            color:#111;
            line-height:1em;
        }
        h4,h5,h6{ font-weight: bold; }
        h1{ font-size:2.5em; }
        h2{ font-size:2em; border-bottom:1px solid silver; padding-bottom: 5px; }
        h3{ font-size:1.5em; }
        h4{ font-size:1.2em; }
        h5{ font-size:1em; }
        h6{ font-size:0.9em; }

        blockquote{
            color:#666666;
            margin:0;
            padding-left: 3em;
            border-left: 0.5em #EEE solid;
        }
        hr { display: block; height: 2px; border: 0; border-top: 1px solid #aaa;border-bottom: 1px solid #eee; margin: 1em 0; padding: 0; }


        pre , code, kbd, samp {
            color: #000;
            font-family: monospace;
            font-size: 0.88em;
            border-radius:3px;
            background-color: #F8F8F8;
            border: 1px solid #CCC;
        }
        pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; padding: 5px 12px;}
        pre code { border: 0px !important; padding: 0;}
        code { padding: 0 3px 0 3px; }

        b, strong { font-weight: bold; }

        dfn { font-style: italic; }

        ins { background: #ff9; color: #000; text-decoration: none; }

        mark { background: #ff0; color: #000; font-style: italic; font-weight: bold; }

        sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
        sup { top: -0.5em; }
        sub { bottom: -0.25em; }

        ul, ol { margin: 1em 0; padding: 0 0 0 2em; }
        li p:last-child { margin:0 }
        dd { margin: 0 0 0 2em; }

        img { border: 0; -ms-interpolation-mode: bicubic; vertical-align: middle; }

        table { border-collapse: collapse; border-spacing: 0; }
        td { vertical-align: top; }

        @media only screen and (min-width: 480px) {
            body{font-size:14px;}
        }

        @media only screen and (min-width: 768px) {
            body{font-size:16px;}
        }

        @media print {
            * { background: transparent !important; color: black !important; filter:none !important; -ms-filter: none !important; }
            body{font-size:12pt; max-width:100%; outline:none;}
            a, a:visited { text-decoration: underline; }
            hr { height: 1px; border:0; border-bottom:1px solid black; }
            a[href]:after { content: " (" attr(href) ")"; }
            abbr[title]:after { content: " (" attr(title) ")"; }
            .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }
            pre, blockquote { border: 1px solid #999; padding-right: 1em; page-break-inside: avoid; }
            tr, img { page-break-inside: avoid; }
            img { max-width: 100% !important; }
            @page :left { margin: 15mm 20mm 15mm 10mm; }
            @page :right { margin: 15mm 10mm 15mm 20mm; }
            p, h2, h3 { orphans: 3; widows: 3; }
            h2, h3 { page-break-after: avoid; }
        }
    </style><title>php-auth-sdk</title>
</head>
<body>
<h2>Welcome to the php-auth-sdk!</h2>

<?php if (!file_exists('common_params.local.php')): ?>

    <h2 style="color: #ff0000">Errors:</h2>

    <h3 style="color: #ff0000">Please first copy <code>common_params.php</code> to
        <code>common_params.local.php</code> and provide the values marked with:
        <code>//TODO</code>
    </h3>

    <h3 style="color: #ff0000">You can find/set these values here:<br>
        <a href="https://developer.aboutyou.de" target="_blank">https://developer.aboutyou.de</a> (devcenter)
    </h3>

<?php endif; ?>


<?php
if(file_exists('common_params.local.php')){
    //---------------------------check for required params:-------------------------------------------------------------
    $params = include 'common_params.local.php';

    $requiredParams = array('clientId', 'clientToken', 'clientSecret', 'redirectUri');
    $missingParams = array();
    $wrongParams = array();

    foreach ($requiredParams as $testParam) {
        if (!isset($params[$testParam])) {
            $missingParams[] = $testParam;
        }
    }
    if ($missingParams) {
        ?>
        <h2 style="color: #ff0000">Errors:</h2>
        <h3 style="color: #ff0000">Missing required sdk constructor argument(s):
            <ul>
            <?php foreach($missingParams as $param){
                echo "<li>$param</li>";
            } ?>
            </ul>
        </h3>
        <?php
    }
}
//---------------------------all config set: render standard doc:---------------------------------------------------
?>

<br>
<h2> Simple 'howto' run example/ in php's built in webserver</h2>

<h3>NOTICE:</h3>
<ul>
    <li>This example was only tested with linux/ubuntu, should work quite similar in osx, win.. but untested</li>
    <li>php-cli (command-line-interface) must be installed + php >= 5.4</li>
    <li>you might not have sudo (todo: need to run as root)</li>
</ul>
<h3>CONFIG:</h3>

<p>Lets say this is your common_params.local.php:</p>
<pre><code>
    <\?php
    return array(
        //required settings
        'redirectUri' => 'http://mytestserver.local/result_page.php',
     // 'redirectUri' => 'http://mytestserver.local/basic.php',
        'clientId' => 'YOURCLIENTID_DEVCENTER',
        'clientToken' => 'YOURUSERTOKEN_DEVCENTER',
        'clientSecret' => 'YOURCLIENTSECRET_DEVCENTER',
        <br>
        //optional default settings
        'loginUrl'=>'https://checkout.aboutyou.de', //will be default soon
        'resourceUrl' => 'https://oauth.collins.kg/oauth',
        'scope' => 'firstname',
        'popup' => true,
    );
</code></pre>

<h3>1) add the redirectUri(s) as callbackurls in devcenter (space-separated):</h3>

<p>http://mytestserver.local/result_page.php http://mytestserver.local/basic.php</p>

<h3>2) add a entry to your /etc/hosts</h3>

<p>127.0.0.1 mytestserver.local</p>

<h3> 3) execute </h3>

<p><code>sudo php -S mytestserver.local:80</code> in the terminal</p>


<h3> 4) open the startpage in a webbrowser </h3>

<p>http://mytestserver.local/parent_page.php</p>

<p>or http://mytestserver.local/basic.php if you uncommented that in the config</p>


<p><b>Of course you can (and should) change mytestserver.local to whatever servername you like
        (you need to change it in the configs, devcenter, browser and terminal command)</b></p>
</body>
</html>

