
<!--<footer>-->
<!--    <div class="container overlay">-->
<!--        <div class="col-md-12 text-center">@ Copyright MMDB 2016</div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>

    function startDictation() {

        if (window.hasOwnProperty('webkitSpeechRecognition')) {

            var recognition = new webkitSpeechRecognition();

            recognition.continuous = true;
            recognition.interimResults = true;

            recognition.lang = "en-US";
            recognition.start();

            recognition.onresult = function(e) {
                document.getElementById('transcript').value
                    = e.results[0][0].transcript;
                recognition.stop();
                document.getElementById('labnol').submit();
            };

            recognition.onerror = function(e) {
                recognition.stop();
            }

        }
    }
</script>
</body>
</html>