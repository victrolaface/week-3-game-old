<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <title>My First Object</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <header>
        <div id="header_title"></div>
    </header>    
    <main>
        <div class="container">
            <div class="row">
                <div class="six columns" id="game-image">
                    <img src="" alt="" class="" />
                </div>
                <div class="six columns">
                    <div id="intro"></div>
                    <div id="wins"></div>
                    <div id="hidden_word"></div>
                    <div id="guesses_remaining"></div>
                    <div id="guesses_letters"></div>
                </div>
            </div>
        </div>    
    </main>
    <footer></footer>
    <script type="text/javascript">
        $(document).ready(function() {

            //bank of words to use
            var a_words = ["lil bub", "brother cream", "grumpy cat", "henri", "longcat", "limecat", "nyan cat", "happy cat", "business cat", "tacgnol", "ceiling cat"];
            //instructions text
            var o_instructions = {
                title_text: "Hangman",
                subtitle_text: "Internet Cats",
                intro_text: "Press Any Key to Get Started!",
                wins_text: "Wins",
                current_word_text: "Current Word",
                guesses_remaining_text: "Number of Guesses Remaining",
                guesses_text: "Letters Already Guessed"
            };
            var b_show_intro = true; //game start, initialize the intro text to be visible
            if (b_show_intro) { $("#intro").html(o_instructions.intro_text); };
            if (b_show_intro === false) { $("#intro").remove(); };
            var i_wins = 0; //game start, initialize wins to 0
            var i_guesses = 8; //game start, intialize user guesses to 8
            var s_random_word = f_choose_random(a_words);
            var a_word = s_random_word.split("");

            //insert onto page            
            $("#header_title").html("<h1>" + o_instructions.title_text + "</h1>" + o_instructions.subtitle_text); //header title

            //on key press
            document.onkeypress = function f_keypress(a_word) {
                //set vars
                b_show_intro = false; //hides intro text on first f_keypress
                
                var a_hidden_word = f_hidden_word_array(a_word);            
                //function take word array's values into hidden word array
                function f_hidden_word_array(word_array) {
                    var hidden_word_array = []; //init hidden word array
                    for (i = 0; i < word_array.length; i++) {
                        if (word_array[i] === " ") {
                            hidden_word_array[i] = "&nbsp;&nbsp;"
                        } else {
                            hidden_word_array[i] = "_ ";
                        };
                    };
                    return hidden_word_array;
                };

                var s_hidden_word_output = f_hidden_word_output(a_hidden_word);
                //function take hidden word array, output
                function f_hidden_word_output(hidden_word_array) {

                    var hidden_word_output; //init output to be blank string
                    
                    for (i = 0; i < hidden_word_array.length; i++) {
                        hidden_word_output = hidden_word_output + hidden_word_array[i]; // 
                    };

                    return hidden_word_output;             
                };

                var a_guessed_letters = []; //initialize guessed letters array
                
                if (i_wins > 0) { $("#wins").html(i_wins); };
                $("#hidden_word").html(o_instructions.current_word_text + "<br />" + s_hidden_word_output);
                $("#guesses_remaining").html(o_instructions.guesses_remaining_text + "<br />" + i_guesses); //guesses text, number
                $("#guesses_letters").html(o_instructions.guesses_text + "<br />" + a_guessed_letters); //guessed letter text, number

                var key = String.fromCharCode(event.keyCode); //get keycode
                
                if (/[a-zA-Z0-9]/.test(key)) { //if keycode in alphabet
                    //if match
                    for (i = 0; i < a_word.length; i++) {
                        if (key === a_word[i]) {
                            //replace underscore w/matching letter
                            a_hidden_word[i] = key;
                        };
                    };
                    
                        //if hidden word is fully matched add +1 to win number
                            //generate new hidden word
                    //else
                        //put wrong letter into letters already guessed div
                        // -1 to guesses remaining
                        //if guesses remaining < 1 
                            //lose game
                            //generate new hidden word
                } else {}; //else - do nothing

                //console.log
                console.log("random word: ", s_random_word);
                console.log("word array: ", a_word);
                console.log("hidden word array: ", a_hidden_word);
                console.log("hidden word output: ", s_hidden_word_output);
                
                //function hide random word
                /*
                function f_hide_word(word_array) { 
                    var hidden_word = "";
                    for (i = 0; i < word_array.length; i++) {
                        hidden_word = hidden_word + "_ ";
                        if (word_array[i] === " ") {
                            hidden_word = hidden_word + "  ";
                        };
                    };
                    return hidden_word;
                };*/
            };
            
            //function choose random word
            function f_choose_random(word) {
                return word[Math.floor(Math.random() * word.length)];
            };                     
        });
    </script>
  </body>
</html>