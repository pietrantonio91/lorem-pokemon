<main id="main" style="min-height: 100vh;" class="bg-light p-0 p-md-5">
    <div class="container bg-white px-5">
        <?php include_once 'header.php'; ?>
        <div class="row">
            <div class="col-12 col-md-6 bg-light p-4">
                <p class="text-right">
                    You can also: 
                    <a href="/" class="text-muted">
                    Generate random Pokémon image!</a>
                </p>
                <p class="h2">
                    Lorem Pokémon ipsum
                </p>
                <p>
                    Generate lorem ipsum text with Pokémon names. It's easy!
                </p>
                <p>
                    Just choose the type of text (words, sentences, paragraphs) and click the button to generate.
                </p>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input type="radio" value="words" id="words" name="type" class="custom-control-input">
                        <label class="custom-control-label" for="words">Words</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" value="sentences" id="sentences" name="type" class="custom-control-input">
                        <label class="custom-control-label" for="sentences">Sentences</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" value="paragraphs" id="paragraphs" name="type" class="custom-control-input" checked>
                        <label class="custom-control-label" for="paragraphs">Paragraphs</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <select name="quantity" id="quantity" class="form-control w-25">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <p class="">
                    <button class="btn btn-outline-dark" onclick="generateText();">
                        <svg id="i-reload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="transform: scale(0.7); margin-right: 10px">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2" />
                        </svg>
                        Generate text
                    </button>
                </p>
            </div>
            <div id="reloadImageWrapper" class="col-12 col-md-6 text-center d-flex justify-content-center align-items-center">
                <img id="reloadImage" class="mt-4" src="<?= $base_url ?>/pokemon/300/">
            </div>
        </div>
        <div class="row" id="generate_text" style="display: none;">
            <div class="col-12 bg-light p-4">
                <div class="pt-5">
                    <div id="generate_text_content" class="text-justify">

                    </div>
                    <h5 id="generate_text_title" class="text-center mt-5">

                    </h5>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </div>
</main>

<script>
    function generateText() {
        let type;
        let types = document.getElementsByName('type');
        for (let i = 0; i < types.length; i++) {
            if (types[i].checked) {
                type = types[i];
            }
        }
        let quantity = document.getElementById('quantity');

        var request = new XMLHttpRequest();
        let url = '<?= $base_url ?>/generate_lorem?quantity=' + quantity.value + '&type=' + type.value;
        request.open('GET', url, true);

        request.onload = function() {
            // Begin accessing JSON data here
            var data = JSON.parse(this.response)
            document.getElementById('generate_text_title').innerHTML = '<p>Generated: ' + quantity.value + ' ' + type.value+'</p>';
            document.getElementById('generate_text_content').innerHTML = data.text;
            document.getElementById('generate_text').style.display = 'block';
        }

        // Send request
        request.send()
    }
</script>