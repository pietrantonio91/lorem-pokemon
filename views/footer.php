<div class="row">
    <div class="col-12 text-center py-5">
        <p class="d-flex align-content-center align-items-center justify-content-center">
            <img src="./assets/img/pokeball.png" class="d-block mr-1" style="height: 1.3em" alt="">
            Created by Alessandro Pietrantonio
            <img src="./assets/img/pokeball.png" class="d-block ml-1" style="height: 1.3em" alt="">
        </p>
        <p>
            <a href="" id="cntctm" class="text-muted">✉️ Contact me</a> | <a class="text-muted" href="https://paypal.me/pietrajr" target="_blank">☕ Buy me a coffee!</a>
        </p>
    </div>
</div>

<script type="text/javascript" language="javascript">
    emailMe();
    // Email obfuscator script 2.1 by Tim Williams, University of Arizona
    // Random encryption key feature coded by Andrew Moulden
    // This code is freeware provided these four comment lines remain intact
    // A wizard to generate this code is at http://www.jottings.com/obfuscator/
    function emailMe() {
        coded = "9giFz2fFpfgp.2biVV2f6zp@XL2gb.OpL"
        key = "xHlRqEYpcfeGDjgdQAMIJraNFusLS3CkWh7bo8n19Oyivw0X6T5PZtz2m4UVBK"
        shift = coded.length
        link = ""
        for (i = 0; i < coded.length; i++) {
            if (key.indexOf(coded.charAt(i)) == -1) {
                ltr = coded.charAt(i)
                link += (ltr)
            } else {
                ltr = (key.indexOf(coded.charAt(i)) - shift + key.length) % key.length
                link += (key.charAt(ltr))
            }
        }
        document.getElementById('cntctm').setAttribute('href', 'mailto:' + link);
    }
</script><noscript>Sorry, you need Javascript on to email me.</noscript>