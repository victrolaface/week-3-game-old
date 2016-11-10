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
        var o_instructions = {
            title_text: "Hangman",
            subtitle_text: "Internet Cats",
            intro_text: "Press Any Key to Get Started!",
            wins_text: "Wins",
            current_word_text: "Current Word",
            guesses_remaining_text: "Number of Guesses Remaining",
            guesses_text: "Letters Already Guessed"
        }; //instructions text
        var b_show_intro = true; //game start, initialize the intro text to be visible
        var s_random_word = f_choose_random(a_words);
        var a_word = s_random_word.split("");
        var s_hidden_word = f_hide_word(a_word);

        if (b_show_intro) {
            //set the intro text to be visible
            $("#intro_text").append(o_instructions.intro_text);
            //document.getElementById("intro_text").innerHTML = o_instructions.intro_text;
        };
        
        //function to hide the press any key text
        document.onkeydown = function f_hide_intro() {
            $("#intro_text").remove();
            //document.getElementById("intro_text").innerHTML = "";
            b_show_intro = false;
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