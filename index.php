<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <title>My First Object</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <header>
        <div id="header_title">
            <div id="header_subtitle"></div>
        </div>
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
     
            if (b_show_intro) {
                //set the intro text to be visible
                $("#intro").append(o_instructions.intro_text);
            };

            //function to hide the press any key text
            document.onkeydown = function f_hide_intro() {
                $("#intro").remove();
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

            //insert into page            
            $("#header_title")append("<h1>" + o_instructions.title_text + "</h1>"); //header title
            $("#header_subtitle")append(o_instructions.subtitle_text); //header subtitle
            $("#wins")append(o_instructions.wins_text + "<br />" + i_wins); //wins text, number
            $("#guesses_remaining")append(o_instructions.guesses_remaining_text + "<br />" + i_guesses); //guesses text, number
            $("#guesses_letters")append(o_instructions.guesses_text + "<br />" + s_hidden_word); //guessed letter text, number
            
        });
    </script>
  </body>
</html>