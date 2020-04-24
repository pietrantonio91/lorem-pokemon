<main id="main" style="min-height: 100vh;" class="bg-light p-0 p-md-5">
    <div class="container bg-white px-5">
        <?php include_once 'header.php'; ?>
        <div class="row">
            <div class="col-12 col-md-6 bg-light p-4">
                <p class="text-right">
                    You can also: 
                    <a href="/lorem" class="text-muted">
                        Generate lorem Pokémon text!
                    </a>
                </p>
                <p class="h2">
                    Easy to use
                </p>
                <p>
                    <strong>Lorem ipsum for Pokémon images*!</strong>
                </p>
                <p>
                    Add pokémon images to your projects and websites:
                </p>
                <div class="my-4 copy-div">
                    <input type="text" value="<?= $base_url ?>/pokemon" class="form-control link" readonly>
                    <small class="text-muted copy-icons d-sm-inline d-none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M12 2 L12 6 20 6 20 2 12 2 Z M11 4 L6 4 6 30 26 30 26 4 21 4" />
                    </svg></small>
                </div>
                <p>
                    Every image is redered as a <strong>square PNG</strong> with transparent background. To choose a custom size just add it after a "/":
                </p>
                <div class="my-4 copy-div">
                    <input type="text" value="<?= $base_url ?>/pokemon/200" class="form-control link" readonly>
                    <small class="text-muted copy-icons d-sm-inline d-none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M12 2 L12 6 20 6 20 2 12 2 Z M11 4 L6 4 6 30 26 30 26 4 21 4" />
                    </svg></small>
                </div>
                <p>
                    You can put a second segment to use as "seed":
                </p>
                <div class="my-4 copy-div">
                    <input type="text" value="<?= $base_url ?>/pokemon/200/1234" class="form-control link" readonly>
                    <small class="text-muted copy-icons d-sm-inline d-none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M12 2 L12 6 20 6 20 2 12 2 Z M11 4 L6 4 6 30 26 30 26 4 21 4" />
                    </svg></small>
                </div>
                <p class="text-center">
                    <button class="btn btn-outline-dark" onclick="reloadImage();">
                        <svg id="i-reload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="transform: scale(0.7); margin-right: 10px">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2" />
                        </svg> 
                        Reload example image
                    </button>
                </p>
                <p class="text-center">
                    <small>*All images are stored in our servers.</small>
                </p>
                <!-- <p id="imageLoader" style="display: none" class="font-weight-bold text-center">Loading new image...</p> -->
            </div>
            <div id="reloadImageWrapper" class="col-12 col-md-6 text-center d-flex justify-content-center align-items-center">
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </div>
</main>

<script>
    reloadImage();

    window.onload = function() {
        Array.from(document.getElementsByClassName('copy-div')).forEach(element => element.addEventListener('click', function(e) {
            return copyElement(e.target.closest('.copy-div').querySelector('.link'));
        }));
    };

    function reloadImage() {
        // document.getElementById('imageLoader').style.display = 'block';
        document.getElementById('reloadImageWrapper').innerHTML = '<img style="display:none" class="mt-4" id="reloadImage" src="<?= $base_url ?>/pokemon/300/'+Math.floor(Math.random()*100)+'">';
        document.getElementById('reloadImage').onload = function() {
            document.getElementById('reloadImage').style.display = 'inline';
            // document.getElementById('imageLoader').style.display = 'none';
        }
    }

    function copyElement(el) {
        el.select();
        document.execCommand('copy');
        let div = el.closest('.copy-div');
        let sm = document.createElement('small');
        sm.id = 'copied';
        sm.style.position = 'absolute';
        sm.innerText = 'Copied!';
        div.appendChild(sm);
        setTimeout(function() {
            document.getElementById('copied').remove();
        }, 1000)
    }
</script>