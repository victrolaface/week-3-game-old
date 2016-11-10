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
            var i_wins = 0; //game start, initialize wins to 0
            var i_guesses = 8; //game start, intialize user guesses to 8
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
            var s_random_word = f_choose_random(a_words);
            var a_word = s_random_word.split("");
            var s_hidden_word = f_hide_word(a_word);
            var a_guessed_letters = []; //initialize guessed letters array

            if (b_show_intro) {
                //set the intro text to be visible
                $("#intro").html(o_instructions.intro_text);
            };

            //insert onto page            
            $("#header_title").html("<h1>" + o_instructions.title_text + "</h1>" + o_instructions.subtitle_text); //header title
            $("#wins").html(o_instructions.wins_text + "<br />"); //wins text, number
            if (i_wins > 0) { $("#wins").html(i_wins); };
            $("#hidden_word").html(o_instructions.current_word_text + "<br />" + s_hidden_word);
            $("#guesses_remaining").html(o_instructions.guesses_remaining_text + "<br />" + i_guesses); //guesses text, number
            $("#guesses_letters").html(o_instructions.guesses_text + "<br />" + a_guessed_letters); //guessed letter text, number

            //function hide the press any key text
            document.onkeypress = function f_keypress(word_array, hidden_word) {
                $("#intro").remove();
                b_show_intro = false; //hides intro text on first keypress
                
                var key = String.fromCharCode(event.keyCode); //get keycode
                if (/[a-zA-Z0-9-_]/.test(key)) { //if keycode in alphabet
                    //if match, replace underscore w/matching letter
                    console.log("a-z,A-Z,0-9,-_");
                        //if hidden word is fully matched add +1 to win number
                            //generate new hidden word
                    //else
                        //put wrong letter into letters already guessed div
                        // -1 to guesses remaining
                        //if guesses remaining < 1 
                            //lose game
                            //generate new hidden word
                } else {}; //else - do nothing
            };

            //function choose random word
            function f_choose_random(word) {
                return word[Math.floor(Math.random() * word.length)];
            };
            
            //function hide random word
            function f_hide_word(word_array) { 
                var hidden_word = "";
                for (i = 0; i < word_array.length; i++) {
                    hidden_word = hidden_word + "_ ";
                    if (word_array[i] === " ") {
                        hidden_word = hidden_word + "  ";
                    };
                };
                return hidden_word;
            };                         
        });
    </script>
  </body>
</html>