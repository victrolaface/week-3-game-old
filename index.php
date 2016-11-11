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
            console.log("1");
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
            var i_wins = 0; //game start, initialize wins to 0
            var i_guesses = 8; //game start, intialize user guesses to 8
            var s_random_word = f_choose_random(a_words);
            console.log("2");            
            //function choose random word
            function f_choose_random(word) {
                return word[Math.floor(Math.random() * word.length)];
            };

            var a_word = s_random_word.split("");
            var a_hidden_word = f_hidden_word_array(a_word);
            console.log("3");

            //create hidden word array "_ _ _   _ _ _"
            function f_hidden_word_array (word_array) {
                var hidden_word_array = [];
                for (i = 0; i < word_array.length; i++) {
                    if (word_array[i] === " ") {
                        hidden_word_array[i] = "&nbsp;&nbsp;";
                    } else {
                        hidden_word_array[i] = "_ ";
                    };    
                };
                return hidden_word_array;
            };
            
            var a_hidden_word_game = []; //this array will update with every correct key press
            //copy contents of a_hidden_word to a_hidden_word_game
            for (i=0; i<a_hidden_word.length; i++) {
                a_hidden_word_game[i] = a_hidden_word[i];
            };

            //insert onto page            
            $("#header_title").html("<h1>" + o_instructions.title_text + "</h1>" + o_instructions.subtitle_text); //header title
            $("#intro").html(o_instructions.intro_text); //press any key text

            var b_intro = true; //init game intro screen
            var b_hidden_word_init = true;
            var s_hidden_word_init = ""; //init hidden word output _ _ _

            if (b_hidden_word_init) {
                s_hidden_word_init = f_hidden_word_init();
                b_hidden_word_init = false; //set init hidden word output to false
            };
            
            //output initial hidden word string
            function f_hidden_word_init() {
                var hidden_word_init = "";
                for (i=0; i<a_word.length; i++) {
                    hidden_word_init = hidden_word_init + a_hidden_word[i];
                };
                return hidden_word_init;
            };
            
            if (b_intro) {
                document.onkeypress = function f_no_intro() {
                    console.log("5");
                    $("#intro").remove(); //remove intro text
                    $("#hidden_word").html(o_instructions.current_word_text + "<br />" + s_hidden_word_init);
                    $("#guesses_remaining").html(o_instructions.guesses_remaining_text + "<br />" + i_guesses); //guesses text, number
                    $("#guesses_letters").html(o_instructions.guesses_text + "<br />"); //guessed letter text, number
                };
                b_intro = false; //precursor to start game
            };

            console.log("8");
            var s_hidden_word = "";
            var a_guesses = [];
            var b_no_intro_keypress = true;
            
            if (b_intro !== true) {
                document.onkeypress = function f_game() {
                    console.log("9")
                    $("#hidden_word").html(o_instructions.current_word_text + "<br />" + s_hidden_word);
                    var key = String.fromCharCode(event.keyCode); //get keycode
                   
                    if (/[a-zA-Z0-9]/.test(key)) { //if keycode in alphabet
                        //if match
                        for (i = 0; i < a_word.length; i++) {
                            if (key === a_word[i]) {
                                //replace underscore w/matching letter
                                a_hidden_word_game[i] = key.toUpperCase();
                            } else {
                                i_guesses = i_guesses - 1; //take away a guess
                                a_guesses.push(key.toUpperCase()); //add missed char to guesses array
                            };
                        };
                    };
                };
                //function f_hidden_word_array
                function f_hidden_word() {

                };
            };                 
        });


//function take hidden word array, output
/*
function f_hidden_word_output(hidden_word_array) {

    var hidden_word_output = ""; //init output to be blank string
    
    for (i = 0; i < hidden_word_array.length; i++) {
        hidden_word_output = hidden_word_output + hidden_word_array[i];
    };

    return hidden_word_output;             
};
*/
/*var a_guessed_letters = []; //initialize guessed letters array
if (i_wins > 0) { $("#wins").html(o_instructions.wins_text + "<br />" + i_wins); };
*/
/*
} else {
    document.onkeypress = function f_set_no_intro_true() {
        b_no_intro = true;
        $("#intro").remove(); //remove press any key div
    };
};*/
    </script>
  </body>
</html>