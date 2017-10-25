function Question(text, choices, answer) {
    this.text = text;
    this.choices = choices;
    this.answer = answer;
}

Question.prototype.isCorrectAnswer = function(choice) {
    return this.answer === choice;
}






function Quiz(questions) {
    this.score = 0;
    this.questions = questions;
    this.questionIndex = 0;
}

Quiz.prototype.getQuestionIndex = function() {
    return this.questions[this.questionIndex];
}

Quiz.prototype.guess = function(answer) {
    if(this.getQuestionIndex().isCorrectAnswer(answer)) {
        this.score++;
    }

    this.questionIndex++;
}

Quiz.prototype.isEnded = function() {
    return this.questionIndex === this.questions.length;
}

function populate() {
    if(quiz.isEnded()) {
        showScores();
    }
    else {
        // show question
        var element = document.getElementById("question");
        element.innerHTML = quiz.getQuestionIndex().text;

        // show options
        var choices = quiz.getQuestionIndex().choices;
        for(var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            element.innerHTML = choices[i];
            guess("btn" + i, choices[i]);
        }

        showProgress();
    }
};

function guess(id, guess) {
    var button = document.getElementById(id);
    button.onclick = function() {
        quiz.guess(guess);
        populate();
    }
};


function showProgress() {
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;
};

function showScores() {
    // var gameOverHTML = "<h1>Congratulations! You are a ";
    //
    var winIndex = -1;
    if(quiz.score>8) {
        // gameOverHTML += "Stark";
        winIndex = 0;
    }
    else if(quiz.score<=8&&quiz.score>5) {
        // gameOverHTML += "Lannister";
        winIndex = 1;
    }
    else if(quiz.score<=5&&quiz.score>2) {
        // gameOverHTML += "Targaryen";
        winIndex = 2;
    }
    else {
        // gameOverHTML += "Greyjoy";
        winIndex = 3;
    }
    //
    // gameOverHTML += "</h1>" + "<h2 id='score'> Your scores: " + quiz.score + "</h2>";
    // alert(gameOverHTML);
    // var element = document.getElementById("quiz");
    // element.innerHTML = gameOverHTML;
    showResultsWithFbId(quiz.score, winIndex);
};

// create questions
var questions = [
    new Question("What is the name of Bran's direwolf?", ["Summer", "Grey Wind","Ghost", "Shaggydog"], "Summer"),
    new Question("Who taught Arya waterdancing?", ["Sir Rodrik", "Syrio Forel", "Jon Snow", "Ned Stark"], "Syrio Forel"),
    new Question("What house rules the Iron Islands?", ["Greyjoy", "Arryn","Tully", "Mormont"], "Greyjoy"),
    new Question("What is the seat of house Lannister?", ["Casterly Rock", "Eyrie", "The Red Keep", "Harrenhall"], "Casterly Rock"),
    new Question("Which direwolf was punished for biting Jofrey?", ["Ghost", "Nymeria", "Lady", "Grey Wind"], "Lady"),
    new Question("Who was knighted after the battle of blackwater?", ["Sandor Clegane", "Meryn Trant","Podrick", "Bronn"], "Bronn"),
    new Question("Who is the king beyond the wall?", ["The Night's King", "Benjen Stark", "Mance Ryder", "Tormund"], "Mance Ryder"),
    new Question("Who is the leader of the brotherhood without banners?", ["Thoros of Myr", "Berric Dondarion","Melisandre", "Stannis Baratheon"], "Berric Dondarion"),
    new Question("Where Robb Stark found Qyburn?", ["At Oxcross", "At Harrenhall", "At the Twins", "At Winterfall"], "At Harrenhall"),
    new Question("What is the name of Meera's father?", ["Rickard", "Eddard", "Arthur", "Howland"], "Howland")

];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();





